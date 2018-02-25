<!--
	PHP for filling in town drop downs for comparing towns.
-->

<?php 
	ini_set('memory_limit', '1024M');
    $county="Wexford";
    //$county1 = intval($_GET['county_1']);
    //$county2 = intval($_GET['county_2']);
    $dbconn = pg_connect("host=hosting.service.url dbname=xxxxxxxx user=xxxxxxxx password=xxxxxxxx")
        or die('Could not connect: ' . pg_last_error());

    $query_1="SELECT distinct(locality) FROM house_price_data_db.main where administrative_area_level_1=$1 and locality!='' order by locality";
	$result_2 = pg_query_params($dbconn,$query_1,array($county)) or die('Query failed: ' . pg_last_error());
    $dll_2="<select id=\"dd2_t\">";
    while($r = pg_fetch_array($result_2)) {
    	//echo ("<option value=\"locality\">" . $r['locality'] . "</option>");
        $dll_2.="<option value=\"". $r['locality'] ."\">" . $r['locality'] . "</option>";
    }
    $dll_2.="</select>";
    echo($dll_2);
    pg_free_result($result_2);
    pg_close($dbconn);
?>