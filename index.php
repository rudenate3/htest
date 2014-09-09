<!doctype html>
<head>
<title>Test</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php 
$page = 'index.php';
require 'includes/errhand.inc.php';
if ((include 'includes/updateenergy.inc.php') !== 1)
{
	error(date(DATE_RFC822),$page,__LINE__,'Error loading updateenergy.inc.php');
}
updateen();
 ?>
<div id=header></div>
<div id=navbar>
<?php 
if ((include 'includes/navbar.inc.php') !== 1)
{
	error(date(DATE_RFC822),$page,__LINE__,'Error including navbar.inc.php');
}  
?>
</div>
<div id=main>
<?php 
if (!isset($_REQUEST['content'])){
	if ((include 'includes/main.inc.php') !== 1){
	error(date(DATE_RFC822),$page,__LINE__,'Error including main.inc.php');}
}else{
				
                $content = $_REQUEST['content'];
                $nextpage = "includes/" . $content . ".inc.php";
                if ((include $nextpage) !== 1){
					error(date(DATE_RFC822),$page,__LINE__,'Error including' . $nextpage);
				}
            }



?>
</div>
<div id=hud>

<?php 
updateen();
if ((include 'includes/hud.inc.php') !== 1)
{
	error(date(DATE_RFC822),$page,__LINE__,'Error including hud.inc.php');
} 
?>
</div>
</body>
</html>