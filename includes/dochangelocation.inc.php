<?php
$page = 'dochangelocation.inc.php';
$nloc = $_REQUEST['loc'];
$xml = simplexml_load_file("xml/locations/master_loc.xml")
	       or die(error(date(DATE_RFC822),$page,__LINE__,'Error loading master_loc.xml for location change'));
$result = $xml->xpath("/data/loc/name[.='".$nloc."']/parent::*");
if ($result) {
   $node = $result[0];
   $lname = $node->name;
   $lvan = $node->vanity;
} else {
   echo "<p>There was an error getting to location";
}		   
$data = simplexml_load_file("xml/heroes/hero.xml")
	       or die(error(date(DATE_RFC822),$page,__LINE__,'Error loading hero.xml for new location'));
$data->hes->he->location = $nloc;
$data->asXML('xml/heroes/hero.xml') 
		or die(error(date(DATE_RFC822),$page,__LINE__,'Error writing new location to hero.xml'));
echo 'You have arrived at ' . $lvan;






//$result = $xml->xpath("/data/vis/vi/id[.='".$select."']/parent::*");