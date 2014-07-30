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
    if ($('.x-right .top-option-xe ul li').length > 0) {
        $(".x-right .top-option-xe ul li i").tooltip({
            placement: 'bottom'
        });
    }
    $('#check_show_dvdonkh').on('change', function() {
        var _this = $(this),
            $boxShow = _this.parents('.donkhach').find('.dvdonkh');
        $boxShow.toggleClass('hide').toggleClass('show');
        /*if (_this.is(':checked')) {
            //check
            $boxShow.toggleClass('hide').toggleClass('show');
        } else {
            //uncheck
            $boxShow.toggleClass('hide').toggleClass('show');
        }*/
    });
    var $item = $('.sliding-box'),
        topItem = $item.offset().top;

    $(window).on('scroll', function() {
        var topW = window.scrollY;
        if (topItem <= topW) {
            $item.addClass('fixed');
        } else {
            $item.removeClass('fixed');
        }
    });
});
var $obj = {
    scrollFixed: function(item) {

    }
}