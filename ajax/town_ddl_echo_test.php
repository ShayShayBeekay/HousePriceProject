<!--
	PHP for filling in town drop downs for comparing towns.
-->

<?php 
	ini_set('memory_limit', '1024M');
    //$county1="Wexford";
    //$county2="Carlow";
    $county1 = $_GET['c1'];
    $county2 = $_GET['c2'];
    $dbconn = pg_connect("host=hosting.service.url dbname=xxxxxxxx user=xxxxxxxx password=xxxxxxxx")
        or die('Could not connect: '.pg_last_error());

    //$query_1="SELECT distinct(locality) FROM house_price_data_db.main where administrative_area_level_1=$1 and locality!='' order by locality";
    $query_1="SELECT distinct(town) FROM house_price_data_db.town_avg where county=$1 and town!='' order by town";
	$result_1 = pg_query_params($dbconn,$query_1,array($county1)) or die('Query failed: '.pg_last_error());
	$result_2 = pg_query_params($dbconn,$query_1,array($county2)) or die('Query failed: '.pg_last_error());
    $dll_1="<select id=\"dd1_t\">";
    //echo("<select id=\"dd1_t\">");
    while($r = pg_fetch_array($result_1)) {
    	//echo ("<option value=\"locality\">".$r['locality']."</option>");
        $dll_1.="<option value=\"". $r['town'] ."\">".$r['town']."</option>";
    }
    $dll_1.="</select>";
    $dll_2="<select id=\"dd2_t\">";
    while($r = pg_fetch_array($result_2)) {
        $dll_2.="<option value=\"". $r['town'] ."\">".$r['town']."</option>";
    }
    $dll_2.="</select>";
    //echo("</select>");
    //echo("<select id=\"dd2_t\">");
    //while($r = pg_fetch_array($result_2)) {
    //	echo ("<option value=\"locality\">".$r['locality']."</option>");
    //}
    //echo("</select>");
    echo($dll_1);
    echo($dll_2);    
    pg_free_result($result_1);
    pg_free_result($result_2);
    pg_close($dbconn);
?>