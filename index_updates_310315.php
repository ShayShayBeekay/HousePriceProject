<html lang="en">
<head>
<meta charset="utf-8">
<title>House Price Index Calculator</title>
<link rel="stylesheet" media="screen" href="css/test_styles.css">
<link rel="stylesheet" href="css/jquery-ui.css">
<!--<script src="https://maps.googleapis.com/maps/api/js?key=xxxxxxxxxxxxxx"></script>-->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!--Info for sliders-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<!--<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
<!--<script src="js/heat_maps_all.js"></script>
-->
<script src="js/colour.js"></script>
<script src="js/circle.js"></script>
<script src="js/graph.js"></script>
<script src="js/func_020215.js"></script>
<script src="js/map.js"></script>
<script src="js/my_functions.js"></script>
<script src="js/pinpoints.js"></script>
<script src="js/points_in_circle.js"></script>
<script src="js/toggle_imgs.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-59248279-1', 'auto');
  ga('send', 'pageview');
</script>
<script>
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
				<!--<input id="bigbutton" class="part2" readonly="readonly" onclick="toggle_Detail();setMarkers(map,pinpoints);"value="Detailed Maps"/>
			     -->
                <input id="bigbutton" class="part2" readonly="readonly" onclick="toggle_Detail()"value="Detailed Maps"/>
            </div>
			<div id="btn1click">
			<div id="panel">
                <button onclick="toggle_2010_img()">2010</button>
                <button onclick="toggle_2011_img()">2011</button>
                <button onclick="toggle_2012_img()">2012</button>
                <button onclick="toggle_2013_img()">2013</button>
                <!--
                <button onclick="colour_dots(2013)">2013</button>-->
                <button onclick="toggle_2014_img()">2014</button>
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
        <select id="dd1_c" onchange="county_med_chart()">
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
        <!--<select id="dd2_c" onchange="towns_ddls()">
				<select id="dd2_c" onchange="towns_ddls(this.value)">-->
        <select id="dd2_c" onchange="county_med_chart()">
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
			<!--<input type=button onclick="county_avg_chart()" id="compare_button_county" value="Compare">-->
    </div>
  <br>
  <div id="drop_down_towns"><b>  </b></div>
			<div id="info_txt_1_tab_1">
				<p> To see a graphs compare two counties against the National House Prices indices, select them from the drop-downs.
				</p>
			</div>
	</div>
	<div id="chart_div">
			</div>
	<div id="info_txt_2_tab_1">
				<p>Click the buttons at the top left to show colour-coded maps for each year, going from green (less expensive) to red (more expensive).
                </br><img src="img/green_red_gradient.png" alt="Green to Red Gradient" height="18" width="350"> 
                </p>
                <p>This application has been designed as part of my Final Year Thesis for a BSc CSSE at Maynooth University. Please let me know what you think of the website by completing this <a href="https://www.surveymonkey.com/s/T9NYVQ3">survey</a>.</p>
	</div>
</div>
      <div id="btn2click" style="display:none">
      <div id="in_tab">
        <p>The figures below represent the House Price Index median for the selected area.*
            </br>
            <i>* Note: Areas with a low volume of house sales may compute less accurate information due to a lower number of samples.</i>
        </p>
      <div>
        <p> The median house price value for the selected area will be displayed here. Default will be national figure, then update dynamically as user selected area.</p>
        <p id="calc_stat_tab2">House Price Index for Selected Area:</p>
        <p id="calc_stat_tab2" class="area_med">2014: €225,450
                            </br>2013: €220,306
                            </br>2012: €214,568
                            </br>2011: €206,129
                            </br>2010: €211,443</p>
        <p id="calc_stat_tab2_info">*Defaults to National figure before selecting area.</p>
        <p>Use the sliders to show only house in the location, price-range and timeframe you're interested in.</p>
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