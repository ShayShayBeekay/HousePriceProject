<?php
    ini_set('memory_limit', '1024M');
          // Connecting, selecting database
    $dbconn = pg_connect("host=hosting.service.url dbname=xxxxxxxx user=xxxxxxxx password=xxxxxxxx")
              or die('Could not connect: ' . pg_last_error());
      
          $colour_points = 'SELECT lat,lng,price FROM house_price_data_db.main where date_of_sale>=$1 and date_of_sale<$2 order by lat';
          $result_colour_points = pg_query_params($dbconn,$colour_points,array('2010/01/01' ,'2011/01/01' )) or die('Query failed: ' . pg_last_error());
          $colour_points_array = array();
          while($r = pg_fetch_assoc($result_colour_points)) {
              $colour_points_array[] = $r;
          }
          header( "Content-type: application/json" ); // set the header to json 
          echo(json_encode(array_values($colour_points_array), JSON_NUMERIC_CHECK)); // this will return json

          pg_close($dbconn);
?>