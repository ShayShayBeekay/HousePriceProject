/*
S. Brennan-Kelly
4th BSc CSSE

House Price Index Calculator

points_in_circle.js

This file contains the JavaScript for adding the markers for the data points to the map.
*/


//Set up arrays for markers and infowindows for later use.
var markers = Array();
var infowindows = Array();
//Image file for the markers on the map.
var img_home='https://hosting.service.url/~xxxxxxxx/house_price_app/img/home-2.png';


/*
Method for adding the markers to the circle
Parameters: circle centre, circle radius, min and max years, min and max price 
*/
function set_markers_in_circle(c_lat,c_lng,c_rad,minyear,maxyear,minprice,maxprice){
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  // this method is used to capture the response of the http request
  xmlhttp.onreadystatechange = function(){
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      //Delete previous array of markers from the map
      deleteMarkers();
      //Double check marker array is empty
      markers = Array();
      //Double check infowindow array is empty
      infowindows = Array();
      //Parse the response from the AJAX call and store in a JSON array variable called pinpoints
      var pinpoints = JSON.parse(xmlhttp.responseText);
      //counter variable i set to 0
      var i=0;
      //Set up variables for later use
      var lat;
      var lng;
      var price;
      var address;
      var post_latlng;
      var content;
      //Run through all items in array pinpoints.
      for (i = 0;i<pinpoints.length;i++){
        //Set a equal to ith entry in pinpoints
        a=pinpoints[i];
        //Set lat equal to ith entry lat in pinpoints
        lat=parseFloat(a["lat"]);
        //Set lng equal to ith entry lng in pinpoints
        lng=parseFloat(a["lng"]);
        //Set price equal to ith entry price in pinpoints
        price=parseFloat(a["price"]);
        //Set address equal to ith entry adress_string in pinpoints
        address=String(a["address_string"]);
        //Set date equal to ith entry date_of_sale in pinpoints
        date=String(a["date_of_sale"]);
        //Set post_latlng equal to the co-ordinates of ith data point in pinpoints
        post_latlng = new google.maps.LatLng(lat,lng);
        //Sets up content to be displayed in the infowindow for this data point
        content ="<b>Address:</b>  " + address + "</br>" + "<b>Price:</b>  €" + price + '</br>' + "<b>Date of Sale:</b>  " + date;  
        //Call the add_marker method
        add_marker(i,content,address,post_latlng,img_home);
      }
      //Set the map to map.
      setAllMap(map);
    }
  }
  //Sends the AJAX request to call the PHP function points_in_circle with the selector_circle's centre, radius, min and max years and min and max price as parameters
  xmlhttp.open("GET","ajax/points_in_circle.php?c_lat="+c_lat+"&c_lng="+c_lng+"&c_rad="+c_rad+"&minyear="+minyear+"&maxyear="+maxyear+"&minprice="+minprice+"&maxprice="+maxprice,true);
  xmlhttp.send();
}

/*
add_marker method
Parameters: index, content for infowindow,address, co-ordinates and image file.
*/
function add_marker(n,con,add,posit,img){
  //Set up new marker with below options
  markers[n] = new google.maps.Marker({  
    map: map, 
    title: add,
    image: img,
    draggable: false,
    zIndex: 500,
    position: posit,
    animation: google.maps.Animation.DROP,
   });
  add_infoWindow(markers[n],con)
}

/*
add_infoWindow method
Parameters: marker, content for infowindow
*/
function add_infoWindow(marker, message){
  //Set up new infowindow with below options
    var infoWindow = new google.maps.InfoWindow({
        content: message
    });
    //Connect an event lister to the marker, that on click it displays the above infowindow
    google.maps.event.addListener(marker, 'click', function () {
        infoWindow.open(map, marker);
    });
}

// Sets the map on all markers in the array.
//Parameter: map
function setAllMap(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setAllMap(null);
}

// Shows any markers currently in the array.
function showMarkers() {
  setAllMap(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers(){
  //Call clear markers method
  clearMarkers();
  //Set content of the markers array to null
  markers = [];
}