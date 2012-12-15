/**
 * Created with JetBrains PhpStorm.
 * User: dreg
 * Date: 13.10.12
 * Time: 17:27
 * To change this template use File | Settings | File Templates.
 */

jQuery.fn.popup = function(medved) {
    $('.honey').hide();
    $('.soc_vote_medvedEng').hide();
    $('.soc_vote_medvedRus').hide();
    $('.text').hide();
    $(this).hide();
        //this - это попап
    $('.honey_'+medved).show();//втыкнули в текст заголвока медведя
    $('.text_'+medved).show();//показали сам текст
    $('.soc_vote_'+medved).show();
    $(this).show();//ну и показали попап
    $('.exit img').click(function(){$('.popup').hide();});

};
