<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Heatmap Test</title>
    <script>
      <?php
      ini_set('memory_limit', '1024M');
        $dbconn = pg_connect("host=hosting.service.url dbname=xxxxxxxx user=xxxxxxxx password=xxxxxxxx")
            or die('Could not connect: ' . pg_last_error());
        $lat_top=55.42901345;
        $lng_top=-6.064453125;
        $lat_btm=51.40;
        $lng_btm=-10.70;
        $query = 'SELECT lat,lng,price FROM house_price_data_db.main where lat<=56 and lat>=51 and lng<=-6 and lng>=-11 and id<500';
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());
        $heat_map_data = array();
        while($r = pg_fetch_assoc($result)) {$heat_map_data[] = $r;}
        //Removes the double-quotes

        echo("var heat_maps= ".json_encode(array_values($heat_map_data)).";");
        pg_free_result($result);
        //pg_free_result($result_lnglat);
        // Closing connection
        pg_close($dbconn);
     ?>
    </script>
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
      #panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=visualization"></script>
    <script>
      // Adding 500 Data Points
      var map, pointarray, heatmap;

      var lat=0;
      var lng=0;
      var heatMapData = [];
      for(i = 0; i < heat_maps.length; i += 1){
          var x = heat_maps_json[i];
          lat=parseFloat(x.lat);
          lng=parseFloat(x.lng);
          heatMapData[j]={new google.maps.LatLng(lat,lng)};
        }
      function initialize() {
        var map_options = {
              center: new google.maps.LatLng(53.4427,-4.5),
              zoom: 7,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            }

        map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);

        var pointArray = new google.maps.MVCArray(heatMapData);

        heatmap = new google.maps.visualization.HeatmapLayer({
          data: pointArray
        });
        heatmap.setMap(map);
      }


      function changeOpacity() {
        heatmap.set('opacity', heatmap.get('opacity') ? null : 0.2);
      }

      google.maps.event.addDomListener(window, 'load', initialize);

          </script>
        </head>

        <body>
          <div id="panel">
            <button onclick="changeOpacity()">Change opacity</button>
          </div>
          <div id="map-canvas"></div>
        </body>
      </html>