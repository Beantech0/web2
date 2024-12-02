<h1><span>Restful Kliens - Megnevezések tábla</span></h1>

<fieldset id="keresesform">
<legend>Új hozzáadása:</legend>
<table>
<form action=# method=post>
  <tr>
    <td>Megnevezés:</td>
    <td><input type=text name=megnevezesnev></td>
  </tr>
  <tr>
    <td colspan=2><input type=submit name=hozzaadgomb value="Hozzáadás" style="width:100%"></td>
  </tr>
</form>
</table>
</fieldset>

<fieldset id="keresesform">
<legend>Meglévő módosítása:</legend>
<table>
<form action=# method=post>
  <tr>
    <td>ID:</td>
    <td><input type=number min=1 max=99999 step=1 name=id value=1 style="width:100%"></td>
  </tr>
  <tr>
    <td>Megnevezés:</td>
    <td><input type=text name=megnevezesnev></td>
  </tr>
  <tr>
    <td colspan=2><input type=submit name=modositgomb value="Módosítás" style="width:100%"></td>
  </tr>
</form>
</table>
</fieldset>

<fieldset id="keresesform">
<legend>Meglévő törlése:</legend>
<table>
<form action=# method=post>
  <tr>
    <td>ID:</td>
    <td><input type=number min=1 max=99999 step=1 name=id value=1 style="width:100%"></td>
  </tr>
  <tr>
    <td colspan=2><input type=submit name=torlesgomb value="Törlés" style="width:100%"></td>
  </tr>
</form>
</table>
</fieldset>

<?php


$url = "http://localhost/web2/szerver/restfulszerver.php";

if(isset($_POST['hozzaadgomb']))
{
  $post = [
    'megnevezes' => $_POST['megnevezesnev'],
  ];

  $ch = curl_init(); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  $result = curl_exec($ch);
  echo $result; 
}




if(isset($_POST['modositgomb']))
{
  $post = [
    'id' => $_POST['id'],
    'megnevezes' => $_POST['megnevezesnev'],
  ];

  $data = Array("id" => $_POST["id"], "megnevezesnev" => $_POST["megnevezesnev"]);

  $ch = curl_init(); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
  $result = curl_exec($ch);
  echo $result; 
}
if(isset($_POST['torlesgomb']))
{
  $post = [
    'id' => $_POST['id'],
  ];

  $data = Array("id" => $_POST["id"]);

  $ch = curl_init(); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
  $result = curl_exec($ch);
  echo $result; 
}

 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
$result = curl_exec($ch);
echo $result; 

?>