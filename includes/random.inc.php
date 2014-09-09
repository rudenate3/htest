<?php
$page = 'random.inc.php';
if ((include 'includes/hstat.inc.php') !== 1)
{
	error(date(DATE_RFC822),$page,__LINE__,'Error including hstat.inc.php');
}
if($hce == 0 or $hce < 3){
echo 'Not enough energy';
}else{
$data = simplexml_load_file('xml/heroes/hero.xml')
		or die(error(date(DATE_RFC822),$page,__LINE__,'Error loading hero.xml for energy'));
$hce = $hce -3;
$ac = time();
$data->hes->he->lastac = $ac;
$data->hes->he->curen = $hce;
$data->asXML('xml/heroes/hero.xml') 
		or die(error(date(DATE_RFC822),$page,__LINE__,'Error writing to hero.xml for energy'));
if ((include 'includes/vstat.inc.php') !== 1)
{
	error(date(DATE_RFC822),$page,__LINE__,'Error including vstat.inc.php');
}
while( 0 < $vhp or 0 < $hhp ) 
{
$vrand = rand(0,5);
$vdam = $vatt * $vrand;
$hhp = $hhp - $vdam;
$hrand = rand(0,5);
$hdam = $hatt * $hrand;
$vhp = $vhp - $hdam;
if ($vhp > 0) {
	if ($hrand == 5) {
	//echo "<div id=hero class=crit><p><b>" . $hname . " scored a critical hit!</b></div>";
	}
//echo "<div id=hero><p>" . $hname . " attacked for " . $hdam . ", " . $vname ." has ". $vhp . " left <p></div>";
 } else {
 echo "<div id=winner><p> You Won!</div>";
 $nhxp = $hxp + $vxp;
 updateen();
 if ($nhxp > $htnl or $nhxp == $htnl) {
	$hlev = $hlev + 1;
	$hap = $hap + 3;
	$nhce = $hme;
	echo '<p>' . $hname . " Leveled up!";
	echo '<p><a href="index.php?content=random">Again</a>';
	$nhxp = $nhxp - $htnl;
	$nhtnl = $htnl * 1.2;
	$data = simplexml_load_file('xml/heroes/hero.xml')
		or die(error(date(DATE_RFC822),$page,__LINE__,'Error opening hero.xml after level up'));
	$data->hes->he->lev = $hlev;
	$data->hes->he->xp = $nhxp;
	$data->hes->he->tnl = round($nhtnl,0);
	$data->hes->he->ap = $hap;
	$data->hes->he->curen = $nhce;
	$data->asXML('xml/heroes/hero.xml') 
		or die(error(date(DATE_RFC822),$page,__LINE__,'Error writing to hero.xml after level up'));
	break;
 }
echo '<p><a href="index.php?content=random">Again</a>';
$data = simplexml_load_file('xml/heroes/hero.xml')
	or die(error(date(DATE_RFC822),$page,__LINE__,'Error loading hero.xml to update XP'));
$data->hes->he->xp = $nhxp;
$data->asXML('xml/heroes/hero.xml')
	or die(error(date(DATE_RFC822),$page,__LINE__,'Error writing to hero.xml to update XP'));
 break;
 }
if ($hhp > 0) {
if ($vrand == 5) {
	//echo "<div id=vill class=crit><p><b>" . $vname . " scored a critical hit!</b></div>";
	}
//echo "<div id=vill><p>" . $vname . " attacked for " . $vdam . ", " . $hname . " has ". $hhp . " left <p></div>";
 } else {
 echo "<div id=winner><p>You lost</div>";
 updateen();
 echo '<p><a href="index.php?content=random">Again</a>';
 break;
		}
		}
}
?>