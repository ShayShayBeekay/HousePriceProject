<!--
S. Brennan-Kelly
4th BSc CSSE

House Price Index Calculator

county_med_month.php

This file contains the PHP for getting the medians for the graph in the Overview section of the application.
-->

<?php
    ini_set('memory_limit', '1024M');
    //Connecting, selecting database
    $dbconn = pg_connect("host=hosting.service.url dbname=xxxxxxxx user=xxxxxxxx password=xxxxxxxx")
              or die('Could not connect: ' . pg_last_error());

    //Get variables passed to method
    $county1 = $_GET['c_1'];
    $county2 = $_GET['c_2'];
    $county3 = "National";

    //Query to get data from county_medians table for the specified counties and the national
    $counties = 'SELECT * FROM house_price_data_db.county_median_months where county=$1 or county=$2 or county=$3 order by county';

    //Make call on DB with above query and the parameters of the counties and National
    $result_counties = pg_query_params($dbconn,$counties,array($county1,$county2,$county3)) or die('Query failed: ' . pg_last_error());

    //Create array county_meds_php
    $county_meds_php = array();

    //Enter query results into county_meds_php array
    while($r = pg_fetch_assoc($result_counties)){
        $county_meds_php[] = $r;
   }

    //Set the header to json
    header( "Content-type: application/json");

    //Return the array to the JavaScript function
    echo(json_encode(array_values($county_meds_php), JSON_NUMERIC_CHECK));

    //Close connection
    pg_close($dbconn);
?>
