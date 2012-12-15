{if $isAjax != true}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="ru">
    <link href="/static/all.css" rel="stylesheet" type="text/css">
    <link href="/static/slider.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="/static/images/favico.png" />

    <!--[if IE]>
    <style type="text/css">
        BODY { behavior:url("/static/csshover.htc"); }
    </style>
    <![endif]-->
    <script src="/static/js/jquery-1.6.3.min.js" type="text/javascript" ></script>
    <script src="/static/js/magneto.js" type="text/javascript" ></script>
    <script src="/static/js/count-down.js" type="text/javascript" ></script>
    <script src="/static/js/popup.js" type="text/javascript" ></script>
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
        <div class="slide-container" position="0">
            <div class="front-content">
                <div class="magneto bees">
                    <img src="/static/images/bees.png" alt=""/>
                </div>
                <div class="activity-container">
                    <div class="magneto medvedEng">
                        <img src="/static/images/winnie_eng.png" alt=""/>
                    </div>
                    <div class="heart left">{$left}</div>
                    <div class="magneto medvedRus">
                        <img src="/static/images/winnie_rus.png" alt=""/>
                    </div>
                    <div class="heart right">{$right}</div>
                    <div class="countdown-counter">
                        До конца голосования
                        <span class="countdown-counter"></span>
                        <span class="counter-description">
                            <span class="fixed-digit">дней</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fixed-digit">часов</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fixed-digit">минут</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fixed-digit">секунд</span>
                        </span>
                    </div>
                </div>
                <div class="popup" style="display: none;">
                    <div class="exit"><img src="/static/images/exit.png"></div>
                    <div class="honey honey_medvedEng" style="display: none;"> <img src="/static/images/honeyeng.png" width="250" height="232"> </div>
                    <div class="honey honey_medvedRus" style="display: none;"> <img src="/static/images/honeyrus.png" width="250" height="232"> </div>
                    <div class="text text_medvedEng"> В знак благодарности, Winnie дарит тебе горшочек с Медом Фортуны, из своих запасов. Сохрани его на удачу!</div>
                    <div class="text text_medvedRus"> В знак благодарности, Винни дарит тебе горшочек с Медом Удачи, из своих запасов. Сохрани его на счастье!</div>
                    <div class="soc_vote_medvedRus">
                        Рассказать друзьям:
                        <a class="vk soc_vote_medvedRus" href="#">
                            <img src="/static/images/vk_share.png" style="vertical-align: middle;">
                        </a>
                        <a class="fb soc_vote_medvedRus" href="#">
                            <img src="/static/images/fb_share.png" style="vertical-align: middle;">
                        </a>
                    </div>
                    <div class="soc_vote_medvedEng">
                        Рассказать друзьям:
                        <a class="vk soc_vote_medvedEng" href="#">
                            <img src="/static/images/vk_share.png" style="vertical-align: middle;">
                        </a>
                        <a class="fb soc_vote_medvedEng" href="#">
                            <img src="/static/images/fb_share.png" style="vertical-align: middle;">
                        </a>
                    </div>
                </div>
            </div>
            <div class="back-content">
                <div class="logo"></div>
                <div class="vote tree">
                </div>
            </div>
            <div class="left-arrow js-arrow"><a href="/index/engwinnie"><img src="/static/images/arrow-left.png" width="63" height="94" alt="" /></a></div>
            <div class="right-arrow js-arrow"><a href="/index/ruswinnie"><img src="/static/images/right.png" width="62" height="94" alt="" /></a></div>
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