<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>House Price Index Calculator</title>
<link rel="stylesheet" media="screen" href="css/test_styles.css">
<link rel="stylesheet" href="css/jquery-ui.css">
<link href="https://getbootstrap.com/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />

<script src="https://getbootstrap.com/dist/js/bootstrap.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=xxxxxxxxxxxxxx"></script>
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="js/heat_maps_all.js"></script>
<script src="js/my_functions.js"></script>
<!--Setting up for Google Chart of County Averages-->
<script>
var county_1="";
var county_2="";
var county_n="National";

google.load("visualization","1.0",{packages:["corechart"]});
$(document).ready(county_med_chart);

function county_med_chart(){
  county_1=document.getElementById("dd1_c").value;
  county_2=document.getElementById("dd2_c").value;
  var towns_bool=false;
  var c;

for(c=0;c<county_med_month.length;c+=1){
    var a=county_med_month[c];
    if(a.county==county_1){
      med_jan_10_1=a.med_jan_10;
      med_feb_10_1=a.med_feb_10;
      med_mar_10_1=a.med_mar_10;
      med_apr_10_1=a.med_apr_10;
      med_may_10_1=a.med_may_10;
      med_jun_10_1=a.med_jun_10;
      med_jul_10_1=a.med_jul_10;
      med_aug_10_1=a.med_aug_10;
      med_sep_10_1=a.med_sep_10;
      med_oct_10_1=a.med_oct_10;
      med_nov_10_1=a.med_nov_10;
      med_dec_10_1=a.med_dec_10;
      med_jan_11_1=a.med_jan_11;
      med_feb_11_1=a.med_feb_11;
      med_mar_11_1=a.med_mar_11;
      med_apr_11_1=a.med_apr_11;
      med_may_11_1=a.med_may_11;
      med_jun_11_1=a.med_jun_11;
      med_jul_11_1=a.med_jul_11;
      med_aug_11_1=a.med_aug_11;
      med_sep_11_1=a.med_sep_11;
      med_oct_11_1=a.med_oct_11;
      med_nov_11_1=a.med_nov_11;
      med_dec_11_1=a.med_dec_11;
      med_jan_12_1=a.med_jan_12;
      med_feb_12_1=a.med_feb_12;
      med_mar_12_1=a.med_mar_12;
      med_apr_12_1=a.med_apr_12;
      med_may_12_1=a.med_may_12;
      med_jun_12_1=a.med_jun_12;
      med_jul_12_1=a.med_jul_12;
      med_aug_12_1=a.med_aug_12;
      med_sep_12_1=a.med_sep_12;
      med_oct_12_1=a.med_oct_12;
      med_nov_12_1=a.med_nov_12;
      med_dec_12_1=a.med_dec_12;
      med_jan_13_1=a.med_jan_13;
      med_feb_13_1=a.med_feb_13;
      med_mar_13_1=a.med_mar_13;
      med_apr_13_1=a.med_apr_13;
      med_may_13_1=a.med_may_13;
      med_jun_13_1=a.med_jun_13;
      med_jul_13_1=a.med_jul_13;
      med_aug_13_1=a.med_aug_13;
      med_sep_13_1=a.med_sep_13;
      med_oct_13_1=a.med_oct_13;
      med_nov_13_1=a.med_nov_13;
      med_dec_13_1=a.med_dec_13;
      med_jan_14_1=a.med_jan_14;
      med_feb_14_1=a.med_feb_14;
      med_mar_14_1=a.med_mar_14;
      med_apr_14_1=a.med_apr_14;
      med_may_14_1=a.med_may_14;
      med_jun_14_1=a.med_jun_14;
      med_jul_14_1=a.med_jul_14;
      med_aug_14_1=a.med_aug_14;
      med_sep_14_1=a.med_sep_14;
    }
    if(a.county==county_2){med_jan_10_2=a.med_jan_10;
      med_feb_10_2=a.med_feb_10;
      med_mar_10_2=a.med_mar_10;
      med_apr_10_2=a.med_apr_10;
      med_may_10_2=a.med_may_10;
      med_jun_10_2=a.med_jun_10;
      med_jul_10_2=a.med_jul_10;
      med_aug_10_2=a.med_aug_10;
      med_sep_10_2=a.med_sep_10;
      med_oct_10_2=a.med_oct_10;
      med_nov_10_2=a.med_nov_10;
      med_dec_10_2=a.med_dec_10;
      med_jan_11_2=a.med_jan_11;
      med_feb_11_2=a.med_feb_11;
      med_mar_11_2=a.med_mar_11;
      med_apr_11_2=a.med_apr_11;
      med_may_11_2=a.med_may_11;
      med_jun_11_2=a.med_jun_11;
      med_jul_11_2=a.med_jul_11;
      med_aug_11_2=a.med_aug_11;
      med_sep_11_2=a.med_sep_11;
      med_oct_11_2=a.med_oct_11;
      med_nov_11_2=a.med_nov_11;
      med_dec_11_2=a.med_dec_11;
      med_jan_12_2=a.med_jan_12;
      med_feb_12_2=a.med_feb_12;
      med_mar_12_2=a.med_mar_12;
      med_apr_12_2=a.med_apr_12;
      med_may_12_2=a.med_may_12;
      med_jun_12_2=a.med_jun_12;
      med_jul_12_2=a.med_jul_12;
      med_aug_12_2=a.med_aug_12;
      med_sep_12_2=a.med_sep_12;
      med_oct_12_2=a.med_oct_12;
      med_nov_12_2=a.med_nov_12;
      med_dec_12_2=a.med_dec_12;
      med_jan_13_2=a.med_jan_13;
      med_feb_13_2=a.med_feb_13;
      med_mar_13_2=a.med_mar_13;
      med_apr_13_2=a.med_apr_13;
      med_may_13_2=a.med_may_13;
      med_jun_13_2=a.med_jun_13;
      med_jul_13_2=a.med_jul_13;
      med_aug_13_2=a.med_aug_13;
      med_sep_13_2=a.med_sep_13;
      med_oct_13_2=a.med_oct_13;
      med_nov_13_2=a.med_nov_13;
      med_dec_13_2=a.med_dec_13;
      med_jan_14_2=a.med_jan_14;
      med_feb_14_2=a.med_feb_14;
      med_mar_14_2=a.med_mar_14;
      med_apr_14_2=a.med_apr_14;
      med_may_14_2=a.med_may_14;
      med_jun_14_2=a.med_jun_14;
      med_jul_14_2=a.med_jul_14;
      med_aug_14_2=a.med_aug_14;
      med_sep_14_2=a.med_sep_14;
    }
    if(a.county=="National"){med_2010_3=a.med_10;
      med_jan_10_3=a.med_jan_10;
      med_feb_10_3=a.med_feb_10;
      med_mar_10_3=a.med_mar_10;
      med_apr_10_3=a.med_apr_10;
      med_may_10_3=a.med_may_10;
      med_jun_10_3=a.med_jun_10;
      med_jul_10_3=a.med_jul_10;
      med_aug_10_3=a.med_aug_10;
      med_sep_10_3=a.med_sep_10;
      med_oct_10_3=a.med_oct_10;
      med_nov_10_3=a.med_nov_10;
      med_dec_10_3=a.med_dec_10;
      med_jan_11_3=a.med_jan_11;
      med_feb_11_3=a.med_feb_11;
      med_mar_11_3=a.med_mar_11;
      med_apr_11_3=a.med_apr_11;
      med_may_11_3=a.med_may_11;
      med_jun_11_3=a.med_jun_11;
      med_jul_11_3=a.med_jul_11;
      med_aug_11_3=a.med_aug_11;
      med_sep_11_3=a.med_sep_11;
      med_oct_11_3=a.med_oct_11;
      med_nov_11_3=a.med_nov_11;
      med_dec_11_3=a.med_dec_11;
      med_jan_12_3=a.med_jan_12;
      med_feb_12_3=a.med_feb_12;
      med_mar_12_3=a.med_mar_12;
      med_apr_12_3=a.med_apr_12;
      med_may_12_3=a.med_may_12;
      med_jun_12_3=a.med_jun_12;
      med_jul_12_3=a.med_jul_12;
      med_aug_12_3=a.med_aug_12;
      med_sep_12_3=a.med_sep_12;
      med_oct_12_3=a.med_oct_12;
      med_nov_12_3=a.med_nov_12;
      med_dec_12_3=a.med_dec_12;
      med_jan_13_3=a.med_jan_13;
      med_feb_13_3=a.med_feb_13;
      med_mar_13_3=a.med_mar_13;
      med_apr_13_3=a.med_apr_13;
      med_may_13_3=a.med_may_13;
      med_jun_13_3=a.med_jun_13;
      med_jul_13_3=a.med_jul_13;
      med_aug_13_3=a.med_aug_13;
      med_sep_13_3=a.med_sep_13;
      med_oct_13_3=a.med_oct_13;
      med_nov_13_3=a.med_nov_13;
      med_dec_13_3=a.med_dec_13;
      med_jan_14_3=a.med_jan_14;
      med_feb_14_3=a.med_feb_14;
      med_mar_14_3=a.med_mar_14;
      med_apr_14_3=a.med_apr_14;
      med_may_14_3=a.med_may_14;
      med_jun_14_3=a.med_jun_14;
      med_jul_14_3=a.med_jul_14;
      med_aug_14_3=a.med_aug_14;
      med_sep_14_3=a.med_sep_14;
    }
  }

	var e=new google.visualization.arrayToDataTable([
	["Year",county_1,county_2,"National"],
	["Jan-10",med_jan_10_1,med_jan_10_2,med_jan_10_3],
	["Feb-10",med_feb_10_1,med_feb_10_2,med_feb_10_3],
	["Mar-10",med_mar_10_1,med_mar_10_2,med_mar_10_3],
	["Apr-10",med_apr_10_1,med_apr_10_2,med_apr_10_3],
	["May-10",med_may_10_1,med_may_10_2,med_may_10_3],
	["Jun-10",med_jun_10_1,med_jun_10_2,med_jun_10_3],
	["Jul-10",med_jul_10_1,med_jul_10_2,med_jul_10_3],
	["Aug-10",med_aug_10_1,med_aug_10_2,med_aug_10_3],
	["Sept-10",med_sep_10_1,med_sep_10_2,med_sep_10_3],
	["Oct-10",med_oct_10_1,med_oct_10_2,med_oct_10_3],
	["Nov-10",med_nov_10_1,med_nov_10_2,med_nov_10_3],
	["Dec-10",med_dec_10_1,med_dec_10_2,med_dec_10_3],

	["Jan-11",med_jan_11_1,med_jan_11_2,med_jan_11_3],
	["Feb-11",med_feb_11_1,med_feb_11_2,med_feb_11_3],
	["Mar-11",med_mar_11_1,med_mar_11_2,med_mar_11_3],
	["Apr-11",med_apr_11_1,med_apr_11_2,med_apr_11_3],
	["May-11",med_may_11_1,med_may_11_2,med_may_11_3],
	["Jun-11",med_jun_11_1,med_jun_11_2,med_jun_11_3],
	["Jul-11",med_jul_11_1,med_jul_11_2,med_jul_11_3],
	["Aug-11",med_aug_11_1,med_aug_11_2,med_aug_11_3],
	["Sept-11",med_sep_11_1,med_sep_11_2,med_sep_11_3],
	["Oct-11",med_oct_11_1,med_oct_11_2,med_oct_11_3],
	["Nov-11",med_nov_11_1,med_nov_11_2,med_nov_11_3],
	["Dec-11",med_dec_11_1,med_dec_11_2,med_dec_11_3],

	["Jan-12",med_jan_12_1,med_jan_12_2,med_jan_12_3],
	["Feb-12",med_feb_12_1,med_feb_12_2,med_feb_12_3],
	["Mar-12",med_mar_12_1,med_mar_12_2,med_mar_12_3],
	["Apr-12",med_apr_12_1,med_apr_12_2,med_apr_12_3],
	["May-12",med_may_12_1,med_may_12_2,med_may_12_3],
	["Jun-12",med_jun_12_1,med_jun_12_2,med_jun_12_3],
	["Jul-12",med_jul_12_1,med_jul_12_2,med_jul_12_3],
	["Aug-12",med_aug_12_1,med_aug_12_2,med_aug_12_3],
	["Sept-12",med_sep_12_1,med_sep_12_2,med_sep_12_3],
	["Oct-12",med_oct_12_1,med_oct_12_2,med_oct_12_3],
	["Nov-12",med_nov_12_1,med_nov_12_2,med_nov_12_3],
	["Dec-12",med_dec_12_1,med_dec_12_2,med_dec_12_3],

	["Jan-13",med_jan_13_1,med_jan_13_2,med_jan_13_3],
	["Feb-13",med_feb_13_1,med_feb_13_2,med_feb_13_3],
	["Mar-13",med_mar_13_1,med_mar_13_2,med_mar_13_3],
	["Apr-13",med_apr_13_1,med_apr_13_2,med_apr_13_3],
	["May-13",med_may_13_1,med_may_13_2,med_may_13_3],
	["Jun-13",med_jun_13_1,med_jun_13_2,med_jun_13_3],
	["Jul-13",med_jul_13_1,med_jul_13_2,med_jul_13_3],
	["Aug-13",med_aug_13_1,med_aug_13_2,med_aug_13_3],
	["Sept-13",med_sep_13_1,med_sep_13_2,med_sep_13_3],
	["Oct-13",med_oct_13_1,med_oct_13_2,med_oct_13_3],
	["Nov-13",med_nov_13_1,med_nov_13_2,med_nov_13_3],
	["Dec-13",med_dec_13_1,med_dec_13_2,med_dec_13_3],

	["Jan-14",med_jan_14_1,med_jan_14_2,med_jan_14_3],
	["Feb-14",med_feb_14_1,med_feb_14_2,med_feb_14_3],
	["Mar-14",med_mar_14_1,med_mar_14_2,med_mar_14_3],
	["Apr-14",med_apr_14_1,med_apr_14_2,med_apr_14_3],
	["May-14",med_may_14_1,med_may_14_2,med_may_14_3],
	["Jun-14",med_jun_14_1,med_jun_14_2,med_jun_14_3],
	["Jul-14",med_jul_14_1,med_jul_14_2,med_jul_14_3],
	["Aug-14",med_aug_14_1,med_aug_14_2,med_aug_14_3],
	["Sept-14",med_sep_14_1,med_sep_14_2,med_sep_14_3],
	]);

  var b={
    title:"House Price Averages by County:",
    curveType:"function",
    is3D:true,
    legend:"top",
    width:650,
    height:280,
    hAxis: { textPosition: 'none' }};
  var d=new google.visualization.LineChart(document.getElementById("chart_div"));
  d.draw(e,b)
}
</script>
<!--Script to call PHP to calculate and return county averages-->
<script>
function county_med_data(b,a){
  xmlhttp.open("GET","ajax/county_med_month.php?county_1="+b+"&county_2="+a,false);
  xmlhttp.send()
}
</script>
<!--Script for showing/hiding of county/town buttons and dropdowns-->
<script>
$(document).ready(function(){
  $(".c_btn").click(function(){
    $("#drop_downs_town").hide();
    $("#dd1_t").hide();
    $("#dd2_t").hide();
    $("#compare_button_county").show();
    towns_bool=false;
    county_med_chart();
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
</script>
<script>
//Debugging related
function print_to_screen(){
  window.alert("You changed the drop-down!");
}
</script>
<!--Script for drawing the circle on the map-->
<script>
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
  return j
}
</script>
<!---->

<script>
  function county_medians(str) {
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
        xmlhttp.open("GET","ajax/county_med_month.php?c1="+str1+"&c2="+str2,true);
        xmlhttp.send();
        county_med_chart();
    }
</script>
<script>
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
    };
    /*
    pointArray_10=new google.maps.MVCArray(heat_map_10);
    pointArray_11=new google.maps.MVCArray(heat_map_11);
    pointArray_12=new google.maps.MVCArray(heat_map_12);
    pointArray_13=new google.maps.MVCArray(heat_map_13);
    heatmap=new google.maps.visualization.HeatmapLayer({
      data:pointArray_10});
    heatmap.setMap(map);
    */
      // Add the circle for this city to the map.
    selector_circle = new google.maps.Circle(circleOptions);
    //We hide the circle until the user selects to view the detailed map section
    remove_circle();
}
/*
function changeGradient(){
  var a=["rgba(0, 255, 255, 0)",
          "rgba(0, 255, 255, 1)",
          "rgba(0, 191, 255, 1)",
          "rgba(0, 127, 255, 1)",
          "rgba(0, 63, 255, 1)",
          "rgba(0, 0, 255, 1)",
          "rgba(0, 0, 223, 1)",
          "rgba(0, 0, 191, 1)",
          "rgba(0, 0, 159, 1)",
          "rgba(0, 0, 127, 1)",
          "rgba(63, 0, 91, 1)",
          "rgba(127, 0, 63, 1)",
          "rgba(191, 0, 31, 1)",
          "rgba(255, 0, 0, 1)"];
  heatmap.set("gradient",heatmap.get("gradient")?null:a)}
function changeRadius(){
  heatmap.set("radius",heatmap.get("radius")?15:30)}
function changeOpacity(){heatmap.set("opacity",heatmap.get("opacity")?null:0.2)}
*/
google.maps.event.addDomListener(window,"load",initialize);
</script>
<script>
/*
function toggle_10(){
  heatmap.setData(pointArray_10);
}
function toggle_11(){
  heatmap.setData(pointArray_11);
}
function toggle_12(){
  heatmap.setData(pointArray_12);
}
function toggle_13(){
  heatmap.setData(pointArray_13);
}
*/
function toggle_Overview(){
  /*if(heatmap.getMap()==null){
    heatmap.setMap(map);
  }*/
  remove_circle();
}
function toggle_Detail(){
  /*if(heatmap.getMap()==map){
    heatmap.setMap(null);
  }*/
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
</script>
<!---->
<script>
  $(document).ready(function(){
    $(".part1").click(function(){
      $("#btn1click").show();
      $("#btn2click").hide()});
    $(".part2").click(function(){
      $("#btn1click").hide();
      $("#btn2click").show()});
    $(".part3").click(function(){
      $("#btn1click").hide();
      $("#btn2click").hide();
      $("#btn3click").show()});
  });
</script>
<!--Script for changing the towns drop-downs-->
<script>
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
</script>
<!--Script to show selected for Detailed Section-->
 <script>
    $(function() {
      $("#price_slider").slider({
        range: true,
        min: 50000,
        max: 1000000,
        step: 1000,
        values: [350000, 700000 ],
        slide: function( event, ui ) {
          $( "#amount" ).val( "€" + ui.values[0 ] + " - €" + ui.values[1 ] );
          current_min_price=ui.values[0 ];
          current_max_price=ui.values[1 ]; 
        }
      });
      $( "#amount" ).val( "€" + $( "#price_slider" ).slider( "values", 0) +
        " - €" + $( "#price_slider" ).slider( "values", 1) );
    });
    $(function() {
      $("#timeframe_slider").slider({
        range: true,
        min: 2010,
        max: 2015,
        step:1,
        values: [2012, 2013 ],
        slide: function( event, ui ) {
          $( "#timerange" ).val( "" + ui.values[0 ] + " - " + ui.values[1 ] );
          current_min_year=ui.values[0 ];
          current_max_year=ui.values[1 ]; 
        }
      });
      $( "#timerange" ).val( "" + $( "#timeframe_slider" ).slider( "values", 0 ) +
        " - " + $( "#timeframe_slider" ).slider( "values", 1 ) );
    });
</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="S. Brennan-Kelly">
<meta name="robots" content="all">
</head>
<body>
	<div id="wrapper">
		<div id="map_canvas"></div>
		<div id="over_map">
			<div id="buttons">
				<input id="bigbutton" class="part1" readonly="readonly" onclick="toggle_Overview()"value="Overview"/>
				<input id="bigbutton" class="part2" readonly="readonly" onclick="toggle_Detail()"value="Detailed Maps"/>
			</div>
			<div id="btn1click">
			<div id="panel">
				<button onclick="toggle_10()">2010</button>
				<button onclick="toggle_11()">2011</button>
				<button onclick="toggle_12()">2012</button>
				<button onclick="toggle_13()">2013</button>
			</div>
			<div id="drop_downs_div">
        <!--
			<input id="tc_buttons" class="c_btn" readonly="readonly" value="Counties"/>
			<input id="tc_buttons" class="t_btn" readonly="readonly" value="Towns" onclick="towns_ddls(this.value)"/>
			-->
      <div id="drop_downs_county">
				<!--<select id="dd1_c" onchange="towns_ddls()">-->
        <form>
        <!--<select id="dd1_c" onchange="towns_ddls(this.value)">-->
        <select id="dd1_c" onchange="county_medians(this.value)">
					<option value="Carlow">Carlow</option>
					<option value="Cavan">Cavan</option>
					<option value="Clare">Clare</option>
					<option value="Cork">Cork</option>
					<option value="Donegal">Donegal</option>
					<option value="Dublin">Dublin</option>
					<option value="Galway">Galway</option>
					<option value="Kerry">Kerry</option>
					<option value="Kildare">Kildare</option>
					<option value="Kilkenny">Kilkenny</option>
					<option value="Laois">Laois</option>
					<option value="Leitrim">Leitrim</option>
					<option value="Limerick">Limerick</option>
					<option value="Longford">Longford</option>
					<option value="Louth">Louth</option>
					<option value="Mayo">Mayo</option>
					<option value="Meath">Meath</option>
					<option value="Monaghan">Monaghan</option>
					<option value="Offaly">Offaly</option>
					<option value="Roscommon">Roscommon</option>
					<option value="Sligo">Sligo</option>
					<option value="Tipperary">Tipperary</option>
					<option value="Waterford">Waterford</option>
					<option value="Westmeath">Westmeath</option>
					<option value="Wexford">Wexford</option>
					<option value="Wicklow">Wicklow</option>
				</select>
			</br>
        <!--<select id="dd2_c" onchange="towns_ddls(this.value)">-->
        <select id="dd2_c" onchange="county_medians(this.value)">
					<option value="Carlow">Carlow</option>
					<option value="Cavan">Cavan</option>
					<option value="Clare">Clare</option>
					<option value="Cork">Cork</option>
					<option value="Donegal">Donegal</option>
					<option value="Dublin">Dublin</option>
					<option value="Galway">Galway</option>
					<option value="Kerry">Kerry</option>
					<option value="Kildare">Kildare</option>
					<option value="Kilkenny">Kilkenny</option>
					<option value="Laois">Laois</option>
					<option value="Leitrim">Leitrim</option>
					<option value="Limerick">Limerick</option>
					<option value="Longford">Longford</option>
					<option value="Louth">Louth</option>
					<option value="Mayo">Mayo</option>
					<option value="Meath">Meath</option>
					<option value="Monaghan">Monaghan</option>
					<option value="Offaly">Offaly</option>
					<option value="Roscommon">Roscommon</option>
					<option value="Sligo">Sligo</option>
					<option value="Tipperary">Tipperary</option>
					<option value="Waterford">Waterford</option>
					<option value="Westmeath">Westmeath</option>
					<option value="Wexford">Wexford</option>
					<option value="Wicklow">Wicklow</option>
				</select>
      </form>
			<!--<input type=button onclick="county_med_chart()" id="compare_button_county" value="Compare">-->
			</div>
  <br>
  <div id="drop_down_towns"><b>  </b></div>
			<div id="info_txt_1_tab_1">
				<p>To compare two counties against the National Averages, select them from the drop-downs and hit "Compare".
				</p>
			</div>
	</div>
			<div id="chart_div">
			</div>
			<div id="info_txt_2_tab_1">
				<p style="margin-left:1%;">The map on the left shows where was most -> least expensive (red->green) to buy a house in each year. Click the buttons at the top to change years.</p>
			</div>
			</div>
      <div id="btn2click" style="display:none">
      <div id="in_tab">
        <p>Test for div 2</p>
        <p>
          User the selector on the map to pick an area.
          The figures below represent the house price sales averages for the area.*

          <i>* Note: Areas with a low volume of house sales may compute inaccurate averages.</i>
        </p>
        <p>Ue the sliders to show only house in the location, price-range and timeframe you're interested in.</p>
      <div>
        <p> The average/calculated-statistic for the selected area will be displayed here. Default will be national figure, then update dynamically as user selected area.</p>
        <p id="calc_stat_tab2">Average/Stat for Selected Area: €XXX,XXX.XX</p>
        <p id="calc_stat_tab2_info">*Defaults to National figure before selecting area.</p>
      </div>
      <div id="sliders">
      <P><label for="amount">Price: </label></P>
      <input type="text" id="amount" readonly="readonly" style="border:0;color:#666;font-weight:bold">
      <div id="price_slider"></div>
      <p>
        Use the slider show the houses in your price-range.
      </p>
      <P><label for="timerange">Timeframe: </label></P>
      <input type="text" id="timerange" readonly="readonly" style="border:0;color:#666;font-weight:bold">
      <div id="timeframe_slider"></div>
      <p>
        Use the slider show the houses sold in a timeframe.
      </p>
      </div>
      </div>
      </div>
      <div id="btn3click" style="display:none">
      <div id="in_tab">
        <p>Test for div 3</p>
        <p>Function will be implemented if 1 and 2 are implemented successfully first</p>
      </div>
		</div>
	</div>
</body>