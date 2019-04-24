<?php
function auth($login, $passwd)
{
	@mkdir('/private');
	$data = file_exists('/private/passwd') ? unserialize(file_get_contents('/private/passwd')) : [];
	foreach ($data as $i => $v)
		if ($v['login'] == $login)
			return $v['passwd'] == hash('sha256', $passwd);
	return false;
}
