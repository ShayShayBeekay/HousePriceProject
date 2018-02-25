<?php 
	ini_set('memory_limit', '1024M');
    $county2 = intval($_GET['county']);
    $dbconn = pg_connect("host=hosting.service.url dbname=xxxxxxxx user=xxxxxxxx password=xxxxxxxx")
        or die('Could not connect: ' . pg_last_error());
    
    $query_2="SELECT distinct(locality) FROM house_price_data_db.main where county=$1 order by locality";
	$result_2 = pg_query_params($dbconn,$query_2,array($county2)) or die('Query failed: ' . pg_last_error());

    echo("</select>");
    echo("<select id=\"dd2_t\">");
    while($r = pg_fetch_array($result_2)) {
    	echo ("<option value=\"locality\">" . $r['locality'] . "</option>");
    }
    echo("</select>");
    pg_free_result($result);
    pg_close($dbconn);
?>