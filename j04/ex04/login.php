<?php
include "auth.php";

if (isset($_POST) && isset($_POST['login']) && isset($_POST['passwd']))
{
	session_start();
	if (auth($_POST['login'], $_POST['passwd']))
	{
		$_SESSION['loggued_on_user'] = $_POST['login'];
?>
<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
<?php
		return;
	}
	$_SESSION['loggued_on_user'] = '';
}
echo "ERROR\n";
