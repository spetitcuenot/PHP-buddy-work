<?php
if (isset($_POST) && isset($_POST['login']) && isset($_POST['oldpw']) && !empty($_POST['oldpw'])
	&& isset($_POST['newpw']) && !empty($_POST['newpw']) && isset($_POST['submit']) && $_POST['submit'] == 'OK')
{
	@mkdir('/private');
	$data = file_exists('/private/passwd') ? unserialize(file_get_contents('/private/passwd')) : [];
	foreach ($data as $i => $v)
	{
		if ($v['login'] == $_POST['login'])
		{
			if ($v['passwd'] == hash('sha256', $_POST['oldpw']))
			{
				$data[$i]['passwd'] = hash('sha256', $_POST['newpw']);
				file_put_contents('/private/passwd', serialize($data));
				echo "OK\n";
                header('Location: index.html');
                return;
			}
		}
	}
}
echo "ERROR\n";
