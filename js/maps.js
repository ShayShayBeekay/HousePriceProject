/*
S. Brennan-Kelly
4th BSc CSSE

House Price Index Calculator

maps.js

This file contains the JavaScript for adding the map to the application.
*/

//This function is to initialise the map, called on application load.
function initialize() {
	//Creates a vairable to store the element of id 'map_canvas'
	var map_canvas = document.getElementById('map_canvas');
	//Sets up options for the map, including centre, zoom level and type
	var map_options = {
		center: new google.maps.LatLng(44.5403, -78.5463),
		zoom: 8,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	//Sets up new Google map using the above variables.
	var map = new google.maps.Map(map_canvas, map_options)
}
//Adds event listener to call initialize function on page load.
google.maps.event.addDomListener(window, 'load', initialize);
