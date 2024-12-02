

<?php
$url = "http://localhost/web2/rest_api/szerver.php";
$result = "";
if(isset($_POST['id']))
{
  // Felesleges szóközök eldobása
  $_POST['uj'] = trim($_POST['uj']);
  $_POST['id'] = trim($_POST['id']);
  $_POST['tipus'] = trim($_POST['tipus']);
  $_POST['jelentes'] = trim($_POST['jelentes']);
  
  // Ha nincs id és megadtak minden adatot (családi név, utónév, bejelentkezési név, jelszó), akkor beszúrás
  if($_POST['uj'] == true && $_POST['tipus'] != "" && $_POST['jelentes'] != "")
  {
      $data = Array("id" => $_POST["id"], "tipus" => $_POST["tipus"], "jelentes" => $_POST["jelentes"]);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);
  }
  
  // Ha nincs id de nem adtak meg minden adatot
  elseif($_POST['id'] == "")
  {
    $result = "Hiba: Hiányos adatok!";
  }
  
  // Ha van id, amely >= 1, és megadták legalább az egyik adatot (családi név, utónév, bejelentkezési név, jelszó), akkor módosítás
  elseif($_POST['id'] >= 1 && ($_POST['tipus'] != "" || $_POST['jelentes']))
  {
      $data = Array("id" => $_POST["id"], "tipus" => $_POST["tipus"], "jelentes" => $_POST["jelentes"]);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);
  }
  // Ha van id, amely >=1, de nem adtak meg legalább az egyik adatot
  elseif($_POST['id'] >= 1)
  {
      $data = Array("id" => $_POST["id"]);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);
  }
  
  // Ha van id, de rossz az id, akkor a hiba kiírása
  else
  {
    echo "Hiba: Rossz azonosító (Id): ".$_POST['id']."<br>";
  }
}
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$tabla = curl_exec($ch);
curl_close($ch);
?>

  <?= $result ?>
    <h2>Szolgáltatások:</h2>
    <?= $tabla ?>
    <br>
    <h2>Módosítás / Beszúrás / Törlés</h2>
    <form method="post">
    Új hozzáadása? <input type="checkbox" name="uj"><br><br>
    Id: <input type="text" class="form-control" name="id"><br><br>
    Típus: <input type="text" class="form-control"name="tipus" maxlength="45"><br><br>
    Jelentés: <input type="text" class="form-control" name="jelentes" maxlength="12"> <br><br>
    <input type="submit" class="form-control btn btn-primary" value = "Küldés">
    </form>