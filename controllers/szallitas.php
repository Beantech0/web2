<?php

include_once(SERVER_ROOT . 'models/szallitas_model.php');

class Szallitas_Controller
{
	public $ctrlName = 'szallitas';
	public function main(array $vars)
	{
		$szallitasModel = new Szallitas_Model;
		$uzenet = $szallitasModel->get_idopont($vars);
		$view = new View_Loader($this->ctrlName."_main");
		$view->assign('uzenet', $uzenet);
	}
}

?>