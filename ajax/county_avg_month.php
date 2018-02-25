<?php
    ini_set('memory_limit', '1024M');
          // Connecting, selecting database
    $dbconn = pg_connect("host=hosting.service.url dbname=xxxxxxxx user=xxxxxxxx password=xxxxxxxx")
              or die('Could not connect: ' . pg_last_error());

    //$counties = 'SELECT * FROM house_price_data_db.county_averages order by county';
              $counties = 'SELECT * FROM house_price_data_db.county_averages_months order by county';
          //$query_lnglat='SELECT lng, lat FROM house_price_data_db.main where id>0';
          $result_counties = pg_query($counties) or die('Query failed: ' . pg_last_error());
          $county_averages = array();
          while($r = pg_fetch_assoc($result_counties)) {
              $county_averages[] = $r;
          }
          echo("var county_avg_month= " . json_encode(array_values($county_averages)).";");

          pg_free_result($result_counties);
          pg_close($dbconn);
?>