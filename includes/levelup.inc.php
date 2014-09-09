<?php
$page = 'levelup.inc.php';
$data = simplexml_load_file("xml/heroes/hero.xml")
	       or die(error(date(DATE_RFC822),$page,__LINE__,'Error loading hero.xml for stats'));
		   
		foreach($data->children() as $hes){
	    foreach($hes->children() as $he => $hero){
	      $hname = $hero->name;
		  $hlev = $hero->lev;
	      $hatt = $hero->att;
	      $hhp = $hero->hp;
		  $hxp = $hero->xp;
		  $hap = $hero->ap;
		  }
		  }
echo '<p>Choose your upgrades<p>';
echo '<form action="index.php?content=dolevelup" method="post">';
echo '<p>HP: <select name="hhp">';
	  $i = 0;
	  while ($i < $hap or $i == $hap){
	  echo '<option value="' . $i . '">' . $i . '</option>';
	  $i++;
	  }
echo '</select>';
echo '+10';
echo '<p>ATT: <select name="hatt">';
	  $i = 0;
	  while ($i < $hap or $i == $hap){
	  echo '<option value="' . $i . '">' . $i . '</option>';
	  $i++;
	  }
echo '</select>';
echo '+1';
echo '<p><input type="submit">';
