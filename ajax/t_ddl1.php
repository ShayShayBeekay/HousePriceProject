<?php 
	ini_set('memory_limit', '1024M');
    $county1 = intval($_GET['county']);
    $dbconn = pg_connect("host=hosting.service.url dbname=xxxxxxxx user=xxxxxxxx password=xxxxxxxx")
        or die('Could not connect: ' . pg_last_error());
    
    $query_1="SELECT distinct(locality) FROM house_price_data_db.main where county=$1 order by locality";
	$result_1 = pg_query_params($dbconn,$query_1,array($county1)) or die('Query failed: ' . pg_last_error());

    echo("</select>");
    echo("<select id=\"dd1_t\">");
    while($r = pg_fetch_array($result_1)) {
    	echo ("<option value=\"locality\">" . $r['locality'] . "</option>");
    }
    echo("</select>");
    pg_free_result($result);
    pg_close($dbconn);
?>