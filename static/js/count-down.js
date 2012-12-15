/**
 * Created with JetBrains PhpStorm.
 * User: drege_000
 * Date: 11.10.12
 * Time: 23:31
 * To change this template use File | Settings | File Templates.
 */
function pad(number, length) {

    var str = '' + number;
    while (str.length < length) {
        str = '0' + str;
    }

    return str;

}

jQuery.fn.countdown = function (date, options) {
    options = jQuery.extend({
        lang: {
            years:   [':',':',':'],// ['год', 'года', 'лет'],
            months:  [':',':',':'],//['месяц', 'месяца', 'месяцев'],
            days:    [':',':',':'],//['день', 'дня', 'дней'],
            hours:   [':',':',':'],//['час', 'часа', 'часов'],
            minutes: [':',':',':'],//['минута', 'минуты', 'минут'],
            seconds: ['','',''],//['секунда', 'секунды', 'секунд'],
            plurar:  function(n) {
                return (n % 10 == 1 && n % 100 != 11 ? 0 : n % 10 >= 2 && n % 10 <= 4 && (n % 100 < 10 || n % 100 >= 20) ? 1 : 2);
            }
        },
        prefix: "Осталось: ",
        finish: "Всё"
    }, options);

    var timeDifference = function(begin, end) {
        if (end < begin) {
            return false;
        }
        var diff = {
            seconds: [end.getSeconds() - begin.getSeconds(), 60],
            minutes: [end.getMinutes() - begin.getMinutes(), 60],
            hours: [end.getHours() - begin.getHours(), 24],
            days: [end.getDate()  - begin.getDate(), new Date(begin.getYear(), begin.getMonth() + 1, 0).getDate()]
        };
        var result = new Array();
        for (i in diff) {
            if (diff[i][0] < 0) {
                diff[i][0] += diff[i][1];
            }
            result.push('<span class="fixed-digit">'+pad(diff[i][0],2)+'</span>');
        }
        return result.reverse().join(' : ');
    };
    var elem = $(this);
    var timeUpdate = function () {
        var s = timeDifference(new Date(), date);
        if (s.length) {
            elem.html(options.prefix + s);
        } else {
            clearInterval(timer);
            elem.html(options.finish);
        }
    };
    timeUpdate();
    var timer = setInterval(timeUpdate, 1000);
};