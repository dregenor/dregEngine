/**
 * Created with JetBrains PhpStorm.
 * User: drege_000
 * Date: 10.10.12
 * Time: 9:33
 * To change this template use File | Settings | File Templates.
 */


function getPopupOptions() {
    popupWindowOptions = [
        'left=0',
        'top=0',
        'width=500',
        'height=250',
        'personalbar=0',
        'toolbar=0',
        'scrollbars=1',
        'resizable=1'
    ];
    return popupWindowOptions.join(',');
}

function getShareLinkFb(linkToShare,summary,title,imgs) {
    var images = '';

    for(var i in imgs) {
        images += ('&p[images][' + i +']=' + encodeURIComponent(imgs[i]));
    }

    return 'http://www.facebook.com/sharer/sharer.php?'
        + 's=' + 100
        + '&p[url]=' + encodeURIComponent(linkToShare)
        + '&p[summary]=' + encodeURIComponent(summary)
        + '&p[title]=' + encodeURIComponent(title)
        + (images ? images : '');
}

function getShareLinkVk(linkToShare,summary,title,imgs) {
    return 'http://vkontakte.ru/share.php?'
        + 'url=' + encodeURIComponent(linkToShare)
        + '&description=' + encodeURIComponent(summary)
        + '&title=' + encodeURIComponent(title)
        + '&image=' + encodeURIComponent(imgs[0]);
}

function openShareWindow(shareUri) {
    $('.popup').hide();
    var
        windowOptions = getPopupOptions();

    var
        newWindow = window.open(shareUri, '', windowOptions);

    if(window.focus) {
        newWindow.focus()
    }

}

function updateHearts(left,right){
    $('.heart.left').html(left);
    $('.heart.right').html(right);
}

$(document).ready(function() {

    if ($.position === undefined){
        $.position = 0;
    }

    $.loadedPositions= {  };

    $('.slide-container').each(function(index,item){
        var slidePosition = $(item).attr('position');
        $.loadedPositions[slidePosition] = $(item);
        if (slidePosition != $.position){
            $.loadedPositions[slidePosition].hide();
        }
    });

    $.loadedPositions[$.position].initContainerParams($.position);

});

(function($){
    jQuery.fn.arrow = function(diff,postfix){
        var arrow = this;
        arrow.bind('click.'+postfix,function(e){
            e.preventDefault();
            var current_position = $.position;
            $.position += diff;

            if ($.loadedPositions[$.position] != undefined){
                $.loadedPositions[current_position].swapSlides( $.position , diff );
            } else {
                $.ajax( {
                    url     : arrow.find("a").attr("href"),
                    type    : 'get',
                    error   : function(){},
                    success : function(data) {
                        var htmdata = $(data);
                        htmdata.find('.slide-container').each(function(index,item){
                            var slidePosition = $(item).attr('position');

                            $.loadedPositions[slidePosition] = $(item);
                            $.loadedPositions[slidePosition].hide();
                            if (slidePosition == -1){
                                $('.all-content').prepend(item);
                            } else if (slidePosition == 1){
                                $('.all-content').append(item);
                            }

                        });
                        $.loadedPositions[current_position].swapSlides( $.position, diff );
                    }
                });
            }
        })
    }
})(jQuery);

(function($){
    jQuery.fn.swapSlides = function(position, diff){
        var hideSlide = this;

        if (diff > 0){
            $.loadedPositions[position].css("width","0").show();
            $.loadedPositions[position].animate({"width":"100%", opacity:1},500, function(){

            });

            hideSlide.animate({"width":"0%", opacity:0},500, function(){
                hideSlide.hide();
            } );
            $.loadedPositions[position].initContainerParams(position);
        } else {
            $.loadedPositions[position].css("width","0").show();
            $.loadedPositions[position].animate({"width":"100%", opacity:1},500, function(){

            });

            hideSlide.animate({"width":"0%", opacity:0 },500,function(){
                hideSlide.hide();
            });
            $.loadedPositions[position].initContainerParams(position);
        }


    }
})(jQuery);

(function($){
    jQuery.containerParams={
        c0:function(self){
            var engmsg = "В знак благодарности, Winnie дарит тебе горшочек с Медом Фортуны, из своих запасов. Сохрани его на удачу!";
            var rusmsg = "В знак благодарности, Винни дарит тебе горшочек с Медом Удачи, из своих секретных запасов. Сохрани его на счастье!";
            var titl  = "Получи мед удачи";
            self.find(".soc_vote_medvedEng.vk").click(function(){
                openShareWindow(
                    getShareLinkVk(
                        'http://winnie-vs-winnie.ru/index/eng',
                        engmsg,
                        titl,
                        ['http://winnie-vs-winnie.ru/static/images/honeyeng.png']
                    ));
            });

            self.find(".soc_vote_medvedRus.vk").click(function(){
                openShareWindow(
                    getShareLinkVk(
                        'http://winnie-vs-winnie.ru/index/rus',
                        rusmsg,
                        titl,
                        ['http://winnie-vs-winnie.ru/static/images/honeyrus.png']
                    ));
            });

            self.find(".soc_vote_medvedEng.fb").click(function(){
                openShareWindow(
                    getShareLinkFb(
                        'http://winnie-vs-winnie.ru/index/eng',
                        engmsg,
                        titl,
                        ['http://winnie-vs-winnie.ru/static/images/honeyeng.png']
                    ));
            });

            self.find(".soc_vote_medvedRus.fb").click(function(){
                openShareWindow(
                    getShareLinkFb(
                        'http://winnie-vs-winnie.ru/index/rus',
                        rusmsg,
                        titl,
                        ['http://winnie-vs-winnie.ru/static/images/honeyrus.png']
                    ));
            });

            self.find("span.countdown-counter").countdown(new Date(2012, 11, 13, 00, 00, 00), {prefix:'', finish: 'Голосование закончено!'});

            self.find(".magneto.medvedRus,.heart.right").click(function(){
                //ajax-запрос
                $.getJSON("/index/vote/right",
                    function(data){
                        $('.popup').popup('medvedRus');
                        updateHearts(data.votes.left,data.votes.right);
                    }
                );
            });
            self.find(".magneto.medvedEng,.heart.left").click(function(){
                $.getJSON("/index/vote/left",
                    function(data){
                        $('.popup').popup('medvedEng');
                        updateHearts(data.votes.left,data.votes.right);
                    }
                );
            });
            self.find(".right-arrow.js-arrow").arrow(1,'rightArrow');
            self.find(".left-arrow.js-arrow").arrow(-1,'leftArrow');


            self.find('.magneto').magnet(0.3).fadeIn("slow");
        },
        c1:function(self){
            self.find(".left-arrow.js-arrow").arrow(-1,'leftArrow');
            self.find('.magneto').magnet(0.3).fadeIn("slow");
        },
        c_1:function(self){
            self.find(".right-arrow.js-arrow").arrow(1,'rightArrow');
            self.find('.magneto').magnet(0.3).fadeIn("slow");
        }
    }
    jQuery.initedParams = {
        c0:undefined,
        c1:undefined,
        c_1:undefined
    }
    jQuery.fn.initContainerParams = function(index){
        var key;
        if ( index >= 0){
            key = 'c'+index;
        } else {
            key = 'c_'+Math.abs(index);
        }
        if ($.initedParams[key] === undefined){
            $.containerParams[key](this);
            $.initedParams[key] = 1;
        }
    }
})(jQuery);