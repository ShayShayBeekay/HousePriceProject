<?php
    ini_set('memory_limit', '1024M');
          // Connecting, selecting database
    $dbconn = pg_connect("host=hosting.service.url dbname=xxxxxxxx user=xxxxxxxx password=xxxxxxxx")
              or die('Could not connect: ' . pg_last_error());
    $lat1 = $_GET['lat1'];
    $lat2 = $_GET['lat2'];
    $lng1 = $_GET['lng1'];
    $lng2 = $_GET['lng2'];
    $minprice = $_GET['minprice'];
    $maxprice = $_GET['maxprice'];
    $minyear = $_GET['minyear'];
    $maxyear = $_GET['maxyear'];
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

    /*
    $lat1 = 50.5;
    $lat2 = 58.0;
    $lng1 = -3.5;
    $lng2 = -7.0;
  */

    $pin_points = 'SELECT lat,lng,price,address_string,date_of_sale FROM house_price_data_db.main where lat>=$1 and lat<=$2 and lng<=$3 and lng>=$4 and date_of_sale>=$5 and date_of_sale<$6 and price>=$7 and price<=$8';
    //$colour_points = 'SELECT lat,lng,price,address_string FROM house_price_data_db.main';
    $result_pinpoints_points = pg_query_params($dbconn,$pin_points,array($lat1,$lat2,$lng1,$lng2,$begin,$end,$minprice,$maxprice)) or die('Query failed: ' . pg_last_error());
    $pin_points_array = array();
    while($r = pg_fetch_assoc($result_pinpoints_points)) {
        $pin_points_array[] = $r;
    }
    header("Content-type: application/json" ); // set the header to json 
    echo(json_encode(array_values($pin_points_array), JSON_NUMERIC_CHECK)); // this will return json
    pg_close($dbconn);
?>