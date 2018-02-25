<?php
    ini_set('memory_limit', '1024M');
          // Connecting, selecting database
    $dbconn = pg_connect("host=hosting.service.url dbname=xxxxxxxx user=xxxxxxxx password=xxxxxxxx")
              or die('Could not connect: ' . pg_last_error());
  
    $num = 0;
	$sql = 'SELECT * FROM house_price_data_db.main order by id';
	$result = pg_query($sql) or die('Query failed: ' . pg_last_error());
	$array=array();
	while($r = pg_fetch_assoc($result)) {
        $array[] = $r;
    }
	$output = fopen("php://output",'w') or die("Can't open php://output");

	header("Content-Type:application/csv"); 
	header("Content-Disposition:attachment;filename=main_f.csv"); 
	fputcsv($output, array('id','date_of_sale','address_string','street_number','premise','route','neighbourhood','sublocality_level_1','locality','postal_town','administrative_area_level_2','administrative_area_level_1','country','formatted_address','lat','lng','price','not_full_market_price','vat_exclusive','description_of_property','property_size_description' ));
	foreach($array as $main) {
	    fputcsv($output, $main);
	}
	fclose($output) or die("Can't close php://output");
    pg_close($dbconn);
?>