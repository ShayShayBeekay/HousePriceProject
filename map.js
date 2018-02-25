
//Function for initialising the map.
//<!--Code for Circle Nonsense-->
var map=null;
var pointArray_10=null;
var pointArray_11=null;
var pointArray_12=null;
var pointArray_13=null;
var pointArray_14=null;
var heatmap=null;
var data_10=true;
var data_11=false;
var bounds=null;
var selector_circle;

function initialize(){
  var a={
    zoom:7,
    center:new google.maps.LatLng(53.4427,-4.5),
    mapTypeId:google.maps.MapTypeId.TERRAIN
  };
  map=new google.maps.Map(document.getElementById("map_canvas"),a);
    var circleOptions = {
      strokeColor: '#555555',
      strokeOpacity: 0.75,
      strokeWeight: 1.5,
      fillColor: '#555555',
      fillOpacity: 0.25,
      map: map,
      draggable: true,
      editable: true,
      center: new google.maps.LatLng(53.09024, -6.712891),
      radius: 25000
    }
};
google.maps.event.addDomListener(window,"load",initialize);


//<!--Script for drawing the circle on the map-->
function drawCircle(l,k,d){
  var g=Math.PI/180;
  var a=180/Math.PI;
  var f=3963;
  var m=1024;
  var n=(k/f)*a;
  var o=n/Math.cos(l.lat()*g);
  var j=new Array();

  if(d==1){
    var b=0;
    var e=m+1}
  else{
    var b=m+1;
    var e=0}
  for(var h=b;(d==1?h<e:h>e);h=h+d){
    var c=Math.PI*(h/(m/2));
    ey=l.lng()+(o*Math.cos(c));
    ex=l.lat()+(n*Math.sin(c));
    j.push(new google.maps.LatLng(ex,ey));
    bounds.extend(j[j.length-1])}
  return j;
}

//<!--jQuery to switch sections-->
$(document).ready(function(){
  $(".part1").click(function(){
    $("#btn1click").show();
    $("#btn2click").hide()
  });
  $(".part2").click(function(){
    $("#btn1click").hide();
    $("#btn2click").show()
  });
});


/*
function toggle_Overview(){
  /*if(heatmap.getMap()==null){
    heatmap.setMap(map);
  }
  remove_circle();
}
function toggle_Detail(){
  /*if(heatmap.getMap()==map){
    heatmap.setMap(null);
  }
  add_circle();
}
//Adds circle to the map
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
/*