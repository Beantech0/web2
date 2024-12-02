  <?php
     $options = array(
   
   'keep_alive' => false,
    //'trace' =>true,
    //'connection_timeout' => 5000,
    'cache_wsdl' => WSDL_CACHE_NONE,
   );
  $client = new SoapClient('http://localhost/web2/soap/szerver/hulladekszallitas.wsdl',$options);
  
  $markak = $client->getszolgaltatas();

  echo "<pre>";
  print_r($markak);
  echo "</pre>";

  ?>