<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Post;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view ('post.index', ['posts' => Post::published()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return View|RedirectResponse
     */
    public function crate()
    {
        /**@var User */
        $user = \Auth::user();
        if ($user->is_posted) {
            return redirect()->route('posts.edit', $user->post);
        }
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'work_url' => ['string', 'url'],
            'repo_url' => ['string', 'url'],
        ], [], [
            'work_url' => 'ポートフォリオURL',
            'repo_url' => 'リポジトリURL',
        ]);

        /**
         * @var User
         */
        $user = \Auth::user();
        $post = new Post();
        $post->fill($request->all());
        $post->is_published = $request->is_published ? true : false;
        $post->user_id = $user->id;
        $post->save();
        return redirect()->route('posts.index')->with(['status' => '登録完了しました。']);
    } 

    /**
     * Display the specified resource.
     * 
     * @param Request $request
     * @param Post $post
     * @return View|RedirectResponse
     */
    
}