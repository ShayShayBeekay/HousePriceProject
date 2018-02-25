<?php
	//$county_1=$_GET["c_1"];
    //$county_2=$_GET["c_2"];
	$county_1="Cork";
	$county_2="Carlow";
    //print($county_1);
    //print($county_2);
	//$county_1="Carlow";
	//$county_2="Cork";
	$dbconn=pg_connect("host=hosting.service.url dbname=xxxxxxxx user=xxxxxxxx password=xxxxxxxx")
        or die('Could not connect: '.pg_last_error());

    //Calculates the averages of the selected counties
        //County Averages 2010
    $qry_avg_10="SELECT floor(avg(price)) from house_price_data_db.main where administrative_area_level_1 =$1 and (price between 50000 and 3000000) and date_of_sale>='01/01/2010' and date_of_sale <'01/01/2011'";
    $result_c1_10=pg_query_params($dbconn,$qry_avg_10,array($county_1)) or die('Query failed: '.pg_last_error());
    $result_c2_10=pg_query_params($dbconn,$qry_avg_10,array($county_2))or die('Query failed: '.pg_last_error());
	$avgc1_10 = pg_fetch_result($result_c1_10,0,0);
	//$avgc1_10=123456;
	$avgc2_10 = pg_fetch_result($result_c2_10,0,0);

        //County Averages 2011
	$qry_avg_11="SELECT floor(avg(price)) from house_price_data_db.main where administrative_area_level_1 =$1 and price>=50000 and price<=3000000 and date_of_sale>='01/01/2011' and date_of_sale <'01/01/2012'";
	$result_c1_11=pg_query_params($dbconn,$qry_avg_11,array($county_1)) or die('Query failed: '.pg_last_error());
	$avgc1_11 = pg_fetch_result($result_c1_11,0,0);
	$result_c2_11=pg_query_params($dbconn,$qry_avg_11,array($county_2)) or die('Query failed: '.pg_last_error());
	$avgc2_11 = pg_fetch_result($result_c2_11,0,0);

        //County Averages 2012
	$qry_avg_12="SELECT floor(avg(price)) from house_price_data_db.main where administrative_area_level_1 =$1 and price>=50000 and price<=3000000 and date_of_sale>='01/01/2012' and date_of_sale <'01/01/2013'";
	$result_c1_12=pg_query_params($dbconn,$qry_avg_12,array($county_1)) or die('Query failed: '.pg_last_error());
	$avgc1_12 = pg_fetch_result($result_c1_12,0,0);
	$result_c2_12=pg_query_params($dbconn,$qry_avg_12,array($county_2)) or die('Query failed: '.pg_last_error());
	$avgc2_12 = pg_fetch_result($result_c2_12,0,0);

        //County Averages 2013
	$qry_avg_13="SELECT floor(avg(price)) from house_price_data_db.main where administrative_area_level_1 =$1 and price>=50000 and price<=3000000 and date_of_sale>='01/01/2013' and date_of_sale <'01/01/2014'";
	$result_c1_13=pg_query_params($dbconn,$qry_avg_13,array($county_1)) or die('Query failed: '.pg_last_error());
	$avgc1_13 = pg_fetch_result($result_c1_13,0,0);
	$result_c2_13=pg_query_params($dbconn,$qry_avg_13,array($county_2)) or die('Query failed: '.pg_last_error());
	$avgc2_13 = pg_fetch_result($result_c2_13,0,0);
        //County Averages 2014
	$qry_avg_14="SELECT floor(avg(price)) from house_price_data_db.main where administrative_area_level_1 =$1 and price>=50000 and price<=3000000 and date_of_sale>='01/01/2014' and date_of_sale <'01/01/2015'";
	$result_c1_14=pg_query_params($dbconn,$qry_avg_14,array($county_1)) or die('Query failed: '.pg_last_error());
	$avgc1_14 = pg_fetch_result($result_c1_14,0,0);
	$result_c2_14=pg_query_params($dbconn,$qry_avg_14,array($county_2)) or die('Query failed: '.pg_last_error());
	$avgc2_14 = pg_fetch_result($result_c2_14,0,0);
	//Calculated the National Averages
	$qry_avg_nat_10="SELECT floor(avg(price)) from house_price_data_db.main where price>=50000 and price<=3000000 and date_of_sale>='01/01/2010' and date_of_sale<'01/01/2011'";
	$result_nat_10=pg_query($qry_avg_nat_10) or die('Query failed: '.pg_last_error());
	$avgnat_10 = pg_fetch_result($result_nat_10,0,0);

	$qry_avg_nat_11="SELECT floor(avg(price)) from house_price_data_db.main where price>=50000 and price<=3000000 and date_of_sale>='01/01/2011' and date_of_sale<'01/01/2012'";
	$result_nat_11=pg_query($qry_avg_nat_11) or die('Query failed: '.pg_last_error());
	$avgnat_11 = pg_fetch_result($result_nat_11,0,0);

	$qry_avg_nat_12="SELECT floor(avg(price)) from house_price_data_db.main where price>=50000 and price<=3000000 and date_of_sale>='01/01/2012' and date_of_sale<'01/01/2013'";
	$result_nat_12=pg_query($qry_avg_nat_12) or die('Query failed: '.pg_last_error());
	$avgnat_12 = pg_fetch_result($result_nat_12,0,0);

	$qry_avg_nat_13="SELECT floor(avg(price)) from house_price_data_db.main where  price>=50000 and price<=3000000 and date_of_sale>='01/01/2013' and date_of_sale<'01/01/2014'";
	$result_nat_13=pg_query($qry_avg_nat_13) or die('Query failed: '.pg_last_error());
	$avgnat_13 = pg_fetch_result($result_nat_13,0,0);

	$qry_avg_nat_14="SELECT floor(avg(price)) from house_price_data_db.main where  price>=50000 and price<=3000000 and date_of_sale>='01/01/2014' and date_of_sale<'01/01/2015'";
	$result_nat_14=pg_query($qry_avg_nat_14) or die('Query failed: '.pg_last_error());
	$avgnat_14 = pg_fetch_result($result_nat_14,0,0);

//print("data=new google.visualization.arrayToDataTable([['Year', '".$county_1."', '".$county_2."', 'National'],['2010', ".$avgc1_10.", ".$avgc2_10.", ".$avgnat_10."],['2011', ".$avgc1_11.", ".$avgc2_11.", ".$avgnat_11."],['2012', ".$avgc1_12.", ".$avgc2_12.", ".$avgnat_12."],['2013',".$avgc1_13.", ".$avgc2_13.", ".$avgnat_13."],['2014',".$avgc1_14.", ".$avgc2_14.", ".$avgnat_14."],]);");
	print("<script>");
	print("avg_10_1=".$avgc1_10.";"."<br>");
	print("avg_11_1=".$avgc1_11.";"."<br>");
	print("avg_12_1=".$avgc1_12.";"."<br>");
	print("avg_13_1=".$avgc1_13.";"."<br>");
	print("avg_14_1=".$avgc1_14.";"."<br>");

	print("avg_10_2=".$avgc2_10.";"."<br>");
	print("avg_11_2=".$avgc2_11.";"."<br>");
	print("avg_12_2=".$avgc2_12.";"."<br>");
	print("avg_13_2=".$avgc2_13.";"."<br>");
	print("avg_14_2=".$avgc2_14.";"."<br>");

	print("avg_10_nat=".$avgnat_10.";"."<br>");
	print("avg_11_nat=".$avgnat_11.";"."<br>");
	print("avg_12_nat=".$avgnat_12.";"."<br>");
	print("avg_13_nat=".$avgnat_13.";"."<br>");
	print("avg_14_nat=".$avgnat_14.";"."<br>");
	print("</script>");
?>