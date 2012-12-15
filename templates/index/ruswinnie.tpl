{if $isAjax != true}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="ru">
    <link href="/static/all.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="/static/images/favico.png" />

    <!--[if IE]>
    <style type="text/css">
        BODY { behavior:url("/static/csshover.htc"); }
    </style>
    <![endif]-->
    <script src="/static/js/jquery-1.6.3.min.js" type="text/javascript" ></script>
    <script src="/static/js/magneto.js" type="text/javascript" ></script>
    <script src="/static/js/count-down.js" type="text/javascript" ></script>
    <script src="/static/js/preparator.js" type="text/javascript" ></script>
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?56"></script>
    {literal}
        <script type="text/javascript">
            VK.init({ apiId: 3174948, onlyWidgets: true });
        </script>
    {/literal}
    {literal}
        <!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter17670559 = new Ya.Metrika({id:17670559, enableAll: true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/17670559" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
    {/literal}
    <script type="text/javascript">
        $.position = 1;
    </script>
</head>
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    {/if}
    <div class="all-content">
        <div class="slide-container" position="1">
            <div class="back-content">
                <div class="vote russia-winnie-back">
                    <div class="russia-width">
                        <div class="magneto russia-bees">
                            <img src="/static/images/bee_d.png" alt=""/>
                        </div>
                        <div class="download-content-russia">
                            <div class="float"><h2>Cкачать:</h2></div>
                            <div class="russia-logo float"><a href="http://www.souzmult.ru/component/option,com_wrapper/Itemid,119/"><span class="smultfilm" ></span></a></div>
                            <div class="torrent float"><a href="http://bit.ly/U58kbh"><span class="torrent" ></span></a></div>
                        </div>
                        <div class="russia-winnie-content">
                            <div class="text-back">
                                <p>Сценарий написал Федор Хитрук в соавторстве с Борисом Заходером; работа соавторов не всегда шла гладко, что стало в конечном счёте причиной прекращения выпуска мультфильмов (первоначально планировалось выпустить сериал по всей книге). </p>
                            </div>
                            <div class="video">
                                <div class="name-video-back">
                                    <h2>Винни Пух и все, все, все</h2>
                                </div>
                                <div class="video-back">
                                    <div class="youtube"><iframe width="420" height="315" src="http://www.youtube.com/embed/ptEZwjO1DYI" frameborder="0" allowfullscreen></iframe></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left-arrow js-arrow"><a href="/"><img src="/static/images/arrow-left.png" width="63" height="94" alt="" /></a></div>
            </div>
        </div>
    {if $isAjax != true}
        <div class="footer">
            <div class="likes">
                <div class="like-buttn">
                    <div class="fb-like" data-href="http://winnie-vs-winnie.ru" data-send="false" data-layout="button_count" data-width="400" data-show-faces="true" data-font="arial"></div>
                </div>
                <div class="like-buttn">
                    <div id="vk_like"></div><script type="text/javascript">VK.Widgets.Like("vk_like", { type: "button", height: 18 });</script>
                </div>
            </div>
            <div class="logos"></div>
        </div>
    {/if}
    </div>
{if $isAjax != true}
</body>
</html>
{/if}