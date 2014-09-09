<?php
$page = 'bstat.inc.php';
$data = simplexml_load_file("xml/heroes/hero.xml")
	       or die(error(date(DATE_RFC822),$page,__LINE__,'Error loading hero.xml for location boss'));
$hloc = $data->hes->he->location;
$data = simplexml_load_file("xml/villians/bosses/" . $hloc . "_bos.xml")
	       or die(error(date(DATE_RFC822),$page,__LINE__,'Error loading' . $hloc . '_bos.xml'));
$vname = $data->boss->name;
$vatt = $data->boss->att;
$vhp = $data->boss->hp;
$vxp = $data->boss->xp;