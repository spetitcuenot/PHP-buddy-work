<?php
if (isset($_GET['action']) && isset($_GET['name']))
{
	switch (strtolower($_GET['action']))
	{
		case "get":
			foreach ($_COOKIE as $k => $v)
				if ($k == $_GET['name'])
					echo "$v\n";
			break;
		case "set":
			setcookie($_GET['name'], $_GET['value']);
			break;
		case "del":
			setcookie($_GET['name'], "", time() - 1);
			break;
	}
}
