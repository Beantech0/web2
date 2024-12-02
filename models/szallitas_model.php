<?php

class Szallitas_Model
{	
	public function get_idopont($vars)
	{
        $options = array(
   
            'keep_alive' => false,
             //'trace' =>true,
             //'connection_timeout' => 5000,
             //'cache_wsdl' => WSDL_CACHE_NONE,
            );
	    $client = new SoapClient('http://localhost/web2/soap/szerver/hulladekszallitas.wsdl', $options);
        $szolgaltatas = $client->getszolgaltatas();
        $_SESSION['szolgaltatas'] = $szolgaltatas;
  
        if(isset($_POST['szolgaltatas']) && trim($_POST['szolgaltatas']) != "")
        {
            $lakig = $client->getlakig($_POST['szolgaltatas']);
            $_SESSION['lakig'] = $lakig;
        }

        if(isset($_POST['lakig']) && trim($_POST['lakig']) != "")
        {
            $naptar = $client->getnaptar($_POST['lakig']);
            $_SESSION['naptar'] = $naptar;
        }
        
	}  
}

?>