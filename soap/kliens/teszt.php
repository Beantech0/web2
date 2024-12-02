<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <title>HULLADÉKSZÁLLÍTÁS</title>
  </head>

  <?php

    $options = array(
   
   'keep_alive' => false,
    //'trace' =>true,
    //'connection_timeout' => 5000,
    //'cache_wsdl' => WSDL_CACHE_NONE,
    );
  $client = new SoapClient('http://holybaattila.nhely.hu/soap/szerver/hulladekszallitas.wsdl',$options);
  
  $szolgaltatas = $client->getszolgaltatas();
  echo "<pre>";
  print_r($szolgaltatas);
  echo "</pre>";
  
  $lakig = $client->getlakig('1');
  echo "<pre>";
  print_r($lakig);
  echo "</pre>";

  $naptar = $client->getnaptar('2018-01-30');
  echo "<pre>";
  print_r($naptar);
  echo "</pre>";
  
  ?>
    
  <body>
  </body>
</html>