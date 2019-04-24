<?php
session_start();
if (isset($_GET['login']) && isset($_GET['passwd']) && isset($_GET['submit']) && $_GET['submit'] == 'OK')
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
?>
<html><body>
<form method="get" action="index.php">
Identifiant: <input name="login" value="<?= isset($_SESSION['login']) ? $_SESSION['login'] : "" ?>"/>
<br />
Mot de passe: <input name="passwd" value="<?= isset($_SESSION['passwd']) ? $_SESSION['passwd'] : "" ?>"/>
<input type="submit" name="submit" value="OK"/>
</form>
</body></html>
