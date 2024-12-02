<?php

class Mnbsoap_Controller
{
	public $baseName = 'mnbsoap';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$view = new View_Loader($this->baseName."_main");
	}
}

?>