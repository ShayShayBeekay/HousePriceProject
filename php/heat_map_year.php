<!--
    Heat Map php!
    This file is designed to pull down lat and lng points that are in Ireland and where they correspond to a given year.

    The basic gist of it works, but need to figure out a way for passing the year from the website into the PHP function.
    If 2010 is click, then <?PHP $selected_query=$query_2010;?>
    If 2011 is click, then <?PHP $selected_query=$query_2011;?>
    If 2012 is click, then <?PHP $selected_query=$query_2012;?>
    If 2013 is click, then <?PHP $selected_query=$query_2013;?>
    If 2014 is click, then <?PHP $selected_query=$query_2014;?>
-->

  <?php
  ini_set('memory_limit', '1024M');
    $year = intval($_GET['year']);
    $dbconn = pg_connect("host=hosting.service.url dbname=xxxxxxxx user=xxxxxxxx password=xxxxxxxx")
        or die('Could not connect: ' . pg_last_error());
    $lat_top=55.42901345;
    $lng_top=-6.064453125;
    $lat_btm=51.40;
    $lng_btm=-10.70;
    $query_2010="SELECT lat,lng,price FROM house_price_data_db.main where lat<=$1 and lat>=$2 and lng<=$3 and lng>=$4 and date_of_sale>'2009/12/31' and date_of_sale<'2011/01/01' order by date_of_sale";
    $query_2011="SELECT lat,lng,price FROM house_price_data_db.main where lat<=$1 and lat>=$2 and lng<=$3 and lng>=$4 and date_of_sale>'2010/12/31' and date_of_sale<'2012/01/01' order by date_of_sale";
    $query_2012="SELECT lat,lng,price FROM house_price_data_db.main where lat<=$1 and lat>=$2 and lng<=$3 and lng>=$4 and date_of_sale>'2011/12/31' and date_of_sale<'2013/01/01' order by date_of_sale";
    $query_2013="SELECT lat,lng,price FROM house_price_data_db.main where lat<=$1 and lat>=$2 and lng<=$3 and lng>=$4 and date_of_sale>'2012/12/31' and date_of_sale<'2014/01/01' order by date_of_sale";
    $query_2014="SELECT lat,lng,price FROM house_price_data_db.main where lat<=$1 and lat>=$2 and lng<=$3 and lng>=$4 and date_of_sale>'2013/12/31' and date_of_sale<'2015/01/01' order by date_of_sale";
    $selected_query=$year;
    $result = pg_query_params($dbconn,$selected_query,array($lat_top,$lat_btm,$lng_top,$lng_btm)) or die('Query failed: ' . pg_last_error());
    $heat_map_data = array();
    while($r = pg_fetch_assoc($result)) {$heat_map_data[] = $r;}
    //Removes the double-quotes
    echo("var heat_maps= ".json_encode(array_values($heat_map_data)).";");
    pg_free_result($result);
    //pg_free_result($result_lnglat);
    // Closing connection
    pg_close($dbconn);
 ?>
