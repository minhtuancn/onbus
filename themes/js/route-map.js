﻿jQuery.fn.getMapDirection = function (param) {
    var directionsService;
    var directionsDisplay;
    var stepDisplay;
    var icon = new google.maps.MarkerImage("http://vexere.com/Images/bus-marker.png");
    var markers = [];
    var map;

    function attachInstructionText(marker, text) {
        google.maps.event.addListener(marker, 'mouseover', function () {
            stepDisplay.setContent(text);
            stepDisplay.open(map, marker);
        });
        google.maps.event.addListener(marker, 'mouseout', function () {
            stepDisplay.close();
        });
    }
    
    directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer({ suppressMarkers: true, polylineOptions: { strokeColor: '#ef4529' } });
    // Instantiate an info window to hold step text.
    stepDisplay = new google.maps.InfoWindow();

    var hochiminh = new google.maps.LatLng(10.881859, 106.630096);
    var myOptions = {
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: hochiminh
    }
    map = new google.maps.Map(jQuery(this)[0], myOptions);
    directionsDisplay.setMap(map);

    var start = param[0];
    console.log(start);
    var end = param[param.length - 1];
console.log(end);
    var waypoints = [];

    for (var i = 1; i < param.length - 1; i++) {
        waypoints.push({ location: param[i], stopover: true });
    }

    var request = {
        origin: start,
        destination: end,
        waypoints: waypoints,
        optimizeWaypoints: true,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
    };
    directionsService.route(request, function (response, status) {
        console.log(status);
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);

            var routeLegs = response.routes[0].legs;
            var len = routeLegs.length;
            var firstLegs = routeLegs[0];

            var marker1 = new google.maps.Marker({
                position: firstLegs.start_location,
                map: map,
                icon: icon
            });

            attachInstructionText(marker1, '<div class="infowindow">' + firstLegs.start_address.substring(0, firstLegs.start_address.length - 10) + '</div>');
            markers.push(marker1);

            for (var i = 0; i < len; i++) {

                var marker2 = new google.maps.Marker({
                    position: routeLegs[i].end_location,
                    map: map,
                    icon: icon
                });
                attachInstructionText(marker2, '<div class="infowindow">' + routeLegs[i].end_address.substring(0, routeLegs[i].end_address.length - 10) + '</div>');

                markers.push(marker2);
            }

        } else {
            alert("www.VeXeRe.com đang liên hệ nhà xe để có được thông tin lịch trình...");
        }
    });
};