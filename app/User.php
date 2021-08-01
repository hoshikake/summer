<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id ID
 * @property string $name 初期値はGithubの表示名
 * @property string $email Githubのメールアドレス
 * @property string $avatar Githubのアイコンurl
 * @property string $twitter_id ツイッターアカウントID
 *
 * @property-read string $twitter_url
 * @property-read boolean $is_posted ポートフォリオが登録されたか *
 * @property-read Post $post 特定のポートフォリオ
 *
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function IdentityProviders()
    {
        // IdentityProviderモデルと紐付ける 1対多の関係
        // ... とは言うものの今回はGithubのみだからhasmanyじゃなくても良さそう
        return $this->hasMany(IdentityProvider::class);
    }

}