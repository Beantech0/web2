<?php

class Register_Controller
{
    public $baseName = 'register';  // Meghatározzuk, hogy melyik oldalon vagyunk

    public function main(array $vars) // A router által továbbított paramétereket kapja
    {
        // Ha POST adatot kapunk, elindítjuk a regisztrációs folyamatot
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $regisztraloModel = new Register_Model;  // A modell, ami kezeli a regisztrációt
            $retData = $regisztraloModel->register_user($vars);  // Regisztrációs adatokat mentjük el
            // Ha sikeres a regisztráció
            if ($retData['eredmeny'] == "OK") {
                // A regisztráció sikeres volt, átirányíthatunk a bejelentkezéshez
                echo $retData['uzenet'];
                $view = new View_Loader($this->baseName . '_main');
                $view->assign('uzenet', $retData['uzenet']);  // A hibaüzenetet átadjuk a nézetnek
            } else {
                // Ha hiba történt, megjelenítjük az üzenetet
                $view = new View_Loader($this->baseName . '_main');
                $view->assign('uzenet', $retData['uzenet']);  // A hibaüzenetet átadjuk a nézetnek
            }
        } else {
            // Ha nem POST kérés érkezett, csak a regisztrációs formot jelenítjük meg
            $view = new View_Loader($this->baseName . '_main');
        }
    }
}
?>
