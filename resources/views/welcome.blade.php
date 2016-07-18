<!DOCTYPE html>
<html>
    <head>
        <title>ClockMaker</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="{{asset('/css/nomalize.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/css/welcome.css')}}" rel="stylesheet" type="text/css" />
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
            <div class="container">
                <canvas id="clock" width="500" height="500"></canvas>
            </div>
        </section>
        <script>
            onload = function(){
                drawClock();
            }

            function drawClock(){
                var clock = document.getElementById('clock');
                var ctx = clock.getContext('2d');
                ctx.beginPath();
                ctx.arc(250, 250, 250, 0, Math.PI*2, true);
                ctx.stroke();
            }
        </script>
    </body>
</html>
