<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>hoshikake</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.1.9/p5.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.2/particles.min.js" defer></script>
    </head>
    <!-- クラス名好きにしていい -->
    <body>
        <div class="top-wrapper">
            <canvas></canvas>
    <div class="particles">
        <canvas class="background"></canvas>
    </div>
    <div id="face">
      <div class="tear">

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>

          <div class="tear_right">
              <div class="drops">
                  <div class="drop"></div>
              </div>
          </div>
      </div>


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
                    <a href="http://hoshikake.site">
                        <p><span>第一回：星駆水族館</span> <span class="content-text-none">（制作期間：6/12～7/2　掲示期間：7/3～）</span></p>
                    </a>
                    <p><span>第二回：花火大会・お化け屋敷</span> <span class="content-text-none">（制作期間：7/26　掲示期間：8/29～）</span></p>
                </div>
            </div>
        </div>
    </body>
</html>
