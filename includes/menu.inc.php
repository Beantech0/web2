<?php

Class Menu {
    public static $menu = array();
    
    public static function setMenu() {
        self::$menu = array();
        $connection = Database::getConnection();
        $stmt = $connection->query("select url, nev, szulo, jogosultsag from menu where jogosultsag like '".$_SESSION['userlevel']."'order by sorrend");
        while($menuitem = $stmt->fetch(PDO::FETCH_ASSOC)) {
            self::$menu[$menuitem['url']] = array($menuitem['nev'], $menuitem['szulo'], $menuitem['jogosultsag']);
        }
    }

    public static function getMenu($sItems) {
        $menu = "<ul class='nav nav-pills mb-3'>"; // Bootstrap osztályok hozzáadása
        
        foreach (self::$menu as $menuindex => $menuitem) {
            if ($menuitem[1] == "") {
                // Ha van almenü, akkor dropdown menüvé alakítjuk
                $hasSubmenu = false;
                $submenu = "";
                
                foreach (self::$menu as $subindex => $subitem) {
                    if ($subitem[1] == $menuindex) {
                        $hasSubmenu = true;
                        $submenu .= "<li><a class='dropdown-item " . ($subindex == $sItems[1] ? "active" : "") . "' href='" . SITE_ROOT . $menuindex . "/" . $subindex . "'>
                                        " . $subitem[0] . "
                                     </a></li>";
                    }
                }
                
                if ($hasSubmenu) {
                    // Dropdown menü létrehozása
                    $menu .= "<li class='nav-item dropdown'>
                                <a class='nav-link dropdown-toggle " . ($menuindex == $sItems[0] ? "active" : "") . "' href='#' id='navbarDropdown" . $menuindex . "' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                    " . $menuitem[0] . "
                                </a>
                                <ul class='dropdown-menu' aria-labelledby='navbarDropdown" . $menuindex . "'>
                                    " . $submenu . "
                                </ul>
                              </li>";
                } else {
                    // Főmenü elem, amelynek nincs almenüje
                    $menu .= "<li class='nav-item'>
                                <a class='nav-link " . ($menuindex == $sItems[0] ? "active" : "") . "' href='" . SITE_ROOT . $menuindex . "'>
                                    " . $menuitem[0] . "
                                </a>
                              </li>";
                }
            }
        }
        $menu .= "</ul>";
    
        return $menu;
    }
    

}

Menu::setMenu();
?>
