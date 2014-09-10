//Helpers
function sortUsingNestedText_increase(parent, childSelector, keySelector) {
    var items = parent.children(childSelector).sort(function (a, b) {
        var vA = parseFloat($(a).find(keySelector).data('value'));
        var vB = parseFloat($(b).find(keySelector).data('value'));
        return (vA < vB) ? -1 : (vA > vB) ? 1 : 0; // Tang dan
    });
    parent.append(items);
}
function sortUsingNestedText_decrease(parent, childSelector, keySelector) {
    var items = parent.children(childSelector).sort(function (a, b) {
        var vA = parseFloat($(a).find(keySelector).data('value'));
        var vB = parseFloat($(b).find(keySelector).data('value'));
        return (vA > vB) ? -1 : (vA < vB) ? 1 : 0; // Giam dan
    });
    parent.append(items);
}
function changeDropdown() {
    //Hide all item
    jQuery('div.schedule-ticket').hide();

    jQuery('div.schedule-ticket').filter(function () {
        var flag = false;

        // #trasporter-list-nav
        if ($("#trasporter-list-nav :selected").length > 0) {
            for (var i = 0; i < $("#trasporter-list-nav option").length; i++) {
                if ($("#trasporter-list-nav option")[i].selected) {
                    if ($(this).attr('operator-id') == $("#trasporter-list-nav option")[i].value) {
                        flag = true;
                        break;
                    }
                }
            }
            if (flag == false)
                return false;
            else
                flag = false;
        }

        // #benefit-list-nav
        if ($("#benefit-list-nav :selected").length > 0) {
            for (i = 0; i < $("#benefit-list-nav option").length; i++) {
                if ($("#benefit-list-nav option")[i].selected) {
                    if (!$(this).find('span.' + $("#benefit-list-nav option")[i].value).length) {
                        return false;
                    }
                }
            }
        }

        // #start-point-list-nav
        if ($("#start-point-list-nav :selected").length > 0) {
            for (i = 0; i < $("#start-point-list-nav option").length; i++) {
                if ($("#start-point-list-nav option")[i].selected) {
                    if ($(this).attr('fromstop-id') == $("#start-point-list-nav option")[i].value) {
                        flag = true;
                        break;
                    }
                }
            }
            if (flag == false)
                return false;
            else
                flag = false;
        }

        // #end-point-list-nav
        if ($("#end-point-list-nav :selected").length > 0) {
            for (i = 0; i < $("#end-point-list-nav option").length; i++) {
                if ($("#end-point-list-nav option")[i].selected) {
                    if ($(this).attr('tostop-id') == $("#end-point-list-nav option")[i].value) {
                        flag = true;
                        break;
                    }
                }
            }
            if (flag == false)
                return false;
            else
                flag = false;
        }
        return true;
    }).show();

    //If no selected item then show all
    if (0 == $("#trasporter-list-nav :selected").length
        && 0 == $("#benefit-list-nav :selected").length
        && 0 == $("#start-point-list-nav :selected").length
        && 0 == $("#end-point-list-nav :selected").length) {
        jQuery('div.schedule-ticket').show();
    }
}
function changeToCloseButton(object) {
    //Change to close button
    jQuery(object).hide();
    jQuery(object).next('a.open').show();
}
function rollBackToNormalButton(object) {
    //Change to close button
    jQuery(object).hide();
    jQuery(object).prev('a.closed').show();
}
function hideDetailTab(closest) {
    closest.find('div.ticket-booking-details').hide();
    closest.find('div.ticket-detail-tabs').hide();
}

function updateBookingDetails(closest) {
    //Calculate deptime
    var sFromTime = "";
    var sToTime = "";

    if (closest.find("#FromTimes").length > 0) {
        sFromTime = closest.find("#FromTimes").val();
    }
    else {
        sFromTime = closest.find(".span-from-time").text().substr(0, 5);
    }
    if (closest.find("#ToTimes").length > 0) {
        sToTime = closest.find("#ToTimes").val();
    } else {
        sToTime = closest.find(".span-to-time").text();
    }

    //Update booking details
    var currentBookingDiv = closest.find('div.ticket-booking-detail-call-centre');
    currentBookingDiv.find('td.info-table-route-name').html('<strong>' + closest.find('p.route').text() + '</strong>');
    currentBookingDiv.find('td.info-table-fromstop-name').html('<strong>' + closest.find('p.place').text() + '</strong>');
    currentBookingDiv.find('td.info-table-tostop-name').html('<strong>' + closest.find('p.dest-place').text() + '</strong>');
    currentBookingDiv.find('td.info-table-from-time').html('<strong>' + sFromTime + '</strong>');
    currentBookingDiv.find('td.info-table-to-time').html('<strong>' + sToTime + '</strong>');

    var numberOfTicket = $('#passengerNum').val();
    currentBookingDiv.find('td.info-table-number-ticket').html('<strong>' + numberOfTicket + '</strong>');

    var priceText = closest.find('p.price').attr('data-value');
    var totalText = "Không xác định";
    if (priceText != "Đang cập nhật") {
        var price = parseInt(priceText);
        totalText = (parseInt(numberOfTicket) * price).formatMoney(0, '.', ',') + "đ";
        priceText = price.formatMoney(0, '.', ',') + '/người';
    }

    //if (closest.find('p.price del').length > 0) {
    //    currentBookingDiv.find('td.info-table-price').html('<strong><del>' + priceText + '</del></strong>');
    //    currentBookingDiv.find('td.amount').html('<del>' + totalText + '</del>');
    //}
    //else {
    currentBookingDiv.find('td.info-table-price').html('<strong>' + priceText + '</strong>');
    currentBookingDiv.find('td.amount').html(totalText);
    //}

}
function submitRouteFeedback(form) {
    //var $form = $(this);
    // let's select and cache all the fields
    var $inputs = form.find("input, select, button, textarea");
    // serialize the data in the form
    var serializedData = form.serialize();

    // let's disable the inputs for the duration of the ajax request
    $inputs.prop("disabled", true);

    // fire off the request to /form.php
    $.ajax({
        url: "/vi-VN/Review/CreateRouteInfoReview",
        type: "post",
        data: serializedData,
        success: function (response) {
            return response.Success;
        },
        error: function () {
            return false;
        }
    });
}

//Main functions
function maskEventOnOperatorFilter() {
    $("#trasporter-list-nav").dropdownchecklist({
        emptyText: "Các hãng xe",
        width: 155
    });
    $('#trasporter-list-nav').change(function () {
        changeDropdown();
    });
}
function maskEventOnBenefitFilter() {
    $("#benefit-list-nav").dropdownchecklist({
        emptyText: "Tiện ích",
        width: 195
    });
    $('#benefit-list-nav').change(function () {
        changeDropdown();
    });
}
function maskEventOnFromStopFilter() {
    $("#start-point-list-nav").dropdownchecklist({
        emptyText: "Nơi xuất phát",
        width: 145
    });
    $('#start-point-list-nav').change(function () {
        changeDropdown();
    });
}
function maskEventOnToStopFilter() {
    $("#end-point-list-nav").dropdownchecklist({
        emptyText: "Nơi đến",
        width: 145
    });
    $('#end-point-list-nav').change(function () {
        changeDropdown();
    });
}
function maskEventOnRatingFilter() {
    $("#raty-nav-input").dropdownchecklist({
        emptyText: "Đánh giá",
        width: 130,
        onItemClick: function (checkbox, selector) {
            $("#price-sub-nav").prop("selectedIndex", 0).trigger('change');
            if (checkbox.val() == 1)
                sortUsingNestedText_increase($('div.result-list'), '.result-item', '.rating');
            else if (checkbox.val() == 2)
                sortUsingNestedText_decrease($('div.result-list'), '.result-item', '.rating');
        }
    });

}
function maskEventOnPriceFilter() {
    $("#price-sub-nav").dropdownchecklist({
        emptyText: "Giá vé",
        width: 130,
        onItemClick: function (checkbox, selector) {
            $("#raty-nav-input").prop("selectedIndex", 0).trigger('change');
            if (checkbox.val() == 1)
                sortUsingNestedText_increase($('div.result-list'), '.result-item', '.price');
            else if (checkbox.val() == 2)
                sortUsingNestedText_decrease($('div.result-list'), '.result-item', '.price');
        }
    });
}

function maskTipPopOver() {
    $('.tip, .benefit-icons .icon, .star-img, .ticket-ac-btn').tipsy({ fade: true, gravity: 's' });
    $(".more").hover(function () {
        $(this).find(".tip-popover").show("fast");
    }, function () {
        $(this).find(".tip-popover").hide();
    });
    $(".depart-station, .destination-station, .rating-info").hover(function () {
        $(this).find(".tip-popover").show("fast");
    }, function () {
        $(this).find(".tip-popover").hide();
    });
}

function maskEventOnFromTime() {
    $('.start-time-drop').customSelect();
    //Trigger when change
    jQuery('select.start-time-drop').bind('change', function () {
        // show loading
        showLoading();

        var closest = jQuery(this).closest('.schedule-ticket');
        var scheduleId = closest.attr('schedule-id');
        var routeId = closest.attr('route-id');
        var busOperatorId = closest.attr('operator-id');
        var date = closest.attr('departure-date');
        var time = $('.start-time-drop').val();
        var timeSplit = time.split(':');
        var numberAvailableSeat = $(this).find('option:selected').attr("data-anum");
        var isSoldOut = $(this).find('option:selected').attr("data-issoldout");

        //Update to times
        closest.find("select.stop-time-drop").prop("selectedIndex", $(this).prop("selectedIndex")).trigger('update');

        // kiểm tra xem chuyến mới đổi thời gian có nằm trong danh sách chuyến hết vé hay không
        $.get('/vi-VN/Booking/CheckSoldOutSchedule?scheduleId=' + scheduleId + '&routeId=' + routeId + '&busOperatorId=' + busOperatorId + '&date=' + date + '&time=' + time, function (data) {
            if (data.Data.success == 1) {
                // cập nhật lại một số thông tin
                closest.attr('schedule-detail-id', data.Data.scheduleDetailId);
                closest.attr('from-hour', timeSplit[0]);
                closest.attr('from-minute', timeSplit[1]);
                closest.attr('is-sold-out', 'YES');
                var that_button = closest.find('a.ticket-ac-btn.booking-btn.closed');
                if (!that_button.hasClass('wait-list')) {
                    if (that_button.hasClass('noSeat')) {
                        that_button.removeClass('noSeat');
                        that_button.addClass('wait-list');
                        that_button.text('Hết vé');
                    } else if (that_button.hasClass('hasSeat')) {
                        that_button.removeClass('hasSeat');
                        that_button.addClass('wait-list');
                        that_button.text('Hết vé');
                    }
                }
                if (that_button.css('display') == 'none') {
                    that_button.next('a').trigger('click');
                }
                that_button.trigger('click');
            } else {
                var that_element = closest.find('a.ticket-ac-btn.booking-btn.closed');
                closest.attr('schedule-detail-id', data.Data.scheduleDetailId);
                closest.attr('is-sold-out', 'NO');

                //Update availble seat
                if (closest.find('p.numAvailbleSeat').length > 0) {
                    closest.find('p.numAvailbleSeat').text("Số ghế trống: " + numberAvailableSeat);
                    if (that_element.hasClass('wait-list')) {
                        that_element.removeClass('wait-list');
                        if (0 == numberAvailableSeat) {
                            that_element.addClass('noSeat');
                            that_element.text('Đặt vé');
                        } else {
                            that_element.addClass('hasSeat');
                            that_element.text('Đặt vé');
                        }
                    } else {
                        if (0 == numberAvailableSeat) {
                            closest.find('a.hasSeat').removeClass('hasSeat').addClass('noSeat');
                            that_element.text('Đặt vé');
                        } else {
                            closest.find('a.noSeat').removeClass('noSeat').addClass('hasSeat');
                            that_element.text('Đặt vé');
                        }
                    }
                } else {
                    if (that_element.hasClass('wait-list')) {
                        that_element.removeClass('wait-list');
                        if (0 == numberAvailableSeat) {
                            if (that_element.hasClass('hasSeat')) {
                                that_element.removeClass('hasSeat').addClass('noSeat');
                                that_element.text('Đặt vé');
                            } else {
                                that_element.addClass('noSeat');
                                that_element.text('Đặt vé');
                            }
                        } else {
                            if (that_element.hasClass('noSeat')) {
                                that_element.removeClass('noSeat').addClass('hasSeat');
                                that_element.text('Đặt vé');
                            } else {
                                that_element.addClass('hasSeat');
                                that_element.text('Đặt vé');
                            }
                        }
                    } else {
                        if (0 == numberAvailableSeat) {
                            if (that_element.hasClass('hasSeat')) {
                                that_element.removeClass('hasSeat').addClass('noSeat');
                                that_element.text('Đặt vé');
                            }
                        } else {
                            if (that_element.hasClass('noSeat')) {
                                that_element.removeClass('noSeat').addClass('hasSeat');
                                that_element.text('Đặt vé');
                            }
                        }
                    }
                }

                //Trigger click dat ve, dien thoai button
                if (closest.find('a.hasSeat').length > 0) {
                    closest.find('a.hasSeat').trigger('click');
                }
                else if (closest.find('a.noSeat').length > 0) {
                    closest.find('a.noSeat').trigger('click');
                }
            }
        });
    });

}
function maskEventOnToTime() {
    $('.stop-time-drop').customSelect();
    //Trigger when change
    jQuery('select.stop-time-drop').bind('change', function () {

        var closest = jQuery(this).closest('.schedule-ticket');

        //Update from times
        closest.find("select.start-time-drop").prop("selectedIndex", $(this).prop("selectedIndex")).trigger('update');

        //Update availble seat
        if (jQuery(this).closest('.schedule-ticket').find('p.numAvailbleSeat').length > 0) {
            var numberAvailableSeat = jQuery(this).find('option:selected').attr("data-anum");

            closest.find('p.numAvailbleSeat').text("Số ghế trống: " + numberAvailableSeat);
            if (0 == numberAvailableSeat) {
                closest.find('a.hasSeat').removeClass('hasSeat').addClass('noSeat');
            } else {
                closest.find('a.noSeat').removeClass('noSeat').addClass('hasSeat');
            }
        }

        //Trigger click dat ve, dien thoai button
        if (closest.find('a.hasSeat').length > 0) {
            closest.find('a.hasSeat').trigger('click');
        }
        else if (closest.find('a.noSeat').length > 0) {
            closest.find('a.noSeat').trigger('click');
        }
    });
}

function maskEventOnDetailTab() {
    jQuery('.ticket-detail-tabs a.tabs').click(function () {
        var rel = jQuery(this).attr('data-tab');
        var href = jQuery(this).attr('href');
        var parent = jQuery(this).parent().parent().parent();

        //Set active tab
        parent.find('.tabs').removeClass('active');
        jQuery(this).addClass('active');

        if (0 == parent.find('div.' + rel).length) { //Never load before
            //Hide all tab content
            parent.find('.tab-pane').removeClass('current');
            //Show loading
            parent.find('.loading').show();
            //Get data
            var getFromBookingPage = false;
            if (jQuery(this).hasClass('ticket-review-tab') || jQuery(this).hasClass('ticket-images-tab')) {
                getFromBookingPage = true;
            }

            $.ajax({
                url: href,
                data: { getFromBookingPage: getFromBookingPage },
                success: function (result) {
                    //Hide loading
                    parent.find('.loading').hide();
                    //Append tab
                    parent.append(result);
                    //Show current tab
                    parent.find('.' + rel).addClass('current');
                }
            });
        } else {
            //Hide all tab content
            parent.find('.tab-pane').removeClass('current');
            //Show current tab
            parent.find('.' + rel).addClass('current');
        }

        return false;
    });
}
function maskEventOnDetailLink() {
    jQuery('a.ticket-detail-tab-link').click(function () {
        var closest = $(this).closest('.schedule-ticket');
        //Hide all details
        closest.find('div.ticket-booking-details').hide();
        changeToCloseButton(closest.find('a.closed'));
        //rollBackToNormalButton(closest.find('a.open'));
        //Show tabs
        closest.find('div.ticket-detail-tabs').show();
        //Trigger click
        var rel = $(this).attr('data-tab');
        closest.find('div.ticket-detail-tabs a.tabs[data-tab=' + rel + ']').trigger('click');

        return false;
    });

    jQuery('a.rating-link').click(function () {

        var closest = $(this).closest('.schedule-ticket');
        changeToCloseButton(closest.find('a.closed'));
        closest.find('a.ticket-review-tab').trigger('click');
        closest.find('div.ticket-detail-tabs').show();
        return false;
    });
}
function maskEventOnCloseTabButton() {
    //Close div tabs
    jQuery('a.tabs-close-btn').click(function () {
        jQuery(this).closest('div.ticket-detail-tabs').hide();
        rollBackToNormalButton($(this).closest('.schedule-ticket').find('a.open'));
    });
}

function maskEventOnCommentButton() {
    $('a.comment-btn-popup').fancybox({
        type: 'iframe',
        autoDimensions: false,
        width: 804,
        height: 539,
        transitionIn: 'none',
        transitionOut: 'none',
        fitToView: false,
        autoSize: false,
        margin: 0,
        padding: 0,
        beforeShow: function () {
            $(".fancybox-skin").css("backgroundColor", "transparent");
        },
        helpers: {
            overlay: { closeClick: false } // prevents closing when clicking OUTSIDE fancybox 
        }
    });
}

function maskEventOnCallCenterButton() {
    //Book seat, get call center
    $(document).on('click', 'a.noSeat', null, function () {

        //Get call center
        var closest = $(this).closest('.schedule-ticket');

        //Hide all details tag, tabs tag
        hideDetailTab(closest);

        //Show loading
        showLoading();

        //Check exist load before
        if (closest.find('div.ticket-booking-detail-call-centre').length > 0) {
            //Update details
            updateBookingDetails(closest);
            //Show only ticket call centre
            closest.find('div.ticket-booking-detail-call-centre').show();

            //Close loading
            hideLoading();

        } else {

            //Calculate deptime
            var sFromTime = "";
            var sToTime = "";

            if (closest.find("#FromTimes").length > 0) {
                sFromTime = closest.find("#FromTimes").val();
            }
            else {
                sFromTime = closest.find(".span-from-time").text().substr(0, 5);
            }
            if (closest.find("#ToTimes").length > 0) {
                sToTime = closest.find("#ToTimes").val();
            } else {
                sToTime = closest.find(".span-to-time").text();
            }

            var depTime = $('#span-current-date').html() + "-" + sFromTime;
            depTime = depTime.replace(/\//g, "-").replace(":", "-") + "-00";

            //Call ajax
            $.get('/vi-VN/Booking/GetCallCentreInfoWithDateTime/routeId/' + closest.attr('route-id') + '/fromStopId/' + closest.attr('fromstop-id') + '/toStopId/' + closest.attr('tostop-id') + '/departureDateTime/' + depTime, function (data) {
                //Append data
                closest.append(data);

                //Update booking details
                var currentBookingDiv = closest.find('div.ticket-booking-detail-call-centre');
                currentBookingDiv.find('td.info-table-route-name').html('<strong>' + closest.find('p.route').text() + '</strong>');
                currentBookingDiv.find('td.info-table-fromstop-name').html('<strong>' + closest.find('p.place').attr('data-value') + '</strong>');
                currentBookingDiv.find('td.info-table-tostop-name').html('<strong>' + closest.find('p.dest-place').attr('data-value') + '</strong>');
                currentBookingDiv.find('td.info-table-from-time').html('<strong>' + sFromTime + '</strong>');
                currentBookingDiv.find('td.info-table-to-time').html('<strong>' + sToTime + '</strong>');

                var numberOfTicket = $('#passengerNum').val();
                currentBookingDiv.find('td.info-table-number-ticket').html('<strong>' + numberOfTicket + '</strong>');

                var priceText = closest.find('p.price').attr('data-value');
                var totalText = "Không xác định";
                if (priceText != "Đang cập nhật") {
                    var price = parseInt(priceText);
                    totalText = (parseInt(numberOfTicket) * price).formatMoney(0, '.', ',') + "đ";
                    priceText = price.formatMoney(0, '.', ',') + '/người';
                }

                //if (closest.find('p.price del').length > 0) {
                //    currentBookingDiv.find('td.info-table-price').html('<strong><del>' + priceText + '</del></strong>');
                //    currentBookingDiv.find('td.amount').html('<del>' + totalText + '</del>');
                //}
                //else {
                currentBookingDiv.find('td.info-table-price').html('<strong>' + priceText + '</strong>');
                currentBookingDiv.find('td.amount').html(totalText);
                //}

                //Init route feedback Form
                currentBookingDiv.find('input[name=RouteId]').val(closest.attr('route-id'));

                currentBookingDiv.find('a.feedback-like-button').click(function (event) {
                    event.preventDefault();
                    var form = jQuery(this).closest('form');
                    form.find('input[name=VoteUp]').val("true");
                    var response = submitRouteFeedback(form);

                    //Remove some unusual
                    form.find('.feedback-btns').remove();
                    form.find('.dislike-feedback').remove();
                    form.find('.point-arrow').remove();

                    //Show result
                    if (false == response) {
                        form.find('.feedback-response p').text("Cảm ơn bạn đã dành thời gian quý báu đánh giá về chuyến đi. Hiện hệ thống server của chúng tôi phát hiện đánh giá của bạn bị lỗi, bạn vui lòng đánh giá lại sau.");
                        form.find('.feedback-response').css('border-color', "#FF0000");
                    }
                    form.find('.feedback-response').css("top", 72).show();
                });

                currentBookingDiv.find('a.feedback-dislike-button').click(function (event) {
                    event.preventDefault();
                    var form = jQuery(this).closest('form');
                    form.find('input[name=VoteUp]').val("false");
                    form.find('.dislike-feedback').show();
                });

                currentBookingDiv.find('a.feedback-send-button').click(function (event) {
                    event.preventDefault();
                    var form = jQuery(this).closest('form');
                    var response = submitRouteFeedback(form);

                    //Remove some unusual
                    form.find('.feedback-btns').remove();
                    form.find('.dislike-feedback').remove();
                    form.find('.point-arrow').remove();

                    //Show result
                    if (false == response) {
                        form.find('.feedback-response p').text("Cảm ơn bạn đã dành thời gian quý báu đánh giá về chuyến đi. Hiện hệ thống server của chúng tôi phát hiện đánh giá của bạn bị lỗi, bạn vui lòng đánh giá lại sau.");
                        form.find('.feedback-response').css('border-color', "#FF0000");
                    }
                    form.find('.feedback-response').css("top", 72).show();
                });


                //Close button
                currentBookingDiv.find('a.close').click(function () {
                    currentBookingDiv.hide();
                    rollBackToNormalButton(closest.find('a.open'));
                });

                //Close loading
                hideLoading();

            });
        }

        //Change to close button
        changeToCloseButton(this);

        //Tracking
        ga('send', 'event', 'button', 'click', 'Call Center');
        mixpanel.track("Call Center");
    });
}

function maskEventOnBookSeatButton() {
    $(document).on('click', 'a.hasSeat', null, function () {
        //Get call center
        var closest = $(this).closest('.schedule-ticket');

        var currentScheduleId = closest.attr('schedule-id');
        var currentFromTime = closest.find("#FromTimes").length > 0 ? closest.find('select#FromTimes option:selected').val() : closest.find(".span-from-time").text().substr(0, 5);

        //Hide all details tag, tabs tag
        hideDetailTab(closest);

        //Show loading
        showLoading();

        //Check exist load before
        var existingBookingSeatDiv = closest.find('div.ticket-booking-detail-seat-selection[data-schedule=' + currentScheduleId + '][data-time="' + currentFromTime + '"]');
        if (existingBookingSeatDiv.length > 0) {
            //updateBookingDetails(closest);
            //Show only ticket seat selection
            existingBookingSeatDiv.show();

            //Close loading
            hideLoading();

        } else {

            //Calculate deptime
            var sFromTime = "";
            var sToTime = "";

            if (closest.find("#FromTimes").length > 0) {
                sFromTime = closest.find("#FromTimes option:selected").val();
            }
            else {
                sFromTime = closest.find(".span-from-time").text().substr(0, 5);
            }
            if (closest.find("#ToTimes").length > 0) {
                sToTime = closest.find("#ToTimes option:selected").val();
            } else {
                sToTime = closest.find(".span-to-time").text();
            }

            var depTime = $('#span-current-date').html() + "-" + sFromTime;
            depTime = depTime.replace(/\//g, "-").replace(":", "-") + "-00";

            //sToTime.match(/^([0-9]*:([0-9]*)?\s*\+([0-9]*)n)$/);
            //var dropTime = $('#span-current-date').html() + "-" + RegEx.$1 + RegEx.$2;


            //Get some valuable
            var scheduleDetailId = closest.attr('schedule-detail-id');
            //var isBookTempSeat = closest.attr('isbooktempseat');
            var isBookTempSeat = 'NO';
            var routeId = closest.attr('route-id');
            var scheduleId = closest.attr('schedule-id');
            var fromStopId = closest.attr('fromstop-id');
            var toStopId = closest.attr('tostop-id');
            var operatorId = closest.attr('operator-id');
            var price = closest.find('p.price').attr('data-value');
            if (price == 'Đang cập nhật') {
                price = 0;
                isBookTempSeat = 'YES';
            } else {
                price = price.replace(/,/g, "");
                price = price.replace(/\./g, "");
            }

            var operatorName = closest.find('p.transporter-name').text();
            var routeName = closest.find('p.route').text();
            var fromStopName = closest.find('p.place').attr('data-value');
            var toStopName = closest.find('p.dest-place').attr('data-value');
            var routeTime = closest.attr('route-time');

            //Before get, show loading


            $.get('/vi-VN/Booking/GetSeatTemplate?routeId=' + routeId + '&scheduleId=' + scheduleId
                + '&fromStopId=' + fromStopId + '&toStopId=' + toStopId + '&departureDateTime=' + depTime + "&fare=" + price
                + "&isBookTempSeat=" + isBookTempSeat + "&scheduleDetailId=" + scheduleDetailId + "&routeTime=" + routeTime, function (data) {
                    //Append data
                    closest.append(data);

                    //Update booking details
                    var currentBookingDiv = closest.find('div.ticket-booking-detail-seat-selection[data-schedule=' + currentScheduleId + '][data-time="' + currentFromTime + '"]');
                    currentBookingDiv.find('td.info-table-route-name').html('<strong>' + routeName + '</strong>');
                    currentBookingDiv.find('td.info-table-fromstop-name').html('<strong>' + fromStopName + '</strong>');
                    currentBookingDiv.find('td.info-table-tostop-name').html('<strong>' + toStopName + '</strong>');
                    currentBookingDiv.find('td.info-table-from-time').html('<strong>' + sFromTime + '</strong>');
                    currentBookingDiv.find('td.info-table-to-time').html('<strong>' + sToTime + '</strong>');

                    //var numberOfTicket = $('#passengerNum').val();
                    //currentBookingDiv.find('td.info-table-number-ticket').html('<strong>' + numberOfTicket + '</strong>');

                    var priceText = closest.find('p.price').attr('data-value');
                    //var totalText = "0";
                    var totalText = "";
                    var price = 0;

                    if (priceText != "Đang cập nhật") {
                        price = parseInt(priceText);
                        //totalText = (parseInt(numberOfTicket) * price).formatMoney(0, '.', ',') + "đ";
                        priceText = price.formatMoney(0, '.', ',') + '/người';
                    }

                    //if (priceText != "Đang cập nhật") {
                    //    if (isBookTempSeat != "YES") {
                    //        price = parseInt(priceText);
                    //        //totalText = (parseInt(numberOfTicket) * price).formatMoney(0, '.', ',') + "đ";
                    //        priceText = price.formatMoney(0, '.', ',') + '/người';
                    //    } else {
                    //        priceText = 'Đang cập nhật';
                    //    }
                    //}
                    if (isBookTempSeat != "YES") {
                        currentBookingDiv.find('td.info-table-price').html('<strong>' + priceText + '</strong>');
                    } else {
                        currentBookingDiv.find('td.info-table-price').html('<strong style="color:red;">Chưa công bố</strong>');
                    }
                    currentBookingDiv.find('td.amount').html(totalText);

                    //Update hidden for booking
                    currentBookingDiv.find('input[name=SDepartureTime]').val(depTime);
                    currentBookingDiv.find('input[name=SDropOffTime]').val(sToTime);
                    currentBookingDiv.find('input[name=FromBusStopId]').val(fromStopId);
                    currentBookingDiv.find('input[name=ToBusStopId]').val(toStopId);
                    currentBookingDiv.find('input[name=RouteId]').val(routeId);
                    currentBookingDiv.find('input[name=ScheduleId]').val(scheduleId);
                    currentBookingDiv.find('input[name=FromBusStopName]').val(fromStopName);
                    currentBookingDiv.find('input[name=ToBusStopName]').val(toStopName);
                    currentBookingDiv.find('input[name=RouteName]').val(routeName);
                    currentBookingDiv.find('input[name=OperatorName]').val(operatorName);
                    currentBookingDiv.find('input[name=OperatorId]').val(operatorId);
                    currentBookingDiv.find('input[name=FarePerPeople]').val(price);
                    currentBookingDiv.find('input[name=IsBookTempSeat]').val(isBookTempSeat);
                    currentBookingDiv.find('input[name=ScheduleDetailId]').val(scheduleDetailId);
                    //Select ticket
                    var countticket = 0;
                    //var totalFare = 0;
                    //var seatNum = [];
                    //var seatFare = [];

                    var selectedSeats = currentBookingDiv.find('td.info-table-seatcode');
                    var sBookingSeats = currentBookingDiv.find('input[name=SBookingSeats]');
                    var sExpectedTFare = currentBookingDiv.find('input[name=ExpectedTotalFare]');

                    currentBookingDiv.find('.detail-seat-template-specific li').click(function () {
                        var that = $(this);
                        // hien thi danh sach ghe da chon
                        var seats = selectedSeats.text();

                        if (that.hasClass("seat-avail")) {
                            if (isBookTempSeat == "YES") {
                                if (countticket >= 4) {
                                    alert('Xin lỗi, bạn chỉ được chọn tối đa 4 ghế trong một lần mua!');
                                    return;
                                }
                            } else {
                                if (countticket >= 6) {
                                    alert('Xin lỗi, vui lòng chọn tối đa 6 vé trong một lần mua!');
                                    return;
                                }
                            }
                            //if (scheduleDetailId != 0 && scheduleDetailId != null) {
                            //    if (countticket >= 4) {
                            //        alert('Xin lỗi, bạn chỉ được chọn tối đa 4 ghế trong một lần mua!');
                            //        return;
                            //    }
                            //} else {
                            //    if (countticket >= 6) {
                            //        alert('Xin lỗi, vui lòng chọn tối đa 6 vé trong một lần mua!');
                            //        return;
                            //    }
                            //}
                            that.removeClass("seat-avail").addClass("seat-selected");
                            if (countticket > 0) {
                                seats += ', ';
                            }
                            else {
                                seats = '';
                            }
                            seats += that.attr('data-seat-code');
                            countticket++;


                            var comma = sBookingSeats.val() == '' ? '' : ',';
                            // luu danh sach ghe da chon + seat number + gia ve de post 
                            sBookingSeats.val(sBookingSeats.val() + comma + that.attr("data-seat-code") + '-' + that.attr("data-seat-num") + '-' + that.attr("data-fare"));
                            sExpectedTFare.val(+sExpectedTFare.val().replace('.', '') + +that.attr("data-fare"));
                        }
                        else if (that.hasClass('seat-selected')) {
                            that.removeClass("seat-selected").addClass("seat-avail");
                            var tempStr = ', ' + seats + ',';
                            seats = tempStr.replace(', ' + that.attr('data-seat-code') + ',', ',').substr(2);

                            seats = seats.substr(0, seats.length - 1);
                            countticket--;
                            if (countticket == 0) {
                                seats = 'Chưa chọn ghế';
                            }
                            sExpectedTFare.val(+sExpectedTFare.val().replace('.', '') - +that.attr("data-fare"));
                            var sTemp = sBookingSeats.val();
                            sTemp = (',' + sTemp + ',').replace(new RegExp(',' + that.attr('data-seat-code') + '-' + that.attr('data-seat-num') + '-\\d+,'), ',');
                            sBookingSeats.val(sTemp.substr(1, sTemp.length - 2));
                        }

                        if (isBookTempSeat != "YES") {
                            currentBookingDiv.find('td.amount').text(numberWithDot(sExpectedTFare.val()));
                        }
                        selectedSeats.html('<strong>' + seats + '</strong>');

                    });

                    currentBookingDiv.find('a.cont-btn').click(function () {
                        if (selectedSeats.text() === 'Chưa chọn ghế') {
                            alert('Vui lòng chọn ít nhất 1 chỗ ngồi!');
                            return false;
                        }
                        else {

                            //Tracking
                            ga('send', 'event', 'button', 'click', 'Continue Booking');

                            //Show wait loading
                            showLoading();

                            currentBookingDiv.find('.frmSeatSelection').submit();
                            return true;
                        }
                    });

                    //Close button
                    currentBookingDiv.find('a.close').click(function () {
                        currentBookingDiv.hide();
                        rollBackToNormalButton(closest.find('a.open'));
                    });

                    //Close loading
                    hideLoading();

                });
        }

        //Change to close button
        changeToCloseButton(this);

        //Tracking
        ga('send', 'event', 'button', 'click', 'Book Seat');
    });
}

// Bắt sự kiện khi click vào nút Đặt chỗ (sự kiện 2/9) giành cho wait list
// cái này dùng luôn cho các chuyến hết vé
function maskEventOnBookTempSeatButton() {
    $(document).on('click', 'a.wait-list', function () {
        // show loading
        showLoading();
        //Get call center
        var closest = $(this).closest('.schedule-ticket');
        var operatorName = closest.attr('operator-name');
        var fromStopName = closest.attr('fromstop-name');
        var toStopName = closest.attr('tostop-name');
        var fromId = closest.attr('fromstate-id');
        var toId = closest.attr('tostate-id');
        var date = closest.attr('departure-date');
        var isBusOperatorId = closest.attr('isbusoperator-id');
        var deparDate = closest.attr('departure-date');
        var isSoldOut = closest.attr('is-sold-out');
        var fromHour = closest.attr('from-hour');
        var fromMinute = closest.attr('from-minute');
        if (fromHour.length == 1) {
            fromHour = '0' + fromHour;
        }
        if (fromMinute.length == 1) {
            fromMinute = '0' + fromMinute;
        }
        var fromTimeFormat = fromHour + ':' + fromMinute;

        $.get('/vi-VN/Booking/GetTempalteWaitList?isBusOperatorId=' + isBusOperatorId + '&isSoldOut=' + isSoldOut, function (data) {
            //Append data
            closest.append(data.Data.htmlContent);
            var thongbao = closest.find('.thongbao');
            thongbao.find('.span-operator-name').text(operatorName);
            thongbao.find('.span-fromstop-name').text(fromStopName);
            thongbao.find('.span-tostop-name').text(toStopName);
            thongbao.find('.span-depar-date').text(deparDate);
            thongbao.find('.span-depar-hour').text(fromTimeFormat);

            var currentBookingDiv = closest.find('div.wait-list-container');
            var messageError = currentBookingDiv.find('.wait-list-input .message-error');

            //Close button
            currentBookingDiv.find('a.close').click(function () {
                currentBookingDiv.hide();
                rollBackToNormalButton(closest.find('a.open'));
            });

            //Calculate deptime
            var sFromTime = "";
            var sToTime = "";

            if (closest.find("#FromTimes").length > 0) {
                sFromTime = closest.find("#FromTimes option:selected").val();
            }
            else {
                sFromTime = closest.find(".span-from-time").text().substr(0, 5);
            }

            var depTime = $('#span-current-date').html() + "-" + sFromTime;
            depTime = depTime.replace(/\//g, "-").replace(":", "-") + "-00";

            // kiểm tra có phải đang ở trang nhà xe không
            // nếu đang ở trang nhà xe thì isBusOperatorId > 0
            if (isBusOperatorId > 0) {
                // Tạo link tìm vé
                $.ajax({
                    url: '/vi-VN/Booking/GetLinkSearchWaitList',
                    type: 'post',
                    data: {
                        fromName: fromStopName,
                        toName: toStopName,
                        fromId: fromId,
                        toId: toId,
                        fromType: 1,
                        toType: 1,
                        date: date
                    },
                    success: function (result) {
                        var url = 'http://vexere.com/vi-VN' + result;
                        currentBookingDiv.find('.search-ticket-wait-list').attr('href', url);
                    }
                });
            }

            // hide loading
            hideLoading();

            // Gửi request lên server submit wait list
            currentBookingDiv.find('.input-giucho-gui').click(function () {
                var operatorId = closest.attr('operator-id');
                var routeId = closest.attr('route-id');
                var fromstopId = closest.attr('fromstop-id');
                var tostopId = closest.attr('tostop-id');
                var scheduleId = closest.attr('schedule-id');
                var isBookTempSeat = closest.attr('isbooktempseat');
                var scheduleDetailId = closest.attr('schedule-detail-id');
                var departureTime = depTime;

                var that = $(this).closest('.wait-list-container');
                var name = that.find('.giucho-name').val();
                var phone = that.find('.giucho-phone').val();
                var email = that.find('.giucho-email').val();
                var numSeat = that.find('.giucho-numSeat').val();
                if (name.length != 0) {
                    if ((phone.length == 11 || phone.length == 10) && !isNaN(phone)) {
                        if (email.length != 0) {
                            if (numSeat != 0) {
                                $.ajax({
                                    url: '/vi-VN/Booking/CheckWaitList',
                                    type: 'post',
                                    data: {
                                        phone: phone,
                                        email: email,
                                        routeId: routeId
                                    },
                                    success: function (result) {
                                        if (result.Data.success == 0) {
                                            // gửi ajax để submit thông tin khách hàng chờ đặt vé
                                            $.ajax({
                                                url: '/vi-VN/Booking/SubmitSaveWaitList',
                                                type: 'post',
                                                data: {
                                                    name: name,
                                                    phone: phone,
                                                    email: email,
                                                    numSeat: numSeat,
                                                    operatorId: operatorId,
                                                    routeId: routeId,
                                                    fromstopId: fromstopId,
                                                    tostopId: tostopId,
                                                    scheduleId: scheduleId,
                                                    isBookTempSeat: isBookTempSeat,
                                                    scheduleDetailId: scheduleDetailId,
                                                    departureTime: departureTime
                                                },
                                                success: function (result2) {
                                                    currentBookingDiv.find('.thongbao').remove();
                                                    if (result2.Data.success == 1) {
                                                        currentBookingDiv.find('.wait-list-input').html('' +
                                                                    '<div class="message success-message">' +
        	                                                            '<div class="icon"><img alt="" src="http://vexere.com/Content/payment/images/success-icon.png"></div>' +
                                                                        '<div class="message-content">' +
                                                                            '<p style="color: #000;"><em>Cảm ơn quý khách đã sử dụng dịch vụ đặt vé tại trang web VeXeRe.Com – hệ thống vé xe lớn nhất Việt Nam. Thông tin của quý khách đã được lưu vào danh sách đăng ký đặt vé. Chúng tôi sẽ thông báo cho quý khách qua Email trong trường hợp có vé phù hợp với lịch trình của hành quý khách.</em></p>' +
                                                                        '</div></div>');
                                                    } else {
                                                        currentBookingDiv.find('.wait-list-input').html('' +
                                                                    '<div class="message error-message">' +
        	                                                            '<div class="icon"><img alt="" src="http://vexere.com/Content/payment/images/error-icon.png"></div>' +
                                                                        '<div class="message-content">' +
                                                                            '<p style="color: #000;"><em>Quá trình đăng kí bị lỗi. Xin quý khách vui lòng thử lại. Nếu tiếp tục nhận được thông báo lỗi, quý khách có thể gọi điện về tổng đài 19006484 để được hỗ trợ thêm.<br/>' +
                                                                            'Cảm ơn quý khách đã sử dụng dịch vụ đặt vé của VeXeRe.com!</em></p>' +
                                                                        '</div></div>');
                                                    }
                                                }
                                            });
                                        } else {
                                            messageError.show();
                                            messageError.html('Thông tin của quý khách đã có trong Danh sách đăng kí đặt vé của chúng tôi. VeXeRe sẽ thông báo cho quý khách qua Email trong trường hợp có vé phù hợp.');
                                            that.find('.giucho-numSeat').trigger('focus');
                                        }
                                    }
                                });
                            } else {
                                messageError.show();
                                messageError.html('Vui lòng chọn số lượng ghế bạn muốn đặt chỗ.');
                                that.find('.giucho-numSeat').trigger('focus');
                            }
                        } else {
                            messageError.show();
                            messageError.html('Email không chính xác. Vui lòng kiểm tra lại.');
                            that.find('.giucho-email').trigger('focus');
                        }
                    } else {
                        messageError.show();
                        messageError.html('Số điện thoại không chính xác. Vui lòng kiểm tra lại.');
                        that.find('.giucho-phone').trigger('focus');
                    }
                } else {
                    messageError.show();
                    messageError.html('Họ tên không chính xác. Vui lòng kiểm tra lại.');
                    that.find('.giucho-name').trigger('focus');
                }
            });
        });

        //Change to close button
        changeToCloseButton(this);


    });
}

function maskEventOnCloseButton() {
    $(document).on('click', 'a.open', null, function () {

        //Close tab
        var closest = $(this).closest('.schedule-ticket');

        //Hide all details tag, tabs tag
        hideDetailTab(closest);

        //Change to open button
        rollBackToNormalButton(this);
    });
}

//Init search ticket page
function initSearchTicketPage() {
    //Filters
    maskEventOnOperatorFilter();
    maskEventOnBenefitFilter();
    maskEventOnFromStopFilter();
    maskEventOnToStopFilter();
    maskEventOnRatingFilter();
    maskEventOnPriceFilter();

    //Tool tip
    maskTipPopOver();

    //Time event
    maskEventOnFromTime();
    maskEventOnToTime();

    //Comment button
    maskEventOnCommentButton();

    //Detail tab
    maskEventOnDetailTab();
    maskEventOnDetailLink();
    maskEventOnCloseTabButton();

    //Mask event on call center, book seat button
    maskEventOnBookSeatButton();
    maskEventOnCallCenterButton();
    maskEventOnCloseButton();
    maskEventOnBookTempSeatButton();
}

//Lấy thông tin tuyến đường
function GetRouteInfo(fromType, fromId, toType, toId, departureTime) {
    $.ajax({
        type: "POST",
        url: '/vi-VN/Booking/GetRouteInfo',
        data: { fromType: fromType, fromId: fromId, toType: toType, toId: toId, departureTime: departureTime },
        success: function (response) {
            jQuery('#routeInfoPartial').replaceWith(response);
        },
        error: function () {
            //alert('Opp. Lỗi không thể lấy thông tin tuyến đường, quý khách vui lòng thử lại sau.');
        }
    });
}

//Lấy thông tin những nhà xe khách chạy cùng tuyến
function GetDifferentRoute(fromType, fromId, toType, toId, departureTime, busOperatorId, holidayKey) {
    $.ajax({
        type: "POST",
        url: '/vi-VN/Booking/GetDifferentOperatorFindTicket',
        data: { fromType: fromType, fromId: fromId, toType: toType, toId: toId, departureTime: departureTime, busOperatorId: busOperatorId, holidayKey: holidayKey },
        success: function (response) {
            jQuery('#differentRoutePartial').replaceWith(response);
        },
        error: function () {
            //alert('Opp. Lỗi không thể lấy thông tin tuyến đường, quý khách vui lòng thử lại sau.');
        }
    });
}

//Lấy những tuyến đường lân cận
function GetNearRoute(fromType, fromId, toType, toId, departureTime, busOperatorId, holidayKey) {
    $.ajax({
        type: "POST",
        url: '/vi-VN/Booking/GetNearFindTicket',
        data: { fromType: fromType, fromId: fromId, toType: toType, toId: toId, departureTime: departureTime, busOperatorId: busOperatorId, holidayKey: holidayKey },
        success: function (response) {
            jQuery('#nearRoutePartial').replaceWith(response);
        },
        error: function () {
            //alert('Opp. Lỗi không thể lấy thông tin tuyến đường, quý khách vui lòng thử lại sau.');
        }
    });
}


