<?php
$page = 'dolevelup.inc.php';
$data = simplexml_load_file("xml/heroes/hero.xml")
	       or die(error(date(DATE_RFC822),$page,__LINE__,'Error loading hero.xml for current stats'));
		   
		foreach($data->children() as $hes){
	    foreach($hes->children() as $he => $hero){
	      $hname = $hero->name;
		  $hlev = $hero->lev;
	      $hatt = $hero->att;
	      $hhp = $hero->hp;
		  $hxp = $hero->xp;
		  $hap = $hero->ap;
		  }}
if (($_REQUEST['hhp'] + $_REQUEST['hatt']) > $hap){
echo 'You selected too much, try again';
break;
}
$hap = $hap - ($_REQUEST['hhp'] + $_REQUEST['hatt']);
$hatt = $hatt + $_REQUEST['hatt'];
$hhp = $hhp + ($_REQUEST['hhp']*10);
$data = simplexml_load_file('xml/heroes/hero.xml')
		or die(error(date(DATE_RFC822),$page,__LINE__,'Error loading hero.xml to update stats'));
	$data->hes->he->ap = $hap;
	$data->hes->he->hp = $hhp;
	$data->hes->he->att = $hatt;
	$data->asXML('xml/heroes/hero.xml') 
		or die(error(date(DATE_RFC822),$page,__LINE__,'Error writing to hero.xml for updated stats'));
echo 'Points distributed';

