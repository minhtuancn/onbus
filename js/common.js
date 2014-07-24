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
    }
});