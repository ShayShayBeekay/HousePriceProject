
<!DOCTYPE html>

<html lang="en">
<head>

	<meta charset="utf-8">
	<title>House Price Index Calculator</title>
	<link rel="stylesheet" media="screen" href="css/test_styles.css">
  <link rel="stylesheet" href="css/jquery-ui.css">

  <script src="https://maps.googleapis.com/maps/api/js?key=xxxxxxxx"></script>
  <script src="js/my_functions.js"></script>
  <script>
    <?php

    ini_set('memory_limit', '1024M');
    // Connecting, selecting database
    $dbconn = pg_connect("host=hosting.service.url dbname=xxxxxxxx user=xxxxxxxx password=xxxxxxxx")
        or die('Could not connect: ' . pg_last_error());

    // Performing SQL query
    $query = 'SELECT id,date_of_sale,address_string,locality,postal_town,administrative_area_level_1,lng,lat,price FROM house_price_data_db.main where id>0';
    //$query_lnglat='SELECT lng, lat FROM house_price_data_db.main where id>0';
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());
    //$result_lnglat = pg_query($query_lnglat) or die('Query failed: ' . pg_last_error());
    // Printing results in HTML
    //echo "<table>\n";
    //while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    //    echo "\t<tr>\n";
    //    foreach ($line as $col_value) {
    //        echo "\t\t<td>$col_value</td>\n";
    //    }
    //    echo "\t</tr>\n";
    //}
    //echo "</table>\n";
    $main_data = array();
    while($r = pg_fetch_assoc($result)) {
        $main_data[] = $r;
    }
    //print json_encode(array_values(pg_fetch_all($result)));

    echo("var testJson= " . json_encode(array_values($main_data)).";");
    //$lnglat_data = array();
    //while($r = pg_fetch_assoc($result_lnglat)) {
    //    $lnglat_data[] = $r;
    //}
    //print json_encode(array_values(pg_fetch_all($result)));
    //echo "<table>\n";
    //while ($line = pg_fetch_array($result_lng_lat, null, PGSQL_ASSOC)) {
    //    echo "\t<tr>\n";
    //    foreach ($line as $col_value) {
    //        echo "\t\t<td>$col_value</td>\n";
    //    }
    //    echo "\t</tr>\n";
    //}
    //echo "</table>\n";

    // Free resultset
    pg_free_result($result);
    //pg_free_result($result_lnglat);
    // Closing connection
    pg_close($dbconn);
    ?>
    console.log(testJson);
  </script>
  <script>
    function initialize() {
        var map_canvas = document.getElementById('map_canvas');
        var map_options = {
          center: new google.maps.LatLng(53.4427,-4.5),
          zoom: 7,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(map_canvas, map_options)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
  </script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      $(".part1").click(function(){
        $("#btn1click").show();
        $("#btn2click").hide();
        $("#btn3click").hide();
      });
      $(".part2").click(function(){
        $("#btn1click").hide();
        $("#btn2click").show();
        $("#btn3click").hide();
      });
      $(".part3").click(function(){
        $("#btn1click").hide();
        $("#btn2click").hide();
        $("#btn3click").show();
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
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
     //Test run at Google Charts
      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table. Eg is Wexford
        var data = new google.visualization.arrayToDataTable([
          ['Year', 'Wexford', 'Wicklow', 'National'],
          ['2010', 179563, 294120.1097, 243325.0286],
          ['2011', 143296, 247373.4193,215347.3284],
          ['2012', 139024 , 207622.9119,200949.104],
          ['2012', 142024 , 215622.9119,203949.104],
          //Made up for both
         // ['2013', 149024 ,      152296],
          //['2014', 155024 ,      167296]
        ]);
        // Set chart options
        var options = {'title':'House Price Averages by County: Wexford vs Wicklow',
                       };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  <!---->





<!--
// <?php
//PHP for displaying pointers to a map.
// Create connection
//  //mysqli_connect(host,username,password,dbname);
//  $con=mysqli_connect("127.0.0.1","root","pwd","house_price_data_db");
// Check connection
//  if (mysqli_connect_errno()) {
//    echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }
//  $query="SELECT lat, lng, addresss_string from main";
//  $result = mysqli_query($con,query);
//  echo '<div><p id="test_php">IT WORKS</p><div>'
//  while($row = mysqli_fetch_array($result)) {
//    echo 'var marker = new google.maps.Marker({';
//    echo 'position: new google.maps.LatLng($row[\'lat\'],$row[\'lng\']),';
//    echo 'map: map,';
//    echo 'title: \'$row[\'address_string\']\'';
//    echo '});';
//  }

//  mysqli_close($con);
  ?>
-->
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
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
        <input id="bigbutton" class="part1"  on-click="shbtn1" readonly="readonly" value="Overview" />
        <input id="bigbutton" class="part2" on-click="shbtn2" readonly="readonly" value="Detailed Maps" />
        <input id="bigbutton" class="part3" on-click="shbtn3" readonly="readonly" value="Nice-To-Have" />
        <!--
        <button id="bigbutton" class="part1"  on-click="shbtn1" name="Overview">Overview<button/>
        <button id="bigbutton" class="part2" on-click="shbtn2" name="Detailed Maps">Detailed Maps<button/>
        <button id="bigbutton" class="part3" on-click="shbtn3" name="Nice-To-Have">Nice-to-Have<button/>
      -->
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
              <option value="">County 1</option>
              <option value="">Cavan</option>
              <option value="">:</option>
              <option value="">Wexford</option>
              <option value="">Wicklow</option>
            </select>
            </br>
              <select id="dd2">
              <option value="">County 2</option>
              <option value="">Cavan</option>
              <option value="">:</option>
              <option value="">Wexford</option>
              <option value="">Wicklow</option>
            </select>
          </div>
        </div>
        <!--Div that will hold the pie chart-->
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
</body>
