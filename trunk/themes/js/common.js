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
    if ($('.icon_start, .icon_end').length > 0) {
        $(".icon_start, .icon_end").tooltip({
            placement: 'top'
        });
    }
    $('#check_show_dvdonkh').on('change', function() {
        var _this = $(this),
            $boxShow = _this.parents('.donkhach').find('.dvdonkh');
        $boxShow.toggleClass('hide').toggleClass('show');
    });
    var slideItems = [];
    $('#vechieudi .slider_nx').each(function(){
        var _this = $(this), test;
        slideItems.push(_this.bxSlider({
            slideWidth: 560,
            minSlides: 1,
            maxSlides: 1,
            slideMargin: 0,
            pager: false,
            auto: false
        }));
    });
    $('.tab-option .nav-tabs>li>a').click(function(e) {
        $(this).tab('show');
        var idTab = $(this).attr('href');
        if(idTab=="#vechieuve"){
            $('#tab').val(2);
        }else{
            $('#tab').val(1);
        }
        setTimeout(function(){
            if($(idTab).is(':visible')){
                for(var i=0;i<slideItems.length ;i++){
                    slideItems[i].destroySlider();
                }
                slideItems.splice(0,slideItems.length);
                $(idTab +' .slider_nx').each(function(){
                    var _this = $(this);
                    slideItems.push(_this.bxSlider({
                        slideWidth: 560,
                        minSlides: 1,
                        maxSlides: 1,
                        slideMargin: 0,
                        pager: false,
                        auto: false
                    }));
                });
            }
            
        },1000);
    });

    if($('.col_comment_review').length > 0)
        $('.col_comment_review').slimScroll({
            alwaysVisible: true,
            railVisible: true,
            height: '500px'
        });
    var sliderBox = '';
    $('.tab_profile .nav-tabs>li>a').click(function(e){
        var idTab = $(this).attr('href');
        if(idTab == '#hinhanh'){
            setTimeout(function(){
                sliderBox = $('.bxslider_profile').bxSlider({
                    slideWidth: 1020,
                    minSlides: 1,
                    maxSlides: 1,
                    slideMargin: 0,
                    auto: false,
                    speed: 200,
                    pager: false,
                });
            },1500);
        }else{
            sliderBox.destroySlider();
        }
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

    $('.type-ticket ul li a').on('click',function(e){
        e.preventDefault();
        var _this = $(this);
        if(_this.hasClass('active')){
            _this.removeClass('active');
        }else{
            $('.type-ticket ul li a').removeClass('active');
            _this.addClass('active');
        }
        return false;
    });

    $('.col_question ul li a').on('click',function(e){
        e.preventDefault();
        var _this = $(this);
        
        if(_this.hasClass('activeShow')){
            _this.parents('.box_question').find('.content_faq').slideUp();
            _this.removeClass('activeShow');
            _this.parents('.box_question').find('li a span').removeClass('glyphicon-minus').addClass('glyphicon-plus');
        }else{
            _this.parents('.box_question').find('li a').removeClass('activeShow');
            _this.addClass('activeShow');
            _this.parents('.box_question').find('.content_faq').slideUp();
            _this.parents('.box_question').find('li a span').removeClass('glyphicon-minus').addClass('glyphicon-plus');
            _this.parent('li').find('.content_faq').slideDown();
            _this.find('span').removeClass('glyphicon-plus').addClass('glyphicon-minus');    
        }
        
        return false;
    });

    $('.menu-header .nav-pills li a').on('click',function(e){
        e.stopPropagation();
        var _this = $(this);
        _this.parent('li').addClass('active');
        _this.parent('li').find('.submenu').show();
        return false;
    });
    $('.menu-header .nav-pills li .submenu .wrap_sub .title a span').on('click',function(e){
        e.stopPropagation();
        var _this = $(this);
        _this.parents('li').find('.submenu').hide();
        _this.parents('li').removeClass('active');
        return false;
    });

    $('.submenu').clickoutside(function(){
        $(this).hide();
        $(this).parent('li').removeClass('active');
    });

    var valScroll = 0;
    $(window).on('scroll',function(){
        valScroll = $(this).scrollTop();
        var wrap_content = $('#wrapper-container'),
            itemScroll = $('header'),
            hItemScroll = itemScroll.outerHeight();
        if(valScroll >= hItemScroll){
            wrap_content.addClass('desti_top');
            itemScroll.addClass('active_scroll');
        }else{
            wrap_content.removeClass('desti_top');
            itemScroll.removeClass('active_scroll');
        }
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
$.fn.clickoutside = function(callback) {
        var outside = 1, self = $(this);
        self.cb = callback;
        this.click(function() { 
            outside = 0; 
        }); 
        $(document).click(function(event){
            if(event.button == 0)
            {
                outside && self.cb();
                outside = 1;
            }
        });
        return $(this);
    }