<?php

$eredmeny = "";
try {
	$dbh = new PDO('mysql:host=localhost;dbname=web2_beadando', 'web2_beadando', 'Laposvas.12',
				  array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
	switch($_SERVER['REQUEST_METHOD']) {
		case "GET":
				$sql = "SELECT * FROM szolgaltatas";     
				$sth = $dbh->query($sql);
				$eredmeny .= "<table class=\"table\" style=\"border-collapse: collapse;\"><tr><th>ID</th><th>tipus</th><th>jelentes</th></tr>";
				while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
					$eredmeny .= "<tr>";
					foreach($row as $column)
						$eredmeny .= "<td style=\"border: 1px solid black; padding: 3px;\">".$column."</td>";
					$eredmeny .= "</tr>";
				}
				$eredmeny .= "</table>";
			break;
		case "POST":
				$incoming = file_get_contents("php://input");
				parse_str($incoming, $data);
				$sql = "insert into szolgaltatas values (:id, :tipus, :jelentes)";
				$sth = $dbh->prepare($sql);
				$count = $sth->execute(Array(":id"=>$data["id"], ":tipus"=>$data["tipus"], ":jelentes"=>$data["jelentes"]));
				//$count = $sth->execute(Array(":csn"=>$_POST["csn"], ":un"=>$_POST["un"], ":bn"=>$_POST["bn"], ":jel"=>$_POST["jel"]));				
				$eredmeny = $count;
			break;
		case "PUT":
				$data = array();
				$incoming = file_get_contents("php://input");
				parse_str($incoming, $data);
				$modositando = "id=id"; $params = Array(":id"=>$data["id"]);
				if($data['tipus'] != "") {$modositando .= ", tipus = :tipus"; $params[":tipus"] = $data["tipus"];}
				if($data['jelentes'] != "") {$modositando .= ", jelentes = :jelentes"; $params[":jelentes"] = $data["jelentes"];}
				$sql = "update szolgaltatas set ".$modositando." where id=:id";
				$sth = $dbh->prepare($sql);
				$count = $sth->execute($params);
				$eredmeny .= $count." módositott sor. Azonosítója:".$data["id"];
			break;
		case "DELETE":
				$data = array();
				$incoming = file_get_contents("php://input");
				parse_str($incoming, $data);
				$sql = "delete from szolgaltatas where id=:id";
				$sth = $dbh->prepare($sql);
				$count = $sth->execute(Array(":id" => $data["id"]));
				$eredmeny .= $count." sor törölve. Azonosítója:".$data["id"];
			break;
	}
}
catch (PDOException $e) {
	$eredmeny = $e->getMessage();
}
echo $eredmeny;

?>