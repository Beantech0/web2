<?php

class Szallitas_Model
{	
	public function get_idopont($vars)
	{

	    $client = new SoapClient('http://localhost/web2/soap/szerver/hulladekszallitas.wsdl');
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