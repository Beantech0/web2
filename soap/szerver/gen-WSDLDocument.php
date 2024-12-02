<?php
	//error_reporting(0);
	require 'hulladekszallitas.php';
	require 'WSDLDocument/WSDLDocument.php';
	$wsdl = new WSDLDocument('Hulladekszallitas', "http://localhost/web2/soap/szerver/szerver.php", "http://localhost/web2/soap/szerver/");
	$wsdl->formatOutput = true;
	$wsdlfile = $wsdl->saveXML();
	echo $wsdlfile;
	file_put_contents ("hulladekszallitas.wsdl" , $wsdlfile);
?>
