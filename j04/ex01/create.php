<?php
if (isset($_POST) && isset($_POST['login']) && isset($_POST['passwd']) && !empty($_POST['passwd'])
	&& isset($_POST['submit']) && $_POST['submit'] == 'OK')
{
	@mkdir('/private');
	$data = file_exists('/private/passwd') ? unserialize(file_get_contents('/private/passwd')) : [];
	foreach ($data as $i => $v)
	{
		if ($v['login'] == $_POST['login'])
		{
			echo "ERROR\n";
			return;
		}
	}
	array_push($data, [
		'login' => $_POST['login'],
		'passwd' => hash('sha256', $_POST['passwd'])
	]);
	file_put_contents('/private/passwd', serialize($data));
	echo "OK\n";
}
else
	echo "ERROR\n";
