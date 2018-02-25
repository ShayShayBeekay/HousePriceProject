/*
S. Brennan-Kelly
4th BSc CSSE

House Price Index Calculator

colour.js

This file contains the JavaScript for miscellaneous functions of the application.
*/
 
//<!--Variables for jQuery sliders-->
var current_min_price=350000;
var current_max_price=700000;
var current_min_year=2011;
var current_max_year=2013;
var bool_marker=true;

function toggle_Overview(){
  remove_circle();
  if(bool_marker==false){
    clearMarkers();
    //deleteMarkers();
  }
}
//Method for toggling the detailed tab
function toggle_Detail(){
  //Set all map overlays to null
  Overlay_2010.setMap(null);
  Overlay_2011.setMap(null);
  Overlay_2012.setMap(null);
  Overlay_2013.setMap(null);
  Overlay_2014.setMap(null);
  //Add the selector circle
  add_circle();
  //If the set_markers_in_circle method has already been called, show the previous array of markers.
  if(bool_marker==false){
    showMarkers();
  }
//If the set_markers_in_circle method has not already been called, call it and set bool_markers to false.
  else if(bool_marker==true){
    bool_marker=false;
    set_markers_in_circle(lat,lng,circle_radius,current_min_year,current_max_year,current_min_price,current_max_price);
  }
}
/*Script for showing/hiding of county/town buttons and dropdown menus
Later discarded*/
$(document).ready(function(){
  $(".c_btn").click(function(){
    $("#drop_downs_town").hide();
    $("#dd1_t").hide();
    $("#dd2_t").hide();
    $("#compare_button_county").show();
    towns_bool=false;
    //county_med_chart();
  });
  $(".t_btn").click(function(){
  	$("#drop_downs_town").show();
  	$("#dd1_t").show();
  	$("#dd2_t").show();
  	$("#compare_button_county").hide();
  	$("#compare_button_town").show();
    towns_bool=true;
    towns_ddls(str);
  });
});

/*Script for changing the towns drop down menus
Later discarded
*/
function towns_ddls(str) {
  if(towns_bool==true){
    if (str=="") {
        document.getElementById("drop_down_towns").innerHTML="";
        return;
      } 
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      } else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
          document.getElementById("drop_down_towns").innerHTML=xmlhttp.responseText;
        }
      }
      str1=document.getElementById("dd1_c").value;
      str2=document.getElementById("dd2_c").value;
      xmlhttp.open("GET","ajax/town_ddl_echo_test.php?c1="+str1+"&c2="+str2,true);
      xmlhttp.send();
    }
  else if(towns_bool==false){
      county_med_chart();
    }
  }
  
 /*jQuery to switch sections
 Later discarded
 */
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

//Script for price slider
$(function() {
  $("#price_slider").slider({
    range: true,
    min: 50000,
    max: 1000000,
    step: 5000,
    values: [350000, 700000 ],
    //On change of sliders values, call set_markers_in_circle method with updates parameters
    change: function( event, ui ) {
      $( "#amount" ).val( "€"+ui.values[0]+" - €"+ui.values[1] );
      current_min_price=ui.values[0];
      current_max_price=ui.values[1]; 
      set_markers_in_circle(lat,lng,circle_radius,current_min_year,current_max_year,current_min_price,current_max_price);
    }
  });
  $( "#amount" ).val( "€"+$( "#price_slider" ).slider( "values", 0)+
    " - €"+$( "#price_slider" ).slider( "values", 1) );
});

//Script for timeframe slider
$(function() {
  $("#timeframe_slider").slider({
    range: true,
    min: 2010,
    max: 2014,
    step:1,
    values: [2011, 2013],
    //On change of sliders values, call set_markers_in_circle method with updates parameters
    change:function( event, ui ) {
      $( "#timerange" ).val( ""+ui.values[0]+" - "+ui.values[1] );
      current_min_year=ui.values[0];
      current_max_year=ui.values[1];
      set_markers_in_circle(lat,lng,circle_radius,current_min_year,current_max_year,current_min_price,current_max_price);
    }
  });
  $( "#timerange" ).val( ""+$( "#timeframe_slider" ).slider( "values", 0 )+
    " - "+$( "#timeframe_slider" ).slider( "values", 1 ) );
});
 