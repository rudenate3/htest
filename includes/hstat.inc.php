<?php
$page = 'hstat.inc.php';
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