/*
S. Brennan-Kelly
4th BSc CSSE

House Price Index Calculator

toggle_imgs.js

This file contains the JavaScript for toggling the colour-coded maps for the Overview section of the application.
*/



//Variable for storing pointer to image file for 2010 colour-coded map.
var image_2010='https://hosting.service.url/~xxxxxxxx/house_price_app/img/2010_colour_map.png';
//Variable for storing the co-ordinates for where the image file above should be placed on the map.
var imageBounds_10 = new google.maps.LatLngBounds(
      new google.maps.LatLng(51.32561, -10.61),
      new google.maps.LatLng(55.38553, -5.98));
//Variable for storing the Google Maps Overlay for the 2010 map.
var Overlay_2010 = new google.maps.GroundOverlay(image_2010,imageBounds_10);

//Variable for storing pointer to image file for 2011 colour-coded map.
var image_2011='https://hosting.service.url/~xxxxxxxx/house_price_app/img/2011_colour_map.png';
//Variable for storing the co-ordinates for where the image file above should be placed on the map.
var imageBounds_11 = new google.maps.LatLngBounds(
      new google.maps.LatLng(51.455161, -10.93),
      new google.maps.LatLng(55.500753, -5.05));
//Variable for storing the Google Maps Overlay for the 2010 map.
var Overlay_2011 = new google.maps.GroundOverlay(image_2011,imageBounds_11);

//Variable for storing pointer to image file for 2012 colour-coded map.
var image_2012='https://hosting.service.url/~xxxxxxxx/house_price_app/img/2012_colour_map.png';
//Variable for storing the co-ordinates for where the image file above should be placed on the map.
var imageBounds_12 = new google.maps.LatLngBounds(
      new google.maps.LatLng(51.427661, -10.64),
      new google.maps.LatLng(55.410753, -5.05));
//Variable for storing the Google Maps Overlay for the 2010 map.
var Overlay_2012 = new google.maps.GroundOverlay(image_2012,imageBounds_12);

//Variable for storing pointer to image file for 2013 colour-coded map.
var image_2013='https://hosting.service.url/~xxxxxxxx/house_price_app/img/2013_colour_map_2.png';
//Variable for storing the co-ordinates for where the image file above should be placed on the map.
var imageBounds_13 = new google.maps.LatLngBounds(
      new google.maps.LatLng(51.435161, -10.52),
      new google.maps.LatLng(55.413753, -5.06));
//Variable for storing the Google Maps Overlay for the 2010 map.
var Overlay_2013 = new google.maps.GroundOverlay(image_2013,imageBounds_13);

//Variable for storing pointer to image file for 2014 colour-coded map.
var image_2014='https://hosting.service.url/~xxxxxxxx/house_price_app/img/2014_colour_map.png';
//Variable for storing the co-ordinates for where the image file above should be placed on the map.
var imageBounds_14 = new google.maps.LatLngBounds(
      new google.maps.LatLng(51.425161, -10.77),
      new google.maps.LatLng(55.41553, -5.07));
//Variable for storing the Google Maps Overlay for the 2010 map.
var Overlay_2014 = new google.maps.GroundOverlay(image_2014,imageBounds_14);


/*Function for toggling the 2010 colour-coded map. Sets the overlays for other years onto a null map
and then sets the image 2010 as the current overlay.
*/
function toggle_2010_img(){
	Overlay_2010.setMap(map);
	Overlay_2011.setMap(null);
	Overlay_2012.setMap(null);
	Overlay_2013.setMap(null);
	Overlay_2014.setMap(null);
}

/*Function for toggling the 2011 colour-coded map. Sets the overlays for other years onto a null map
and then sets the image 2011 as the current overlay.
*/
function toggle_2011_img(){
	Overlay_2011.setMap(map);
	Overlay_2010.setMap(null);
	Overlay_2012.setMap(null);
	Overlay_2013.setMap(null);
	Overlay_2014.setMap(null);
}

/*Function for toggling the 2012 colour-coded map. Sets the overlays for other years onto a null map
and then sets the image 2012 as the current overlay.
*/
function toggle_2012_img(){
	Overlay_2012.setMap(map);
	Overlay_2010.setMap(null);
	Overlay_2011.setMap(null);
	Overlay_2013.setMap(null);
	Overlay_2014.setMap(null);
}

/*Function for toggling the 2013 colour-coded map. Sets the overlays for other years onto a null map
and then sets the image 2013 as the current overlay.
*/
function toggle_2013_img(){
	Overlay_2013.setMap(map);
	Overlay_2010.setMap(null);
	Overlay_2011.setMap(null);
	Overlay_2012.setMap(null);
	Overlay_2014.setMap(null);
}

/*Function for toggling the 2014 colour-coded map. Sets the overlays for other years onto a null map
and then sets the image 2014 as the current overlay.
*/
function toggle_2014_img(){
	Overlay_2014.setMap(map);
	Overlay_2010.setMap(null);
	Overlay_2011.setMap(null);
	Overlay_2012.setMap(null);
	Overlay_2013.setMap(null);
}

/*
Function written to try compact the above functions into one, by passing the relevant overlay as a parameter.
Caused errors so removed from application.
*/
function toggle_img(overlay){
	Overlay_2010.setMap(null);
	Overlay_2011.setMap(null);
	Overlay_2012.setMap(null);
	Overlay_2013.setMap(null);
	Overlay_2014.setMap(null);
	overlay.setMap(map);
}