<?php
$page = 'updateenergy.inc.php';
function updateen(){
$data = simplexml_load_file('xml/heroes/hero.xml')
		or die(error(date(DATE_RFC822),$page,__LINE__,'Error loading hero.xml for energy update'));
$hme = (int)$data->hes->he->maxen;		
$hce = (int)$data->hes->he->curen;
$hac = $data->hes->he->lastac;
$current = time();
$adden = floor((($current - $hac)/60));
$subti = (($current - $hac)%60);
$hce = $hce + $adden;
$ntime = $current - $subti;
$data->hes->he->curen = $hce;
$data->hes->he->lastac = $ntime;
$data->asXML('xml/heroes/hero.xml') 
		or die(error(date(DATE_RFC822),$page,__LINE__,'Error writing energy to hero.xml'));
if ($hce > $hme){
$hce = $hme;
$data->hes->he->curen = $hce;
$data->asXML('xml/heroes/hero.xml') 
		or die(error(date(DATE_RFC822),$page,__LINE__,'Error writing to hero.xml for overfilled energy'));
}
}
$page = '';