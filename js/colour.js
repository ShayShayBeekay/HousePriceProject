/*
S. Brennan-Kelly
4th BSc CSSE

House Price Index Calculator

colour.js

This file contains the JavaScript for adding the colour-dots for each of the data points for the Overview section of the map.
*/


function colour_dots(year){
  if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    // this method is used to capture the response of the http request
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        var locations = JSON.parse(xmlhttp.responseText);
        // and now you can use the array
        var h = 750000;
        var l = 150000;
        var i=0;
        var a;
        var lat;
        var lng;
        var price;
        var num;
        // Calculate percentage, and add point to map
        //NB: Loop Optimisation, put both lines into same for-loop to speed up application.
        for(i=0;i<locations.length;i++){
          a=locations[i];
          lat=parseFloat(a["lat"]);
          lng=parseFloat(a["lng"]);
          price=parseFloat(a["price"]);
          if((price>=50000) & lat>50 & lat<58 & lng>=-10 & lng<=-5){
            num=100 - parseInt(((price- l) * 100) / (h - l));
            addPoint((new google.maps.LatLng(lat, lng)), num);
          }
        }
      }
    }
  xmlhttp.open("GET","colour_points.php?year="+year,true);
  xmlhttp.send();
}
/*
Method to add the colour dot for each data point on the map
Parameters: Point, number
*/
function addPoint(point, number) {
  //Set up options for the colour-dot icon
  var icon = {
    path: "M-20,0a20,20 0 1,0 40,0a20,20 0 1,0 -40,0",
    fillColor: numberToColorRgb(number),
    fillOpacity: .8,
    anchor: new google.maps.Point(0, 0),
    strokeWeight: 0,
    scale: .1
  }
  //Set up marker for the colour-dot icon
  var marker = new google.maps.Marker({
    position: point,
    map: map,
    draggable: false,
    icon: icon
  });
}

/*Method to calculate the colour of the data point.
Parameter: number (permutation of the selling price with respect to the highest and lowest values)
*/
function numberToColorRgb(i) {
  //Calculate amount of red to include
  var red = Math.floor(255 - (255 * i / 100));
  //Calculate amount of green to include
  var green = Math.floor(255 * i / 100);
  return 'rgb(' + red + ',' + green + ',0)';
}