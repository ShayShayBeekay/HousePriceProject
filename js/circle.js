/*
S. Brennan-Kelly
4th BSc CSSE

House Price Index Calculator

circle.js

This file contains the JavaScript for adding and removing the selector circle to the map for the Detailed section of the application.
*/


//Setting up of variables for later use
var bounds=null;

//Setting up variables for initial centre of circle.
var lat=53.09024;
var lng=-6.712891;

//Setting initial radius of circle to 10km
var circle_radius=10000;

//Setting up aesthetic variables and options for selector circle.
var circleOptions = {
  strokeColor: '#555555',
  strokeOpacity: 0.75,
  strokeWeight: 1.5,
  fillColor: '#555555',
  fillOpacity: 0.1,
  map: map,
  draggable: true,
  editable: true,
  center: new google.maps.LatLng(53.09024, -6.712891),
  radius: 10000
};

// Add the selector_circle to the map.
var selector_circle= new google.maps.Circle(circleOptions);


//Get new radius when selector_circle is expanded/contracted
google.maps.event.addListener(selector_circle, 'radius_changed', function(){
    //Update the values of the radius and circle centre
    circle_radius=selector_circle.getRadius();
    circle_centre=selector_circle.getCenter();
    //Update the values for the latitude and longitude of the selector_circle
    lat = circle_centre.lat();
    lng = circle_centre.lng();
    //Call the area_meds() method with the updated values.
    area_meds(lat,lng,circle_radius);
    //Call the set_markers_in_circle() method with the updated values.
    set_markers_in_circle(lat,lng,circle_radius,current_min_year,current_max_year,current_min_price,current_max_price);
});

//Get new centre when selector_circle is moved
google.maps.event.addListener(selector_circle, 'center_changed', function(){
    //Update the values of the radius and circle centre
    circle_radius=selector_circle.getRadius();
    circle_centre=selector_circle.getCenter();
    //Update the values for the latitude and longitude of the selector_circle
    lat = circle_centre.lat();
    lng = circle_centre.lng();
    //Call the area_meds() method with the updated values.
    area_meds(lat,lng,circle_radius);
    //Call the set_markers_in_circle() method with the updated values.
    set_markers_in_circle(lat,lng,circle_radius,current_min_year,current_max_year,current_min_price,current_max_price);
});

//We hide the circle until the user selects to view the detailed map section
remove_circle();

//Add Circle to the map
function add_circle(){
  if(selector_circle.getMap()==null){
    selector_circle.setMap(map);
  }
}
//Remove circle from the map
function remove_circle(){
  if(selector_circle.getMap()==map){
    selector_circle.setMap(null);
  }
}

//Prototype function for the circle, returns bounds, and computed distance from centre and circumference
google.maps.Circle.prototype.contains = function(latLng) {
  return this.getBounds().contains(latLng) && google.maps.geometry.spherical.computeDistanceBetween(this.getCenter(), latLng) <= this.getRadius();
}