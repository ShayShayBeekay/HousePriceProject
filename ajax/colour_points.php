<!--
S. Brennan-Kelly
4th BSc CSSE

House Price Index Calculator

colour_points.php

This file contains the PHP for adding the colour dats of the maps for each year for the Overview section of the application.
-->

<?php
    ini_set('memory_limit', '1024M');
    
    //Connecting, selecting database
    $dbconn = pg_connect("host=hosting.service.url dbname=xxxxxxxx user=xxxxxxxx password=xxxxxxxx")
              or die('Could not connect: ' . pg_last_error());
    
    //Get variables passed to method
    $year = $_GET['year'];
    if($year==2010){
      $begin='2010/01/01';
      $end='2011/01/01';
   }else if($year==2011){
      $begin='2011/01/01';
      $end='2012/01/01';
   }else if($year==2012){
      $begin='2012/01/01';
      $end='2013/01/01';
   }else if($year==2013){
      $begin='2013/01/01';
      $end='2014/01/01';
   }else if($year==2014){
      $begin='2014/01/01';
      $end='2015/01/01';
   }
    //Query to get data for each of the colour dots
    $colour_points = 'SELECT lat,lng,price FROM house_price_data_db.main where lat>=50 and lat<=57 and lng>=-10 and lng<=-5 and price>=50000 and date_of_sale>=$1 and date_of_sale<$2 order by price asc';
    
    //Make call on DB with above query and the parameters above
    $result_colour_points = pg_query_params($dbconn,$colour_points,array($begin,$end)) or die('Query failed: ' . pg_last_error());
    
    //Set up array for later use
    $colour_points_array = array();

    //Iterate through query results and store in colour_points_array
    while($r = pg_fetch_assoc($result_colour_points)){
        $colour_points_array[] = $r;
   }
    
    //Set the header to json
    header( "Content-type: application/json");

    //Return the array to the JavaScript functions
    echo(json_encode(array_values($colour_points_array), JSON_NUMERIC_CHECK));

    //Close connection
    pg_close($dbconn);
?>