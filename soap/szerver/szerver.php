<?php

	require("hulladekszallitas.php");

	$server = new SoapServer("hulladekszallitas.wsdl");
	$server->setClass('Hulladekszallitas');
	$server->handle();
    
?>