if (typeof _defaultLat == 'undefined') {
    window._defaultLat = {
        lat: -34.6550036,
        lng: -58.6784542
    };
}
window.map = false;
window.infobox = false;
window.markers = [];
window.itemPage = 1;
function seeMoreItems(){
    window.itemPage++;
    if ($('.item-page-'+(itemPage+1)).length==0){
        $('.see-more').hide();
    }
    $('.item-page-'+itemPage).show();

}
function loadMarkers(callback) {
    callback(window._mapItems);
}
var addMarkers = function(props, map) {
    $.each(props, function(i, prop) {
    try { 
        prop.position = JSON.parse(prop.position);
    } catch (e){
        console.log(e)
        return true;
    }
        var latlng = new google.maps.LatLng(prop.position.lat, prop.position.lng);
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            icon: new google.maps.MarkerImage(_baseUrl + 'images/' + prop.markerIcon, null, null,
                // new google.maps.Point(0,0),
                null, new google.maps.Size(36, 36)),
            draggable: false,
            animation: google.maps.Animation.DROP,
        });
        console.log('addMarker '+i)
        var infoboxContent = 
        '<div class="infoW">' + 
        '<div class="propImg">' + 
        '<img src="' + _baseUrl + 'images/prop/' + prop.image + '">' + 
        '<div class="propBg">' + 
        '<div class="propPrice">' + prop.price + '</div>' + 
        '<div class="propType">' + prop.type + '</div>' + 
        '</div>' + '</div>' + 
        '<div class="paWrapper">' + 
        '<div class="propTitle">' + prop.title + '</div>' + 
        '<div class="propAddress">' + prop.address + '</div>' + 
        '</div>' + 
        '<div class="propRating">' + 
        '<span class="fa fa-star"></span>' + 
        '<span class="fa fa-star"></span>' + 
        '<span class="fa fa-star"></span>' + 
        '<span class="fa fa-star"></span>' + 
        '<span class="fa fa-star-o"></span>' + 
        '</div>' + 
        '<ul class="propFeat">' + 
        '<li><span class="fa fa-moon-o"></span> 1</li>' + 
        '<li><span class="icon-drop"></span> 2</li>' + 
        '<li><span class="icon-frame"></span> 33</li>' + 
        '</ul>' + '<div class="clearfix"></div>' + 
        '<div class="infoButtons">' + 
        '<a class="btn btn-sm btn-round btn-gray btn-o closeInfo">Close</a>' + 
        '<a href="#l" class="btn btn-sm btn-round btn-green viewInfo">View</a>' + 
        '</div>' + '</div>';
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infobox.setContent(infoboxContent);
                infobox.open(map, marker);
            }
        })(marker, i));
        $(document).on('click', '.closeInfo', function() {
            infobox.open(null, null);
        });
        markers.push(marker);
    });
}

function loadHomeMap() {
    if ($('#home-map').length > 0) {
        loadMarkers(function(props) {
            window.infobox = new InfoBox({
                disableAutoPan: false,
                maxWidth: 202,
                pixelOffset: new google.maps.Size(-101, -285),
                zIndex: null,
                boxStyle: {
                    background: "url('" + _baseUrl + "images/infobox-bg.png') no-repeat",
                    opacity: 1,
                    width: "202px",
                    height: "245px"
                },
                closeBoxMargin: "28px 26px 0px 0px",
                closeBoxURL: "",
                infoBoxClearance: new google.maps.Size(1, 1),
                pane: "floatPane",
                enableEventPropagation: false
            });
            var options = {
                zoom: 14,
                mapTypeId: 'Styled',
                disableDefaultUI: true,
                mapTypeControlOptions: {
                    mapTypeIds: ['Styled']
                },
                scrollwheel: false
            };
            var styles = [{
                stylers: [{
                    hue: "#cccccc"
                }, {
                    saturation: -100
                }]
            }, {
                featureType: "road",
                elementType: "geometry",
                stylers: [{
                    lightness: 100
                }, {
                    visibility: "simplified"
                }]
            }, {
                featureType: "road",
                elementType: "labels",
                stylers: [{
                    visibility: "on"
                }]
            }, {
                featureType: "poi",
                stylers: [{
                    visibility: "off"
                }]
            }];
            map = new google.maps.Map(document.getElementById('home-map'), options);
            var styledMapType = new google.maps.StyledMapType(styles, {
                name: 'Styled'
            });
            map.mapTypes.set('Styled', styledMapType);
            map.setCenter(new google.maps.LatLng(_defaultLat.lat, _defaultLat.lng));
            map.setZoom(14);
            addMarkers(props, map);
        });
    }
}
(function($) {
    "use strict";
    loadHomeMap();
    if (!(('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch)) {
        $('body').addClass('no-touch');
    }
    $('.dropdown-select li a').click(function() {
        if (!($(this).parent().hasClass('disabled'))) {
            $(this).prev().prop("checked", true);
            $(this).parent().siblings().removeClass('active');
            $(this).parent().addClass('active');
            $(this).parent().parent().siblings('.dropdown-toggle').children('.dropdown-label').html($(this).text());
        }
    });
    var cityOptions = {
        types: ['(cities)']
    };
    var city = document.getElementById('city');
    $('#advanced').click(function() {
        $('.adv').toggleClass('hidden-xs');
    });
    if (city) {
        var cityAuto = new google.maps.places.Autocomplete(city, cityOptions);
        $('.home-navHandler').click(function() {
            $('.home-nav').toggleClass('active');
            $(this).toggleClass('active');
        });
    }
    //Enable swiping
    $(".carousel-inner").swipe({
        swipeLeft: function(event, direction, distance, duration, fingerCount) {
            $(this).parent().carousel('next');
        },
        swipeRight: function() {
            $(this).parent().carousel('prev');
        }
    });
    $('.modal-su').click(function() {
        $('#signin').modal('hide');
        $('#signup').modal('show');
    });
    $('.modal-si').click(function() {
        $('#signup').modal('hide');
        $('#signin').modal('show');
    });
    $('input, textarea').placeholder();
})(jQuery);