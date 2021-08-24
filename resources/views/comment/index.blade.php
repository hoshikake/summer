@extends('layouts.app')

@section('content')
    <div class="comment-top">
        <div class="comment-title">
            <h2>
                comment
            </h2>
        </div>
        <div class="card">
            <div class="card-header">
                {{ $post->user->name }}
                <img src="{{ $post->user->avatar }}" alt="アイコン" style="height: 30px; width: 30px">
            </div>
            <div class="comment-link">
                <a href="{{ $post->work_url }}" target="_blank">サイト</a>
                <a href="{{ $post->repo_url }}" target="_blank">リポジトリ</a>

                @if ($post->user->twitter_id)
                    <a href="{{ $post->user->twitter_url }}" target="_blank">Twitter</a>
                @endif
                <a href="{{ route('posts.index') }}">一覧に戻る</a>
            </div>
        </div>
    </div>

    <div class="comment-container">
        <div class="">
            @if (session('status'))
                <div role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('comments.store', $post) }}" method="post">
                @csrf

                {{-- コメント --}}

                <label class="comment-text" for="comment">コメント</label>
                <textarea class="comment-textarea" id="comment" name="comment" rows="3"
                    required>{{ old('comment') }}</textarea>
                @if ($errors->has('comment'))
                    <div class="">
                        <strong>{{ $errors->first('comment') }}</strong>
                    </div>
                @endif

                <div class="comment-post">
                    <button type="submit" class="comment-btn" require>
                        <i class="far fa-save"></i>投稿
                    </button>
                </div>
            </form>

            @forelse ($comments as $comment)
                <form action="{{ route('comments.update', $comment) }}" method="post" class="comment-list form-update"
                    data-id="{{ $comment->id }}">
                    @csrf
                    @method('PUT')
                </form>
                <form action="{{ route('comments.destroy', $comment) }}" method="post" class="comment-list form-destroy"
                    data-id="{{ $comment->id }}">
                    @csrf
                    @method('DELETE')
                </form>
                <div class="comment-wrapper" data-id="{{ $comment->id }}">

                    <img src="{{ $comment->user->avatar }}" alt="アイコン" style="height: 30px; width: 30px">
                    <p class="comment">{!! nl2br(e($comment->comment)) !!}</p>
                    <div class="comment-name">

                        @if ($comment->user->twitter_id)
                            <a href="{{ $comment->user->twitter_url }}" class=""
                                target="_blank">{{ $comment->user->name }}</a>
                        @else
                            {{ $comment->user->name }}
                        @endif
                        @if ($comment->user->id === Auth::user()->id)
                            <button type="submit" class="comment-edit comment-btn btn-edit-comment">編集</button>
                        @endif
                    </div>

                </div>

            @empty
                <p>コメントはまだありません。</p>

            @endforelse

            {{ $comments->links() }}
        </div>
    </div>
    <a href="{{ route('posts.index') }}" class="">一覧に戻る</a>
@endsection
