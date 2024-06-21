/*--------------------- Copyright (c) 2020 -----------------------
[Master Javascript]
Project: Hotelier
Version: 1.0.0
-------------------------------------------------------------------*/
// map js start
/* ---------------------------------------------
 Google Map Callback Functions
 --------------------------------------------- */

function googleMap() {
    let pt_center = new google.maps.LatLng(-33.9198, 151.2504);
    let mapCanvas = document.getElementById('google_map');
    let styles = [{
        stylers: [{
            saturation: -100
        }]
    }];
    let mapOptions = {
        center: pt_center,
        zoom: 18,
        styles: styles
    };
    let map = new google.maps.Map(mapCanvas, mapOptions);
    let locations = [
        [ pt_center.lat(), pt_center.lng() ],
        [ pt_center.lat() + 0.00066, pt_center.lng() - 0.0006 ],
        [ pt_center.lat() - 0.00055, pt_center.lng() - 0.0014 ],
        [ pt_center.lat() - 0.0007, pt_center.lng() + 0.001 ],
        [ pt_center.lat() + 0.005, pt_center.lng() ],
        [ pt_center.lat() + 0.0055, pt_center.lng() - 0.0007 ],
        [ pt_center.lat() + 0.0055, pt_center.lng() + 0.0007 ]
    ];
    let hotel_package = '<div class="card card-hotel-package">' +
                        '<div class="card-image">' + 
                            '<img src="img/hotel-tour/10.png" alt="">' +
                            '<div class="price"><span>$50 / Night</span></div>' +
                        '</div>' +
                        '<div class="card-body">' +
                            '<a href="" class="card-title">Name Of Hotel</a>' +
                            '<div class="rating-review">' +
                                '<i class="fa fa-star"></i>' +
                                '<i class="fa fa-star"></i>' +
                                '<i class="fa fa-star"></i>' +
                                '<i class="fa fa-star-o"></i>' +
                                '<i class="fa fa-star-o"></i>' +
                            '</div>' +
                            '<div class="review">1+ Review</div>' + 
                        '</div>' +
                    '</div>';

    let infowindow = new google.maps.InfoWindow({
        content: hotel_package,
        maxWidth: 250
    });

    let markers = [];

    for (var i = 0; i < locations.length; i++) {

        let marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][0], locations[i][1]),
            icon: 'img/icons/map-pin.png',
            map: map
        });

        marker.addListener('click', function() {
            for (var j = 0; j < markers.length; j++) {
               markers[j].setIcon('img/icons/map-pin.png');
            }

            marker.setIcon('img/icons/map-pin1.png');
            infowindow.open(map, marker);
        });

        google.maps.event.addListener(infowindow, 'domready', function() {
            
            var iwOuter = jQuery('.gm-style-iw');

            var iwBackground = iwOuter.prev();

            iwOuter.addClass('map-unnecessary-el');

            var btnClose = iwOuter.next();

            setTimeout(function() {
                iwOuter.parent().css({
                    'height': '0'
                });
            }, 300);

            iwOuter.css({
                'top': '249px',
                'left': '100px'
            });
            iwOuter.children(':nth-child(1)').css({
                'overflow': 'unset'
            });
            iwOuter.children(':nth-child(1)').children(':nth-child(1)').css({
                'overflow': 'unset',
                'padding': '5px'
            });

            btnClose.children(':nth-child(1)').hide();
            btnClose.addClass('fa fa-close btn btn-red btn-close');
            btnClose.css({
                'width': '38px',
                'height': '33px',
                'top': '-3px',
                'right': '-42px',
                'background': 'rgba(0,0,0,0.45)'
            });

            // Removes background shadow DIV
            iwBackground.children(':nth-child(2)').css({'display' : 'none'});

            iwBackground.children(':nth-child(3)').children(':nth-child(1)').css({'top': '5px'});
            iwBackground.children(':nth-child(3)').children(':nth-child(1)').children().css({'transform': 'skewX(32.6deg)', 'width': '10px', 'height': '15px'});

            iwBackground.children(':nth-child(3)').children(':nth-child(2)').css({'top': '5px'});
            iwBackground.children(':nth-child(3)').children(':nth-child(2)').children().css({'transform': 'skewX(-32.6deg)', 'width': '10px', 'height': '15px'});

            iwBackground.children(':nth-child(4)').css({'display' : 'none'});
        });
        markers.push(marker);
    }

    map.addListener('click', function() {
        infowindow.close();
    });
}

