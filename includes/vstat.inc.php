<?php
$page = 'vstat.inc.php';
$data = simplexml_load_file("xml/heroes/hero.xml")
	       or die(error(date(DATE_RFC822),$page,__LINE__,'Error loading hero.xml for location'));
$hloc = $data->hes->he->location;
$xml = simplexml_load_file("xml/villians/" . $hloc . "_vil.xml")
	       or die(error(date(DATE_RFC822),$page,__LINE__,'Error loading ' . $hloc . '_vil.xml for villian stats'));
		   
		
		 $vc = $xml->vico;
		 $select = mt_rand()&$vc;
		 if ($select == 0) {
		 $select = $select + 1;
		 }

$result = $xml->xpath("/data/vis/vi/id[.='".$select."']/parent::*");
if ($result) {
   $node = $result[0];
   $vname = $node->name;
   $vatt = $node->att;
   $vhp = $node->hp;
   $vxp = $node->xp  ;
   
} else {
   error(date(DATE_RFC822),$page,__LINE__,'Error getting stats from' . $hloc . '_vil.xml');
}		   
?>