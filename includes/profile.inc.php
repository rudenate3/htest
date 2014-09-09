<?php
$page = 'profile.inc.php';
$xml = simplexml_load_file("xml/heroes/hero.xml")
	       or die(error(date(DATE_RFC822),$page,__LINE__,'Error loading hero.xml for stats'));
		   
		foreach($xml->children() as $hes){
	    foreach($hes->children() as $he => $hero){
	      $hname = $hero->name;
		  $hlev = (int)$hero->lev;
	      $hatt = $hero->att;
	      $hhp = $hero->hp;
		  $hxp = $hero->xp;
		  $htnl = $hero->tnl;
		  $hap = $hero->ap;
	      $hme = $hero->maxen;
		  $hce = $hero->curen;
		  $hdef = $hero->def;
		  $hspe = $hero->spe;
		  $hint = $hero->int;
		  $hwis = $hero->wis;
		  $hloc = $hero->location;
		
	    }
	}
$nloc = $hloc;
$xml = simplexml_load_file("xml/locations/master_loc.xml")
	       or die(error(date(DATE_RFC822),$page,__LINE__,'Error loading master_loc.xml for location vanity name'));
$result = $xml->xpath("/data/loc/name[.='".$nloc."']/parent::*");
if ($result) {
   $node = $result[0];
   $lname = $node->name;
   $lvan = $node->vanity;
} else {
   echo "<p>Error";
}
echo '<p>Name: ' . $hname;
echo '<p>Level: ' . $hlev;
echo '<p>XP: ' . $hxp . '/' . $htnl;
echo '<p>Location: ' . $lvan;
echo '<p>Energy: ' . $hce . '/' . $hme;
echo '<p>AP: ' . $hap;
echo '<p>Stats:';
echo '<p>HP: ' . $hhp;
echo '<p>Att: ' . $hatt;
echo '<p>Def: ' . $hdef;
echo '<p>Spe: ' . $hspe;
echo '<p>Int: ' . $hint;
echo '<p>Wis: ' . $hwis;
