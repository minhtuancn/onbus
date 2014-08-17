$(document).ready(function() {
    $('ul.triptype li input').on('change', function() {
        var _this = $(this),
            typeTicket = _this.data('ticket');
        $('ul.triptype li').removeClass('selected');
        _this.parent('li').addClass('selected');
        if (typeTicket == 'type-1') {
            $('.ticket-2').hide();
        } else {
            $('.ticket-2').show();
        }
    });
    if ($('.dd-point .point').length > 0) {
        $(".dd-point .point").tooltip({
            placement: 'top'
        });
        $('.list-ticket-search .items .infor-tuyen-search .a-right div a').tooltip({
            placement: 'top'
        });
    }
    if ($('.icon-tien-ich li i').length > 0) {
        $(".icon-tien-ich li i").tooltip({
            placement: 'bottom'
        });
    }
    if ($('.img-logo .wrap-slider').length > 0) {
        $(".img-logo .wrap-slider").tooltip({
            placement: 'top'
        });
    }
    $('#check_show_dvdonkh').on('change', function() {
        var _this = $(this),
            $boxShow = _this.parents('.donkhach').find('.dvdonkh');
        $boxShow.toggleClass('hide').toggleClass('show');
    });
    
    //var topFirstBox = $('.scrollbar_fixed').length > 0 ? $item.offset().top : 0;
    $(window).on('scroll', function() {
        
        var $item = $('.scrollbar_fixed'),
            topItem = $('.scrollbar_fixed').length > 0 ? $item.offset().top : 0,
            wItem = $item.outerWidth(),
            hItem = $item.outerHeight(),
            hWrap = $('.hBoxBig').length > 0 ? $('.hBoxBig').height() : 0,
            topWrap = $('.hBoxBig').length > 0 ? $('.hBoxBig').offset().top : 0,
            hW = $(window).outerHeight(),
            topW = window.scrollY, 
            topScroll = topWrap + topW + hItem,
            topWrapTotal = topWrap + hWrap,
            topBoxFooter = $('.bottom_frm').length > 0 ? $('.bottom_frm').outerHeight() : 0,
            topBox = topWrap + hWrap - hItem - topBoxFooter + 10;

        if (topScroll >= topWrapTotal) {
            $item.css({
                position: 'absolute',
                top: topBox+'px'
            }); 
            if ($item.next('.col_margin_left').length > 0 && $item.parent('.block-subpage-col').length > 0) {
                $item.next('.col_margin_left').css('margin-left', wItem + 'px');
                $item.parent('.block-subpage-col').css('background', '#1F1F1F');
            }
        }else if(topW == 0){
            $item.css({
                position: 'static',
                top: '0px'
            });
            if ($item.next('.col_margin_left').length > 0 && $item.parent('.block-subpage-col').length > 0) {
                $item.next('.col_margin_left').css('margin-left', '0px');
                $item.parent('.block-subpage-col').css('background', '#acafbf');
            }
        }else{
            $item.css({
                position: 'fixed',
                top: '20px'
            });
            if ($item.next('.col_margin_left').length > 0 && $item.parent('.block-subpage-col').length > 0) {
                $item.next('.col_margin_left').css('margin-left', wItem + 'px');
                $item.parent('.block-subpage-col').css('background', '#1F1F1F');
            }
        }
    });

    $('.show_map').click(function(e) {
        e.preventDefault();
        var _this = $(this),
            urlmap = _this.data().urlMap;
        $(this).loading();
        $('#mymap .wrap-popup img').attr('src', '');
        $('#mymap .wrap-popup img').attr('src', urlmap).load(function() {
            $(this).unloading();
            $('#mymap').modal('show');
        });

    });
    var slideItems = [];
    $('.slider_nx').each(function(){
        var _this = $(this), test;
        _this.bxSlider({
            slideWidth: 560,
            minSlides: 1,
            maxSlides: 1,
            slideMargin: 0,
            pager: false,
            auto: false
        });
    });
    $('.tab-option .nav-tabs>li>a').click(function(e) {
        $(this).tab('show');
        var idTab = $(this).attr('href');
        setTimeout(function(){
            $(idTab +' .slider_nx').each(function(){
                var _this = $(this);
                _this.destroySlider();
                _this.bxSlider({
                    slideWidth: 560,
                    minSlides: 1,
                    maxSlides: 1,
                    slideMargin: 0,
                    pager: false,
                    auto: false
                });
            });
        },2000);
        
    });
    $('.replay-position').on('click',function(){
        var $inputGo = $('#departPlace'),
            $inputMove = $('#destination'),
            valGo = $inputGo.val(),
            valMove = $inputMove.val();
        $inputGo.val(valMove);
        $inputMove.val(valGo);
    });

    $('.show_box_height').on('change',function(e){
        e.preventDefault();
        var _this = $(this),
            idShow = _this.data('id');
        $('#'+idShow).toggleClass('hide_check').toggleClass('show_check');
        if($('#'+idShow).hasClass('show_check')){
            $('.field_payment_card').attr('disabled','disabled');
        }else{
            $('.field_payment_card').removeAttr('disabled');
        }
    });

    $('.filter .control label input').on('change',function(e){
        e.preventDefault();
        $(this).parents('.line').toggleClass('active').toggleClass('unactive');
    });

    $('.type-ticket ul li a').on('click',function(){
        var _this = $(this);
        _this.parents('ul').find('li a').removeClass('active');
        if(_this.hasClass('active')){
            _this.removeClass('active');
        }else{
            _this.addClass('active');
        }
        return false;
    });

});
$.fn.loading = function(options) {
    $('.loading').remove();
    var $loading = $('<div class="loading"><span></span></div>');
    if ($('.loading').length > 0) {
        $('.loading').fadeIn();
    } else {
        $('body').append($loading);
    }
};
$.fn.unloading = function(options) {
    $('.loading').remove();
};