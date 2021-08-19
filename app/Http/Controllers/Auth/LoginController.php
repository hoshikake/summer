<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\IdentityProvider;
use App\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            dd($provider, Socialite::driver($provider)->user());
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (Exception $e) {
            return redirect('/login');
        }

        $authUser = $this->findOrCreateUser($user, $provider);
        if ($authUser === null) {
            // 名前がないときnull返す
            return redirect('/login')->with(['status' => 'Github上で名前を設定してください。']);
        }
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

    /**
     * Userの作成及びGithubの作成
     *
     * @param Socialite $providerUser
     * @param string $provider('github')
     * @return User|null
     */
    public function findOrCreateUser($providerUser, $provider)
    {
        $account = IdentityProvider::whereProviderName($provider)
            ->whereProviderId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $user = User::whereEmail($providerUser->getEmail())->first();

            \Log::debug($providerUser->getName());
            if (!$providerUser->getName()) {
                return null;
            }

            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'avatar' => $providerUser->getAvatar(),
                ]);

                $user->identityProviders()->create([
                    'provider_id' => $providerUser->getId(),
                    'provider_name' => $provider,
                ]);
            }

            return $user;
        }
    }
}
