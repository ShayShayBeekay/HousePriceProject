<!--
    Selector Points php!
    This file is designed to pull down lat and lng points that are in Ireland and where they correspond to a timeframe and price range.

    oldest_end_timeframe:
    if 2010 -> date_of_sale>'2009/12/31'
    if 2011 -> date_of_sale>'2010/12/31'
    if 2012 -> date_of_sale>'2011/12/31'
    if 2013 -> date_of_sale>'2012/12/31'
    if 2014 -> date_of_sale>'2009/12/31'

    newest_end_timeframe:
    if 2011 -> date_of_sale<'2012/01/01'
    if 2012 -> date_of_sale<'2013/01/01'
    if 2013 -> date_of_sale<'2014/01/01'
    if 2014 -> date_of_sale<'2015/01/01'
    if 2015 -> date_of_sale<'2016/01/01'
    
    less_than_price:

    greater_than_price:


	Will work on selector logic after, but premise works for showing hiding points in Ireland where the date range is applied.

    The basic gist of it works, but need to figure out a way for passing the year and price_range from the website into the PHP function.
-->

  <?php
    $q = intval($_GET['q']);
  ini_set('memory_limit', '1024M');
    $dbconn = pg_connect("host=hosting.service.url dbname=xxxxxxxx user=xxxxxxxx password=xxxxxxxx")
        or die('Could not connect: ' . pg_last_error());
    
    $greater_than_price=150000;
    $less_than_price=300000;

    $oldest_end_timeframe='2010/12/31';
    $newest_end_timeframe='2014/01/01';

    $query="SELECT date_of_sale,address_string,lat,lng,price FROM house_price_data_db.main where date_of_sale>$1 and date_of_sale<$2 and price>=$3 and price<=$4 order by date_of_sale";
    $result = pg_query_params($dbconn,$query,array($oldest_end_timeframe,$newest_end_timeframe,$greater_than_price,$less_than_price)) or die('Query failed: ' . pg_last_error());

    //$query="SELECT date_of_sale,address_string,lat,lng,price FROM house_price_data_db.main where date_of_sale>'2010/12/31' and date_of_sale<'2014/01/01' and price>=150000 and price<=300000 order by date_of_sale";
    //$result = pg_query($query) or die('Query failed: ' . pg_last_error());
    $points_in_range = array();
    while($r = pg_fetch_assoc($result)) {$points_in_range[] = $r;}
    //Removes the double-quotes
    echo("var points_in_range= ".json_encode(array_values($points_in_range)).";");
    pg_free_result($result);
    //pg_free_result($result_lnglat);
    // Closing connection
    pg_close($dbconn);
 ?>