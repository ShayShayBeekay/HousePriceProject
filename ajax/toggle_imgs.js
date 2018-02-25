var image_2010='https://hosting.service.url/~xxxxxxxx/house_price_app/img/2010_colour_map.png';
var imageBounds_10 = new google.maps.LatLngBounds(
      new google.maps.LatLng(51.32061, -10.58),
      new google.maps.LatLng(55.39553, -6.01));
var Overlay_2010 = new google.maps.GroundOverlay(image_2010,imageBounds_10);

var image_2011='https://hosting.service.url/~xxxxxxxx/house_price_app/img/2011_colour_map.png';
var imageBounds_11 = new google.maps.LatLngBounds(
      new google.maps.LatLng(51.395161, -10.89),
      new google.maps.LatLng(55.510753, -5.05));
var Overlay_2011 = new google.maps.GroundOverlay(image_2011,imageBounds_11);

var image_2012='https://hosting.service.url/~xxxxxxxx/house_price_app/img/2012_colour_map.png';
var imageBounds_12 = new google.maps.LatLngBounds(
      new google.maps.LatLng(51.430661, -10.60),
      new google.maps.LatLng(55.395753, -5.06));
var Overlay_2012 = new google.maps.GroundOverlay(image_2012,imageBounds_12);

var image_2013='https://hosting.service.url/~xxxxxxxx/house_price_app/img/2013_colour_map_2.png';
var imageBounds_13 = new google.maps.LatLngBounds(
      new google.maps.LatLng(51.430161, -10.50),
      new google.maps.LatLng(55.410753, -5.1));
var Overlay_2013 = new google.maps.GroundOverlay(image_2013,imageBounds_13);

var image_2014='https://hosting.service.url/~xxxxxxxx/house_price_app/img/2014_colour_map.png';
var imageBounds_14 = new google.maps.LatLngBounds(
      new google.maps.LatLng(51.445161, -10.78),
      new google.maps.LatLng(55.420753, -5.08));
var Overlay_2014 = new google.maps.GroundOverlay(image_2014,imageBounds_14);

function toggle_2010_img(){
	Overlay_2010.setMap(map);
	Overlay_2011.setMap(null);
	Overlay_2012.setMap(null);
	Overlay_2013.setMap(null);
	Overlay_2014.setMap(null);
	
}
function toggle_2011_img(){
	Overlay_2011.setMap(map);
	Overlay_2010.setMap(null);
	Overlay_2012.setMap(null);
	Overlay_2013.setMap(null);
	Overlay_2014.setMap(null);
	
}
function toggle_2012_img(){
	Overlay_2012.setMap(map);
	Overlay_2010.setMap(null);
	Overlay_2011.setMap(null);
	Overlay_2013.setMap(null);
	Overlay_2014.setMap(null);
	
}
function toggle_2013_img(){
	Overlay_2013.setMap(map);
	Overlay_2010.setMap(null);
	Overlay_2011.setMap(null);
	Overlay_2012.setMap(null);
	Overlay_2014.setMap(null);
	
}
function toggle_2014_img(){
	Overlay_2014.setMap(map);
	Overlay_2010.setMap(null);
	Overlay_2011.setMap(null);
	Overlay_2012.setMap(null);
	Overlay_2013.setMap(null);
	
}

function toggle_img(overlay){
	Overlay_2010.setMap(null);
	Overlay_2011.setMap(null);
	Overlay_2012.setMap(null);
	Overlay_2013.setMap(null);
	Overlay_2014.setMap(null);
	overlay.setMap(map);
}