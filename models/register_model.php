<?php

class Register_Model
{
    public function register_user($vars)
    {
        $retData = ['eredmeny' => "", 'uzenet' => ""];

        if (empty($vars['lastname']) || empty($vars['password']) || empty($vars['firstname']) || empty($vars['username'])) {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Minden mező kitöltése kötelező!";
            return $retData;
        }
        try {
            $connection = Database::getConnection();
            // Ellenőrizzük, hogy a felhasználói név már létezik-e
            $sql = "SELECT COUNT(*) FROM felhasznalok WHERE bejelentkezes = :login";
            $stmt = $connection->prepare($sql);
            $stmt->execute([':login' => $vars['username']]);
            $userCount = $stmt->fetchColumn();

            if ($userCount > 0) {
                $retData['eredmeny'] = "ERROR";
                $retData['uzenet'] = "A felhasználói név már foglalt!";
                return $retData;
            }

            // Új felhasználó mentése az adatbázisba
            $sql = "INSERT INTO felhasznalok (bejelentkezes, jelszo, csaladi_nev, utonev, jogosultsag) 
                    VALUES (:login, :password, :csaladi_nev, :utonev, :jogosultsag)";
            $stmt = $connection->prepare($sql);
            $stmt->execute([
                ':login' => $vars['username'],
                ':password' => sha1($vars['password']),
                ':csaladi_nev' => $vars['firstname'],
                ':utonev' => $vars['lastname'],
                ':jogosultsag' => $vars['role']
            ]);

            $retData['eredmeny'] = "OK";
            $retData['uzenet'] = "Sikeres regisztráció! Most bejelentkezhet.";
        } catch (PDOException $e) {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: " . $e->getMessage() . "!";
        }

        return $retData;
    }
}
?>
