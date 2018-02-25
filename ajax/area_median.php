<!--
S. Brennan-Kelly
4th BSc CSSE

House Price Index Calculator

area_median.php

This file contains the PHP for calculating the median values for the selected area for the Detailed section of the application.
-->

<?php
    ini_set('memory_limit', '1024M');

    //Connecting, selecting database
    $dbconn = pg_connect("host=hosting.service.url dbname=xxxxxxxx user=xxxxxxxx password=xxxxxxxx")
              or die('Could not connect: ' . pg_last_error());

    //Get variables passed to method
    $lat = $_GET['c_lat']; //latitude of centre of bounding circle in degrees
    $lng = $_GET['c_lng']; //longitude of centre of bounding circle in degrees
    $rad_m = $_GET['c_rad']; //radius of bounding circle in kilometers


    //Variables for later use
    $rad=$rad_m/1000;
    //Convert the lat and lng variables into radians for later use
    $rad_lat=deg2rad($lat);
    $rad_lng=deg2rad($lng);

    //Variables for later use
    $begin_10='2010/01/01';
    $begin_11='2011/01/01';
    $begin_12='2012/01/01';
    $begin_13='2013/01/01';
    $begin_14='2014/01/01';

    $end_10='2011/01/01';
    $end_11='2012/01/01';
    $end_12='2013/01/01';
    $end_13='2014/01/01';
    $end_14='2015/01/01';

    $max_10='med_10';
    $max_11='med_11';
    $max_12='med_12';
    $max_13='med_13';
    $max_14='med_14';

    //The earth's mean radius (in km)
    $R = 6371;

    //First-cut bounding box (in degrees)
    $max_lat = $lat + rad2deg(($rad/$R));
    $min_lat = $lat - rad2deg(($rad/$R));

    //Compensation for degrees longitude getting smaller with increasing latitude
    $min_lng = $lng + rad2deg(($rad/$R)/(cos(deg2rad($lat))));
    $max_lng = $lng - rad2deg(($rad/$R)/(cos(deg2rad($lat))));

    //Query to select the median value for the selected area for each year
    $med_sql = 'SELECT MAX(price) as med
                FROM(
                  SELECT price, lat,lng, ntile(2) OVER (ORDER BY price) AS bucket, acos(sin($1)*sin(radians(lat)) + cos($1)*cos(radians(lat))*cos(radians(lng)-$2)) * $3 As D
                  FROM(
                        SELECT price ,lat,lng
                        FROM house_price_data_db.main
                        WHERE   lat >=$4
                            and lat <=$5
                            and lng >=$7
                            and lng<=$6
                            and date_of_sale>=$9
                            and date_of_sale<$10
                    )as FirstCut
                    WHERE acos(sin($1)*sin(radians(lat)) + cos($1)*cos(radians(lat))*cos(radians(lng)-$2)) * $3 < $8 Order by D
                )as t
                WHERE bucket = 1 GROUP BY bucket;';

    //Run queries for each year 2010:2014
    $result_med_10 = pg_query_params($dbconn,$med_sql,
    array($rad_lat,$rad_lng,$R,$min_lat,$max_lat,$min_lng,$max_lng,$rad,$begin_10,$end_10)) or die('Query failed: ' . pg_last_error());
    $result_med_11 = pg_query_params($dbconn,$med_sql,
    array($rad_lat,$rad_lng,$R,$min_lat,$max_lat,$min_lng,$max_lng,$rad,$begin_11,$end_11)) or die('Query failed: ' . pg_last_error());
    $result_med_12 = pg_query_params($dbconn,$med_sql,
    array($rad_lat,$rad_lng,$R,$min_lat,$max_lat,$min_lng,$max_lng,$rad,$begin_12,$end_12)) or die('Query failed: ' . pg_last_error());
    $result_med_13 = pg_query_params($dbconn,$med_sql,
    array($rad_lat,$rad_lng,$R,$min_lat,$max_lat,$min_lng,$max_lng,$rad,$begin_13,$end_13)) or die('Query failed: ' . pg_last_error());
    $result_med_14 = pg_query_params($dbconn,$med_sql,
    array($rad_lat,$rad_lng,$R,$min_lat,$max_lat,$min_lng,$max_lng,$rad,$begin_14,$end_14)) or die('Query failed: ' . pg_last_error());

    //Create array to store all results together
    $results=array($result_med_10,$result_med_11,$result_med_12,$result_med_13,$result_med_14);

    //Iterate through results array, send values to med_array
    for($s=0;$s<sizeof($results);$s=$s+1){
      while($r = pg_fetch_assoc($results[$s])){
          $med_array[] = $r;
     }
   }

    //Set the header to json
    header( "Content-type: application/json");

    //Return the array to the JavaScript function
    echo(json_encode(array_values($med_array), JSON_NUMERIC_CHECK));

    //Close connection
    pg_close($dbconn);
?>
