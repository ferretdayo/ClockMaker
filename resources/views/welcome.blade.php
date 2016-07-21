<!DOCTYPE html>
<html>
    <head>
        <title>ClockMaker</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="{{asset('/css/nomalize.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/css/welcome.css')}}" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
                <!-- 無地の時計 -->
                <canvas id="clock" width="500" height="500"></canvas>
                <!-- 時が入力された時計のプレビュー -->
                <canvas id="clock_preview" width="500" height="500" hidden></canvas>
            </div>
            <div class="container">
                @for($i = 0; $i < 12; $i++)
                    <input type="text" id="{{$i+1}}" name="{{$i+1}}" placeholder="{{$i+1}}" />
                @endfor
            </div>
            <button id="preview">プレビュー</button><button id="post">Twitterに投稿</button>
        </section>
        <script>
            var clock = document.getElementById('clock');
            var ctx = clock.getContext('2d');
            //デフォルトの時計
            var hourObj = [
                {hour: 12, size: 40, x: 225, y: 120},
                {hour: 1, size: 40, x: 315, y: 140},
                {hour: 2, size: 40, x: 365, y: 185},
                {hour: 3, size: 40, x: 390, y: 265},
                {hour: 4, size: 40, x: 365, y: 340},
                {hour: 5, size: 40, x: 315, y: 385},
                {hour: 6, size: 40, x: 240, y: 405},
                {hour: 7, size: 40, x: 175, y: 385},
                {hour: 8, size: 40, x: 115, y: 340},
                {hour: 9, size: 40, x: 90, y: 265},
                {hour: 10, size: 40, x: 105, y: 190},
                {hour: 11, size: 40, x: 155, y: 140},
            ];
            onload = function(){
                drawClock(hourObj);
            }

            function drawClock(hourObj = null){
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
                //var ctx = clock.getContext('2d');
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

                //時間の指定がある場合
                if(hourObj !== null){
                    for(var i = 0; i < hourObj.length; i++){
                        ctx.save();
                        ctx.font = hourObj[i].size + 'px Century Gothic';
                        ctx.fillText(hourObj[i].hour, hourObj[i].x, hourObj[i].y);
                        ctx.restore();
                    }
                }
            }
            $(function(){
                $('button[id=preview]').on('click', function(){
                    $('canvas').hide();
                    //TODO previewの時計の再描画(文字と一緒に)
                    $('canvas[id=clock_preview]').show();
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
