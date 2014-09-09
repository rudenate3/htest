<?php 
$page = 'changelocation.inc.php';
echo '<p>Change to:';
$data = simplexml_load_file("xml/locations/master_loc.xml")
	       or die(error(date(DATE_RFC822),$page,__LINE__,'Error loading master_loc.xml for location listing'));
foreach($data->children() as $loc){
$loca = $loc->name;
$vloc = $loc->vanity;
echo '<p><a href=index.php?content=dochangelocation&loc=' . $loca .'>' .$vloc .'</a>';
}