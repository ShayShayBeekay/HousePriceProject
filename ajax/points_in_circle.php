<!--
S. Brennan-Kelly
4th BSc CSSE

House Price Index Calculator

points_in_circle.php

This file contains the PHP for adding points the selected area for the Detailed section of the application.
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
    $minprice = $_GET['minprice'];
    $maxprice = $_GET['maxprice'];
    $minyear = $_GET['minyear'];
    $maxyear = $_GET['maxyear'];

    //Variables for later use
    $rad=$rad_m/1000;
    //Convert the lat and lng variables into radians for later use
    $rad_lat=deg2rad($lat);
    $rad_lng=deg2rad($lng);
    

    //Check the min and max years recieved and set begin and end dates accordingly
    if($minyear==2010){
      $begin='2010/01/01';
    }else if($minyear==2011){
      $begin='2011/01/01';
    }else if($minyear==2012){
      $begin='2012/01/01';
    }else if($minyear==2013){
      $begin='2013/01/01';
    }else if($minyear==2014){
      $begin='2014/01/01';
    }
    if($maxyear==2010){
      $end='2011/01/01';
    }else if($maxyear==2011){
      $end='2012/01/01';
    }else if($maxyear==2012){
      $end='2013/01/01';
    }else if($maxyear==2013){
      $end='2014/01/01';
    }else if($maxyear==2014){
      $end='2015/01/01';
    }

    //The earth's mean radius (in km)
    $R = 6371;

    //First-cut bounding box (in degrees)
    $max_lat = $lat + rad2deg(($rad/$R));
    $min_lat = $lat - rad2deg(($rad/$R));

    //Compensation for degrees longitude getting smaller with increasing latitude
    $min_lng = $lng + rad2deg(($rad/$R)/(cos(deg2rad($lat))));
    $max_lng = $lng - rad2deg(($rad/$R)/(cos(deg2rad($lat))));
    
    //Query to send to database to return the data points to be display
    $address_points = 'SELECT lat,lng,price,address_string,date_of_sale, 
                        acos(sin($1)*sin(radians(lat)) + cos($1)*cos(radians(lat))*cos(radians(lng)-$2)) * $3 As D
                        FROM (
                            Select lat,lng,price,address_string,date_of_sale 
                            From house_price_data_db.main 
                            Where lat >=$4 and lat <=$5
                              and lng >=$7 and lng<=$6
                              and date_of_sale>=$9 and date_of_sale<$10 
                              and price>=$11 and price<=$12
                        ) As FirstCut
                        WHERE acos(sin($1)*sin(radians(lat)) + cos($1)*cos(radians(lat))*cos(radians(lng)-$2)) * $3 < $8 Order by D';
    
    //Make call on DB with above query and the parameters above
    $result_address_points = pg_query_params($dbconn,$address_points,
    array($rad_lat,$rad_lng,$R,$min_lat,$max_lat,$min_lng,$max_lng,$rad,$begin,$end,$minprice,$maxprice)) or die('Query failed: ' . pg_last_error());   
    
    //Set up array to store result
    $address_points_array[]=array();

    //Enter query results into address_points_array array
    while($r = pg_fetch_assoc($result_address_points)){
        $address_points_array[] = $r;
   }

    //Set the header to json
    header( "Content-type: application/json");

    //Return the array to the JavaScript function
    echo(json_encode(array_values($address_points_array), JSON_NUMERIC_CHECK));

    //Close connection
    pg_close($dbconn);
?>