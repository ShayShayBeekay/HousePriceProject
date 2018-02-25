
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Heat_Map_Test</title>
  <link rel="stylesheet" media="screen" href="css/test_styles.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <!--
      #API Keyfor sbk@gmail.com 
      APK_1='xxxxxxxxxxxxxx'
  -->
  <script src="https://maps.googleapis.com/maps/api/js?key=xxxxxxxxxxxxxx"></script>
  <script src="js/my_functions.js"></script>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <!--<script src="https://maps.googleapis.com/maps/api/js?libraries=visualization&sensor=true_or_false"></script>-->
  <!--Potato Farls-->
  <script>
  <?php
  ini_set('memory_limit', '1024M');
    $dbconn = pg_connect("host=hosting.service.url dbname=xxxxxxxx user=xxxxxxxx password=xxxxxxxx")
        or die('Could not connect: ' . pg_last_error());
    $query = 'SELECT lat,lng FROM house_price_data_db.main where id>0 order by id';
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());
    $main_data = array();
    while($r = pg_fetch_assoc($result)) {$main_data[] = $r;}
    //str_replace('"','',$main_data);
    //$main_data = preg_replace('/\s(\w+)\s/i', '"$1"', $main_data);
    //$main_data = json_encode($main_data, JSON_PRETTY_PRINT);
    //echo($main_data);
    echo("var lat_lng= " . json_encode(array_values($main_data),JSON_PRETTY_PRINT).";");
  ?>
</script>

<script> 
    //$(document).ready(heat_map);
    $(document).ready(function(){
      $(".part1").click(function(){
        $("#btn1click").show();
        $("#btn2click").hide();
        //$("#btn3click").hide();
      });
      $(".part2").click(function(){
        $("#btn1click").hide();
        $("#btn2click").show();
        //$("#btn3click").hide();
      });
      $(".part3").click(function(){
        $("#btn1click").hide();
        $("#btn2click").hide();
        $("#btn3click").show();
      });
    });
  </script>
  <script>
    $(document).ready(function(){
    $("#compare_button").click(function(){
        call_chart();
      });
    });
  </script>
  <script>
    $(function() {
      $( "#price_slider" ).slider({
        range: true,
        min: 0,
        max: 500000,
        values: [ 150000, 350000 ],
        slide: function( event, ui ) {
          $( "#amount" ).val( "€" + ui.values[ 0 ] + " - €" + ui.values[ 1 ] );
        }
      });
      $( "#amount" ).val( "€" + $( "#price_slider" ).slider( "values", 0 ) +
        " - €" + $( "#price_slider" ).slider( "values", 1 ) );
    });
    $(function() {
      $( "#timeframe_slider" ).slider({
        range: true,
        min: 2010,
        max: 2015,
        values: [ 2012, 2013 ],
        slide: function( event, ui ) {
          $( "#timerange" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
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
    <div id="map_canvas">
    </div>
    <div id="over_map">
      <div id="buttons">
        <input id="bigbutton" class="part1" readonly="readonly" value="Overview" />
        <input id="bigbutton" class="part2" readonly="readonly" value="Detailed Maps" />
        <!--<input id="bigbutton" class="part3" on-click="shbtn3" readonly="readonly" value="Nice-To-Have" />-->
      </div>
      <div id="btn1click">
        <div id="drop_downs_div">
          <!--
          This section is for comparing 2 towns/counties based on "average"/unknown_metric
          Will allow user to select to compare by town or county
          Need to put in buttons for town and county.
          Will use tcd table from db to populate the drop-downs based on whether town or county selected.
          Will display information on chart based on selections compared to relative county/national average
          -->
          <div id="drop_downs">
            <select id="dd1">
              <!--<option value="default">--Please Select--</option>-->
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
            <select id="dd2">
              <!--<option value="default">--Please Select--</option>-->
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
              <input type="button" onclick="county_avg_chart();" id="compare_button" value="Compare">
          </div>
        </div>
        <!--Div that will hold the line chart-->
        <div id="chart_div">
        </div>
      </div>
      <div id="btn2click" style="display:none">
          <!--
          This section will be for displaying average house price of an area under "selector" compared to national average. Will display the average for area in selection to screen.

          Will allow end user to adjust the timeframe.

          Will allow user to specify the min/max cost and based on that and area under selector render
          to the screen the pin-markers for houses sold in the area.

          On clicking a pointer, the ender-user should see some useful data:
                          * How much the house sold for.
                          * If above/below asking price.
                          * if house was new/second hand at time of sale.
                      =>Colour-coding to see if new/2nd hand, above/below market value etc.

          -->
        <div id="in_tab">
          <p>Test for div 2</p>
          <p>Will display a map with a “selector”, allowing the users to select an area to zoom in on and calculate on. On the map pin-drops for the properties in the selected-area displaying information on the property will be displayed on the map. In the data-box, I will display the average/calculated-statistic for the selected area. I will also allow the user to show/hide pin-drops on the map based on timeline and cost using sliders.</p>
          <div>
            <p> The average/calculated-statistic for the selected area will be displayed here. Default will be national figure, then update dynamically as user selected area.</p>
            <p id="calc_stat_tab2">Average/Stat for Selected Area: €XXX,XXX.XX</p>
            <p id="calc_stat_tab2_info">*Defaults to National figure before selecting area.</p>
          </div>
          <div id="sliders">
            
              <P><label for="amount">Price: </label></P>
              <input type="text" id="amount" readonly style="border:0; color:#666; font-weight:bold;">
            <div id="price_slider"></div>
            
              <P><label for="timerange">Timeframe: </label></P>
              <input type="text" id="timerange" readonly style="border:0; color:#666; font-weight:bold;">
            <div id="timeframe_slider"></div>
          </div>
        </div>
      </div>
      <div id="btn3click" style="display:none">
          <!--

          -->
        <div id="in_tab">
          <p>Test for div 3</p>
          <p>Function will be implemented if 1 and 2 are implemented successfully first</p>
        </div>
      </div>
    </div>
  </div>