<?php
function error($errtime,$erropage,$errline,$errmess){
	$data = simplexml_load_file("xml/errors/errors.xml")
		or die("Error: Cannot create object");
	$error = $data->addChild('error');
	$error->addChild('errtime', $errtime);
	$error->addChild('onpage', $erropage);
	$error->addChild('line', $errline);
	$error->addChild('message', $errmess);
	$data->asXML('xml/errors/errors.xml');
	die('Error: Try again');
}