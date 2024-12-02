<?php

class Regisztracio_Controller
{
	public $baseName = 'regisztracio'; 
	public function main(array $vars)
	{
		$regisztraloModel = new Register_Model;
		$retData = $regisztraloModel->register_user($vars);
		$view = new View_Loader($this->baseName."_main");
		$view->assign('uzenet', $retData['uzenet']);  // A hibaüzenetet átadjuk a nézetne
	}
}

?>