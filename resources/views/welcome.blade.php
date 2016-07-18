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
            <div class="container">
                @for($i = 0; $i < 12; $i++)
                    <input type="text" name="{{$i+1}}" placeholder="{{$i+1}}" />
                @endfor
            </div>
        </section>
        <script>
            var clock = document.getElementById('clock');

            onload = function(){
                drawClock();
            }

            function drawClock(){
                var date = new Date();

                //メモリを書く関数
                function scale(scaleType, lineHeight, lineWidth){
                    var rotate = scaleType === "minute" ? Math.PI/30 : scaleType === "hour" ? Math.PI/6 : -1;
                    if(rotate === -1) return;
                    ctx.save();
                    ctx.translate(250,250);
                    ctx.lineWidth = lineWidth;
                    for(var i = 0; i < 60; i++){
                        ctx.beginPath();
                        ctx.rotate(rotate);
                        ctx.moveTo(200-lineHeight, 0);
                        ctx.lineTo(200, 0);
                        ctx.stroke();
                    }
                    ctx.restore();
                }

                //円の作成
                var ctx = clock.getContext('2d');
                ctx.beginPath();
                ctx.lineWidth = 5;
                ctx.arc(250, 250, 200, 0, Math.PI*2, true);
                ctx.stroke();

                //分の目盛
                scale("minute", 20, 2);
                //時の目盛
                scale("hour", 30, 5);

                //時針
        		ctx.save();
                ctx.translate(250,250);
                ctx.rotate(Math.PI/6 * (date.getHours() + date.getMinutes() / 60) - Math.PI/2);
        		ctx.lineWidth = 8;
        		ctx.beginPath();
        		ctx.moveTo(-5, 0);
        		ctx.lineTo(80, 0);
        		ctx.stroke();
        		ctx.restore();
                //分針
                ctx.save();
                ctx.translate(250,250);
                ctx.rotate(Math.PI/30 * (date.getMinutes() + date.getSeconds() / 60) - Math.PI/2);
                ctx.lineWidth = 4;
                ctx.beginPath();
                ctx.moveTo(-5, 0);
                ctx.lineTo(100, 0);
                ctx.stroke();
                ctx.restore();

            }
        </script>
    </body>
</html>
