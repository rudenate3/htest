<?php
$page = 'hud.inc.php';
$xml = simplexml_load_file("xml/heroes/hero.xml")
	       or die(error(date(DATE_RFC822),$page,__LINE__,'Error loading hero.xml for HUD stats'));
		   
		foreach($xml->children() as $hes){
	    foreach($hes->children() as $he => $hero){
	      $hname = $hero->name;
		  $hlev = $hero->lev;
	      $hatt = $hero->att;
	      $hhp = $hero->hp;
		  $hxp = $hero->xp;
		  $htnl = $hero->tnl;
		  $hap = $hero->ap;
		  $hme = $hero->maxen;
		  $hce = $hero->curen;
		  }
		  }
$tnl = ($hxp -$htnl) * -1;
echo "<p>Name: " . $hname;
echo "<p>Level: " . $hlev;
echo "<p>Energy: " . $hce . "/" . $hme;
echo "<p>XP: " . $hxp . " TNL: " . $tnl;
	if($hap > 0){
echo '<p><a href="index.php?content=levelup">AP Available</a>';
	}