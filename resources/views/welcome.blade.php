<!DOCTYPE html>
<html>
    <head>
        <title>ClockMaker</title>
        <meta name="google-site-verification" content="yl3ZCbSO6xVijdQ_51SwvhZA0rxMWphVChPqrhsCvwU" />
        <meta charset="utf-8" />
        <link href="{{asset('/css/nomalize.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/css/welcome.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/css/form.css')}}" rel="stylesheet" type="text/css" />
        <link rel="icon" href="/img/favicon.png" />
        <link rel="shortcut icon" href="/img/favicon.png" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
        <script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
    </head>
    <body>
        <nav>
            <ul>
                <li class="title"><a href="#">ClockMakerだよ</a></li>
                <li class="menu"><a href="http://ferretdayo.github.io" target="_blank">開発者</a></li>
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
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- ClockMaker -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:728px;height:90px"
             data-ad-client="ca-pub-4016648107125112"
             data-ad-slot="9587876185"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <footer>
            <div class="copyright">
                © 2016 ferretdayo
            </div>
            <div class="share">
                <a class="twitter-share-button" data-via="terado_desu" href="https://twitter.com/intent/tweet?text=%e8%87%aa%e5%88%86%e3%81%a0%e3%81%91%e3%81%ae%e6%99%82%e8%a8%88%e3%82%92%e4%bd%9c%e3%82%8c%e3%82%8b%21%20%23ClockMaker">Tweet</a>
                <iframe src="https://www.facebook.com/plugins/like.php?href=https://clock-maker.herokuapp.com/&width=105&layout=button_count&action=like&size=small&show_faces=true&share=false&height=21&appId" width="105" height="21" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
            </div>
        </footer>
        <script>
            window.onload = function(){
                //drawClock(hourObj);
                app.draw();
            }
        </script>
        <script>window.twttr = (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0],
                t = window.twttr || {};
                if (d.getElementById(id)) return t;
                js = d.createElement(s);
                js.id = id;
                js.src = "https://platform.twitter.com/widgets.js";
                fjs.parentNode.insertBefore(js, fjs);
                t._e = [];
                t.ready = function(f) {
                    t._e.push(f);
                };
                return t;
            }(document, "script", "twitter-wjs"));
        </script>
        <script src="{{asset('/javascript/app.js')}}"></script>
        <script src="{{asset('/javascript/_form.js')}}"></script>
        <script src="{{asset('/javascript/_button.js')}}"></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-69860689-5', 'auto');
          ga('send', 'pageview');
        </script>
    </body>
</html>
