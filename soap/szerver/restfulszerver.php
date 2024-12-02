<?php
// A szkript ereménye az $eredmeny nevű string.
// lásd végén: echo $eredmeny;
// mind a 4 esetben (GET, POST, PUT, DELETE) ezt készíti el
$sql = "";
$eredmeny = "";
try {

    $dbh = new PDO('mysql:host=localhost;dbname=forgalomSOAP','root', '',
    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

    switch($_SERVER['REQUEST_METHOD']) {
        case "GET":
            $sql = "SELECT * FROM megnevezes";
            $sth = $dbh->query($sql);
            $eredmeny .= "<table style=\"border-collapse: collapse;\"><tr><th>ID</th><th>Megnevezés</th></tr>";
            while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                $eredmeny .= "<tr>";
                foreach($row as $column)
                $eredmeny .= "<td style=\"border: 1px solid black; padding: 3px;\">".$column."</td>";
                $eredmeny .= "</tr>";
            }
            $eredmeny .= "</table>";
            break;
        case "POST":
            $sql = "INSERT INTO megnevezes (nev) VALUES ('" . $_POST['megnevezes'] ."')";
            $sth = $dbh->query($sql);
            $eredmeny = $sth;
            break;
        case "PUT":
            $incoming = file_get_contents("php://input");
            parse_str($incoming, $data);
            $sql = "UPDATE megnevezes SET nev =\"" . $data['megnevezesnev'] ."\" WHERE id=". $data['id'];
            $sth = $dbh->query($sql);
            $eredmeny = $sth;
            break;
        case "DELETE":
                $incoming = file_get_contents("php://input");
                parse_str($incoming, $data);
                $sql = "DELETE FROM megnevezes WHERE id=". $data['id'];
                $sth = $dbh->query($sql);
                $kifele = $data;
                $eredmeny = "HAHAHAH" . $sth;
                break;
    }
}
catch (PDOException $e) {
$eredmeny = $sql . $e->getMessage();
}
echo $eredmeny;
?>