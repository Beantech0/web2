<?php
	//error_reporting(0);
	require 'hulladekszallitas.php';
	require 'WSDLDocument/WSDLDocument.php';
	$wsdl = new WSDLDocument('Hulladekszallitas', "http://holybaattila.nhely.hu/soap/szerver/szerver.php", "http://holybaattila.nhely.hu/soap/szerver/");
	$wsdl->formatOutput = true;
	$wsdlfile = $wsdl->saveXML();
	echo $wsdlfile;
	file_put_contents ("hulladekszallitas.wsdl" , $wsdlfile);
?>
