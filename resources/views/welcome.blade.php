<!DOCTYPE html>
<html>
    <head>
        <title>ClockMaker</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="{{asset('/css/nomalize.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/css/welcome.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/css/form.css')}}" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    </head>
    <body id="vue">
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
            <div class="container">
                <!-- 無地の時計 -->
                <canvas id="clock" width="500" height="500"></canvas>
            </div>
            <div class="container" id="form">
                <!-- 時針やフォントサイズなどの入力欄(Vue.jsで表示) -->
            </div>
            <button id="preview">プレビュー</button><button id="post">Twitterに投稿</button>
        </section>
        <script src="{{asset('/javascript/app.js')}}"></script>
        <script src="{{asset('/javascript/_form.js')}}"></script>
        <script>
            onload = function(){
                //drawClock(hourObj);
                app.draw();
            }

            $(function(){
                $('button[id=preview]').on('click', function(){
                });
                $('button[id=post]').on('click', function(){
                    //TODO Twitterに投稿
                });
                $("input[type=text]").on('change', function(){

                    // ctx.save();
                    // console.log($(this).attr('name'));
                    // ctx.fillText($(this).val(), 250, 20);
                    // ctx.restore();
                });
            })
        </script>
    </body>
</html>
