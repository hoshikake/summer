<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>hoshikake</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <!-- クラス名好きにしていい -->
    <body>
        <div class="top-wrapper">
            <div class="content">
                <div class="title">
                    <h1>
                        <span>星駆web制作企画</span><span>特設サイト</span>
                    </h1>
                </div>
                <div class="login-wrapper">
                    <div class="login">
                        @auth
                            <a href="{{ url('/posts') }}">Gallery</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                        @endauth
                    </div>
                </div>
                <div class="content-text">
                    <h2>企画内容</h2>
                    <p><span>第一回：星駆水族館</span>　<span class="content-text-none">（制作期間：6/12～7/2　掲示期間：7/3～）</span></p>
                    <p>第二回：企画中…</p>
                </div>
            </div>
        </div>
        <div class="bubbles">
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
        </div>
    </body>
</html>