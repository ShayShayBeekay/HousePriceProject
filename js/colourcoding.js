var map;

// Locations: title, lat, lng, price
var locations = [
    [53.9024, -6.212891, 94000],
    [53.09024, -6.512891, 150000],
    [51.09024, -6.7191, 12000],
    [53.09024, -6.7918, 56000],
    [4.01024, -6.912891, 190000]
];

var h = 0,
    l = 999999999,
    i;

// Find high and low values
for (i = 0; i < locations.length; i++) {

    if (locations[i][2] > h) {
        h = locations[i][2];
    }

    if (locations[i][2] < l) {
        l = locations[i][2];
    }
}

// Calculate percentage
for (i = 0; i < locations.length; i++) {
    // Red = 0, Green = 100
    locations[i][3] = 100 - parseInt(((locations[i][2] - l) * 100) / (h - l));
}

function initialize() {
    var mapOptions = {
        zoom: 7,
        mapTypeId: google.maps.MapTypeId.TERRAIN,
        center: new google.maps.LatLng(53.09024, -6.712891)
    };

    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    for (i = 0; i < locations.length; i++) {
        addPoint(new google.maps.LatLng(locations[i][0], locations[i][1]), locations[i][3]);
    }
}

function addPoint(point, number) {
    var icon = {
        path: "M-20,0a20,20 0 1,0 40,0a20,20 0 1,0 -40,0",
        fillColor: numberToColorRgb(number),
        fillOpacity: .8,
        anchor: new google.maps.Point(0, 0),
        strokeWeight: 0,
        scale: .125
    }

    var marker = new google.maps.Marker({
        position: point,
        map: map,
        draggable: false,
        icon: icon
    });
}

function numberToColorRgb(i) {
    var red = Math.floor(255 - (255 * i / 100));
    var green = Math.floor(255 * i / 100);
    return 'rgb(' + red + ',' + green + ',0)';
}

initialize();