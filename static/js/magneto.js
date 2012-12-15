/**
 * Created with JetBrains PhpStorm.
 * User: drege_000
 * Date: 09.10.12
 * Time: 0:10
 * To change this template use File | Settings | File Templates.
 */
jQuery.fn.magnet = function(percent) {
    $(this).children('img').css("position", "relative");
    $(this).data('percent',percent);
    $(this).mousemove(function(e){
        var x = e.pageX-$(this).offset().left-$(this).children('img').width()/2;
        var y = e.pageY-$(this).offset().top-$(this).children('img').height()/2;
        var pcnt = $(this).data('percent');
        if (
            (x>$(this).children('img').width() * pcnt)||
            (x<-$(this).children('img').width() * pcnt)||
            (y>$(this).children('img').height()* pcnt)||
            (y<-$(this).children('img').height()* pcnt)
            ){
            $(this).mouseover();
        } else {
            $(this).children('img').css("top", y+"px");
            $(this).children('img').css("left", x+"px");
        }
    });
    $(this).hover(
        function(e){
            var x = e.pageX-$(this).offset().left-$(this).children('img').width()/2;
            var y = e.pageY-$(this).offset().top-$(this).children('img').height()/2;
            $(this).children('img').stop().animate({ left: x, top: y }, { duration: 50 });
        },
        function(e){
            $itm = $(this).children('img').stop().animate({ left: 0, top: 0 },{ duration: 500, easing: 'easeOutElastic' });
        });
    return this;
}
jQuery.extend(jQuery.easing, {
    easeOutElastic: function (x, t, b, c, d) {
        var s=1.70158;
        var p=0;
        var a=c;
        if (t==0) return b;
        if ((t/=d)==1) return b+c;
        if (!p) p=d*.3;
        if (a < Math.abs(c)) {
            a=c;
            var s=p/4;
        }else{
            var s = p/(2*Math.PI) * Math.asin (c/a);
        }
        return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
    }
});
