<?php
    ini_set('memory_limit', '1024M');
          // Connecting, selecting database
    $dbconn = pg_connect("host=hosting.service.url dbname=xxxxxxxx user=xxxxxxxx password=xxxxxxxx")
              or die('Could not connect: ' . pg_last_error());
      $county1 = $_GET['c_1'];
      //$county1="Carlow";
      //$county2="Dublin";
      $county2 = $_GET['c_2'];
      $county3 = "National";

    //$counties = 'SELECT * FROM house_price_data_db.county_averages order by county';
          /*$counties = 'SELECT * FROM house_price_data_db.county_median_months where county=$1 or county=$2 or county=$3 order by county';
          //$query_lnglat='SELECT lng, lat FROM house_price_data_db.main where id>0';
          $result_counties = pg_query_params($dbconn,$counties,array($county1,$county2,$county3)) or die('Query failed: ' . pg_last_error());
          $return = array();
          while($r = pg_fetch_assoc($result_counties)) {
              $return['county_med_month'] = $r;
          }

          header( "Content-type: application/json" );
          die( json_encode( array_values($return), JSON_NUMERIC_CHECK));
          /*
          echo("<script>");
          echo("county_med_month=".json_encode(array_values($county_meds_php), JSON_NUMERIC_CHECK).";");
          echo("</script>");

          //pg_free_result($result_counties);
          //pg_free_result($county_meds_php);
          pg_close($dbconn);
          */
          $counties = 'SELECT * FROM house_price_data_db.county_median_months where county=$1 or county=$2 or county=$3 order by county';
          $result_counties = pg_query_params($dbconn,$counties,array($county1,$county2,$county3)) or die('Query failed: ' . pg_last_error());
          $county_meds_php = array();
          while($r = pg_fetch_assoc($result_counties)) {
              $county_meds_php[] = $r;
          }

          header( "Content-type: application/json" ); // set the header to json
          
          //echo(json_encode($county_meds_php, JSON_NUMERIC_CHECK)); 
          echo(json_encode(array_values($county_meds_php), JSON_NUMERIC_CHECK)); // this will return json

          pg_close($dbconn);
?>