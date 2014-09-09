<?php
$page = 'errorview.inc.php';
$data = simplexml_load_file("xml/errors/errors.xml")
	       or die(error(date(DATE_RFC822),$page,__LINE__,'Error loading errors.xml'));
echo '<table border="1"><tr><th>Time</th><th>On Page</th><th>Line</th><th>Message</th>';	   
$i = 0;
		foreach($data->children() as $error){
		$i++;
		if ($i %2 == 0){
		echo '<tr bgcolor="#dcdcdc">';
		}else{
		echo '<tr>';
		}
	      $errtime = $error->errtime;
		  $erropage = $error->onpage;
		  $errline = $error->line;
		  $errmess = $error->message;
		  echo '<td>' . $errtime . '<td>' .  $erropage . '<td>' .  $errline . '<td>' .  $errmess . '</tr>';
		  
	    }
echo '</table>';