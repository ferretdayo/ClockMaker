<!DOCTYPE html>
<html>
    <head>
        <title>ClockMaker</title>
        <link href="{{secure_asset('/css/nomalize.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{secure_asset('/css/welcome.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{secure_asset('/css/form.css')}}" rel="stylesheet" type="text/css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
        <script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
    </head>
    <body>
        <nav>
            <ul>
                <li class="title"><a href="#">ClockMakerだよ</a></li>
                <li class="menu"><a href="#">開発者</a></li>
            </ul>
        </nav>
        <section class="header">
            <div class="container">
                <div class="content">
                    <h1>ClockMaker</h1>
                    <p>
                        ClockMakerは自分だけの時計を作るアプリケーションです．<br />
                        1～12時の数字の代わりに任意の数式及び文字列を入れて時計を作ります．
                    </p>
                </div>
            </div>
        </section>
        <section>
            <div class="container" id="vue">
                <div class="grid">
                    <!-- 無地の時計 -->
                    <canvas id="clock" width="500" height="500"></canvas>
                    <div id="form">
                        <!-- 時針やフォントサイズなどの入力欄(Vue.jsで表示) -->
                    </div>
                </div>
            </div>
            <form id="post" action="/" method="post">
                {{ csrf_field() }}
                <input type="text" name="img" v-model="img" hidden/>
                <button v-on:click='submit'>Twitterに投稿</button>
            </form>
        </section>
        <script>
            window.onload = function(){
                //drawClock(hourObj);
                app.draw();
            }
        </script>
        <script src="{{secure_asset('/javascript/app.js')}}"></script>
        <script src="{{secure_asset('/javascript/_form.js')}}"></script>
        <script src="{{secure_asset('/javascript/_button.js')}}"></script>
    </body>
</html>
