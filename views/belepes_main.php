<h2>Belépés</h2>
<form action="<?= SITE_ROOT ?>beleptet" method="post">
    <label for="login">Felhasználó:</label><input type="text" name="login" id="login"><br>
    <label for="password">Jelszó:</label><input type="password" name="password" id="password" required pattern="[\-\.a-zA-Z0-9_]{4}[\-\.a-zA-Z0-9_]+"><br>
    <input type="submit" class="btn btn-primary" value="Küldés">
</form>
<h2><br><?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?><br></h2>
