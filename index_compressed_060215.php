<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>House Price Index Calculator</title>
<link rel="stylesheet" media="screen" href="css/test_styles.css">
<link rel="stylesheet" href="css/jquery-ui.css">
<link href="css/bootstrap.min.css">
<script src="https://maps.googleapis.com/maps/api/js?key=xxxxxxxxxxxxxx"></script>
<script src="js/my_functions.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=visualization"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>if(window.XMLHttpRequest){xmlhttp=new XMLHttpRequest()}else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")}</script>
<script>var avg_2010_1=0;var avg_2011_1=0;var avg_2012_1=0;var avg_2013_1=0;var avg_2014_1=0;var avg_2010_2=0;var avg_2011_2=0;var avg_2012_2=0;var avg_2013_2=0;var avg_2014_2=0;var avg_2010_3=0;var avg_2011_3=0;var avg_2012_3=0;var avg_2013_3=0;var avg_2014_3=0;var county_1="";var county_2="";var county_n="National";var county_avgs=[{county:"Carlow",avg_10:177838,avg_11:147348,avg_12:122890,avg_13:136006,avg_14:122641},{county:"Cavan",avg_10:147922,avg_11:143978,avg_12:124349,avg_13:116850,avg_14:112507},{county:"Clare",avg_10:183542,avg_11:167742,avg_12:144043,avg_13:131850,avg_14:134714},{county:"Cork",avg_10:235632,avg_11:207447,avg_12:183664,avg_13:179696,avg_14:182303},{county:"Donegal",avg_10:161079,avg_11:141410,avg_12:124009,avg_13:112869,avg_14:113345},{county:"Dublin",avg_10:327069,avg_11:304528,avg_12:276843,avg_13:300644,avg_14:333411},{county:"Galway",avg_10:229131,avg_11:206241,avg_12:177260,avg_13:177008,avg_14:173090},{county:"Kerry",avg_10:195397,avg_11:174412,avg_12:158498,avg_13:147097,avg_14:137042},{county:"Kildare",avg_10:242653,avg_11:228354,avg_12:194872,avg_13:200816,avg_14:228306},{county:"Kilkenny",avg_10:201855,avg_11:176629,avg_12:149884,avg_13:148109,avg_14:145972},{county:"Laois",avg_10:170953,avg_11:134542,avg_12:115579,avg_13:126033,avg_14:111036},{county:"Leitrim",avg_10:135172,avg_11:122240,avg_12:116017,avg_13:95556,avg_14:103720},{county:"Limerick",avg_10:197607,avg_11:178925,avg_12:167659,avg_13:160267,avg_14:144204},{county:"Longford",avg_10:144905,avg_11:120190,avg_12:108544,avg_13:95726,avg_14:96457},{county:"Louth",avg_10:194125,avg_11:161942,avg_12:145329,avg_13:143820,avg_14:136846},{county:"Mayo",avg_10:168786,avg_11:160994,avg_12:129150,avg_13:136206,avg_14:120375},{county:"Meath",avg_10:230117,avg_11:202266,avg_12:184670,avg_13:178055,avg_14:194092},{county:"Monaghan",avg_10:162852,avg_11:141114,avg_12:129188,avg_13:111327,avg_14:113435},{county:"National",avg_10:245951,avg_11:221979,avg_12:205010,avg_13:212745,avg_14:222264},{county:"Offaly",avg_10:165861,avg_11:141400,avg_12:133740,avg_13:121328,avg_14:137275},{county:"Roscommon",avg_10:149685,avg_11:124231,avg_12:107066,avg_13:103778,avg_14:99007},{county:"Sligo",avg_10:169947,avg_11:146956,avg_12:130302,avg_13:133240,avg_14:142252},{county:"Tipperary",avg_10:170360,avg_11:153299,avg_12:150543,avg_13:130733,avg_14:133496},{county:"Waterford",avg_10:187500,avg_11:161551,avg_12:151322,avg_13:139157,avg_14:143144},{county:"Westmeath",avg_10:163641,avg_11:146751,avg_12:128807,avg_13:122871,avg_14:119723},{county:"Wexford",avg_10:184385,avg_11:149850,avg_12:136448,avg_13:131173,avg_14:132033},{county:"Wicklow",avg_10:297418,avg_11:251340,avg_12:234888,avg_13:248998,avg_14:259219}];google.load("visualization","1.0",{packages:["corechart"]});$(document).ready(county_avg_chart);function county_avg_chart(){county_1=document.getElementById("dd1_c").value;county_2=document.getElementById("dd2_c").value;var c;for(c=0;c<county_avgs.length;c+=1){var a=county_avgs[c];if(a.county==county_1){avg_2010_1=a.avg_10;avg_2011_1=a.avg_11;avg_2012_1=a.avg_12;avg_2013_1=a.avg_13;avg_2014_1=a.avg_14}if(a.county==county_2){avg_2010_2=a.avg_10;avg_2011_2=a.avg_11;avg_2012_2=a.avg_12;avg_2013_2=a.avg_13;avg_2014_2=a.avg_14}if(a.county=="National"){avg_2010_3=a.avg_10;avg_2011_3=a.avg_11;avg_2012_3=a.avg_12;avg_2013_3=a.avg_13;avg_2014_3=a.avg_14}}var e=new google.visualization.arrayToDataTable([["Year",county_1,county_2,"National"],["2010",avg_2010_1,avg_2010_2,avg_2010_3],["2011",avg_2011_1,avg_2011_2,avg_2011_3],["2012",avg_2012_1,avg_2012_2,avg_2012_3],["2013",avg_2013_1,avg_2013_2,avg_2013_3],["2014",avg_2014_1,avg_2014_2,avg_2014_3],]);var b={title:"House Price Averages by County:",curveType:"function",is3D:true,legend:"top",width:590,height:280,};var d=new google.visualization.LineChart(document.getElementById("chart_div"));d.draw(e,b)}</script>
<script>function county_avg_data(b,a){xmlhttp.open("GET","ajax/county_averages.php?county_1="+b+"&county_2="+a,false);xmlhttp.send()}</script>
<script>$(document).ready(function(){$(".c_btn").click(function(){$("#drop_downs_town").hide();$("#dd1_t").hide();$("#dd2_t").hide();$("#compare_button_county").show()});$(".t_btn").click(function(){$("#drop_downs_town").show();$("#dd1_t").show();$("#dd2_t").show();$("#compare_button_county").hide()})});</script>
<script>function(){document.getElementById("dd1_c").onchange=function(){county_1_ddl=this.value;county_2_ddl=document.getElementById("dd2_c").value;towns_ddls(county_1_ddl,county_2_ddl)};document.getElementById("dd2_c").onchange=function(){county_2_ddl=this.value;county_1_ddl=document.getElementById("dd1_c").value;towns_ddls(county_1_ddl,county_2_ddl)}}</script>
<script src="js/heat_maps_all.js"></script>
<script>
function drawCircle(l,k,d){var g=Math.PI/180;var a=180/Math.PI;var f=3963;var m=1024;var n=(k/f)*a;var o=n/Math.cos(l.lat()*g);var j=new Array();if(d==1){var b=0;var e=m+1}else{var b=m+1;var e=0}for(var h=b;(d==1?h<e:h>e);h=h+d){var c=Math.PI*(h/(m/2));ey=l.lng()+(o*Math.cos(c));ex=l.lat()+(n*Math.sin(c));j.push(new google.maps.LatLng(ex,ey));bounds.extend(j[j.length-1])}return j}</script>
<script>
var map=null;
var pointArray_10=null;var pointArray_11=null;var pointArray_12=null;var pointArray_13=null;var pointArray_14=null;
var heatmap=null;
var data_10=true;
var data_11=false;
var bounds=null;
function initialize(){
	var a={
		zoom:7,
		center:new google.maps.LatLng(53.4427,-4.5),
		mapTypeId:google.maps.MapTypeId.ROADMAP
	};
	map=new google.maps.Map(document.getElementById("map_canvas"),a);
	pointArray_10=new google.maps.MVCArray(heat_map_10);
	pointArray_11=new google.maps.MVCArray(heat_map_11);
	pointArray_12=new google.maps.MVCArray(heat_map_12);
	pointArray_13=new google.maps.MVCArray(heat_map_13);
	heatmap=new google.maps.visualization.HeatmapLayer(
		{data:pointArray_10});heatmap.setMap(map)}
	function changeGradient(){var a=["rgba(0, 255, 255, 0)","rgba(0, 255, 255, 1)","rgba(0, 191, 255, 1)","rgba(0, 127, 255, 1)","rgba(0, 63, 255, 1)","rgba(0, 0, 255, 1)","rgba(0, 0, 223, 1)","rgba(0, 0, 191, 1)","rgba(0, 0, 159, 1)","rgba(0, 0, 127, 1)","rgba(63, 0, 91, 1)","rgba(127, 0, 63, 1)","rgba(191, 0, 31, 1)","rgba(255, 0, 0, 1)"];heatmap.set("gradient",heatmap.get("gradient")?null:a)}
	function changeRadius(){heatmap.set("radius",heatmap.get("radius")?15:30)}
	function changeOpacity(){heatmap.set("opacity",heatmap.get("opacity")?null:0.2)}
	google.maps.event.addDomListener(window,"load",initialize);
</script>
<script>
function toggle_10(){
	heatmap.setData(pointArray_10)}
function toggle_11(){
	heatmap.setData(pointArray_11)}
function toggle_12(){
	heatmap.setData(pointArray_12)}
function toggle_13(){
	heatmap.setData(pointArray_13)}
function toggle_Overview(){
		if(heatmap.getMap()==null){heatmap.setMap(map)}}
function toggle_Detail(){
	if(heatmap.getMap()==map){heatmap.setMap(null)}}
</script>
<script>
$(document).ready(function(){$(".part1").click(function(){$("#btn1click").show();$("#btn2click").hide()});$(".part2").click(function(){$("#btn1click").hide();$("#btn2click").show()});$(".part3").click(function(){$("#btn1click").hide();$("#btn2click").hide();$("#btn3click").show()})});</script>
<script>
$(function(){$("#price_slider").slider({range:true,min:0,max:500000,values:[150000,350000],slide:function(a,b){$("#amount").val("€"+b.values[0]+" - €"+b.values[1]);current_min_price:b.values[0];current_max_price:b.values[1]}});$("#amount").val("€"+$("#price_slider").slider("values",0)+" - €"+$("#price_slider").slider("values",1))});$(function(){$("#timeframe_slider").slider({range:true,min:2010,max:2015,values:[2012,2013],slide:function(a,b){$("#timerange").val(""+b.values[0]+" - "+b.values[1]);current_min_year:b.values[0];current_max_year:b.values[1]}});$("#timerange").val(""+$("#timeframe_slider").slider("values",0)+" - "+$("#timeframe_slider").slider("values",1))});</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="S. Brennan-Kelly">
<meta name="robots" content="all">
</head>
<body>
<div id="wrapper">
<div id="map_canvas">
</div>
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
<input id="tc_buttons" class="c_btn" readonly="readonly" value="Counties"/>
<input id="tc_buttons" class="t_btn" readonly="readonly" value="Towns"/>
<div id="drop_downs_county">
<select id="dd1_c">
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
<select id="dd2_c">
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
<input type=button onclick="county_avg_chart()" id="compare_button_county" value="Compare">
</div>
<div id="drop_downs_town">
<select id="dd1_t">
<option value="Carlow">Carlow</option>
<option value="Cavan">Cavan</option>
<option value="Clare">Clare</option>
<option value="Cork">Cork</option>
</select>
</br>
<select id="dd2_t">
<option value="Carlow">Carlow</option>
<option value="Cavan">Cavan</option>
<option value="Clare">Clare</option>
<option value="Cork">Cork</option>
</select>
<input type="button" onclick="town_avg_chart()" id="compare_button_town" style="display:none" value="Compare">
</div>
<div id="info_txt_1_tab_1">
<p>To compare two counties against the National Averages, select them from the drop-downs and hit "Compare".</p>
</div>
</div>
<div id="chart_div">
</div>
<div id="info_txt_2_tab_1">
<p style="margin-left:1%;">The map on the left shows where was most -> least expensive (red->green) to buy a house in each year. Click the buttons at the top to change years.</p>
</div>
<div id="btn2click" style="display:none">
<div id="in_tab">
<p>Test for div 2</p>
<p>Will display a map with a “selector”, allowing the users to select an area to zoom in on and calculate on. On the map pin-drops for the properties in the selected-area displaying information on the property will be displayed on the map. In the data-box, I will display the average/calculated-statistic for the selected area. I will also allow the user to show/hide pin-drops on the map based on timeline and cost using sliders.</p>
<div>
<p> The average/calculated-statistic for the selected area will be displayed here. Default will be national figure, then update dynamically as user selected area.</p>
<p id="calc_stat_tab2">Average/Stat for Selected Area: €XXX,XXX.XX</p>
<p id="calc_stat_tab2_info">*Defaults to National figure before selecting area.</p>
</div>
<div id="sliders">
<P>
<label for="amount">Price: </label>
</P>
<input type="text" id="amount" readonly style="border:0;color:#666;font-weight:bold">
<div id="price_slider">
</div>
<P>
<label for="timerange">Timeframe: </label>
</P>
<input type="text" id="timerange readonly" style="border:0;color:#666;font-weight:bold">
<div id="timeframe_slider">
</div>
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
</div>
</body>