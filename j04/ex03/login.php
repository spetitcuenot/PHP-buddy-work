<?php
include "auth.php";

if (isset($_GET) && isset($_GET['login']) && isset($_GET['passwd']))
{
	session_start();
	if (auth($_GET['login'], $_GET['passwd']))
	{
		$_SESSION['loggued_on_user'] = $_GET['login'];
		echo "OK\n";
		return;
	}
	$_SESSION['loggued_on_user'] = '';
}
echo "ERROR\n";
