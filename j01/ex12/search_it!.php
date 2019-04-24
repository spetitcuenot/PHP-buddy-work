#!/usr/bin/php
<?php
if ($argc >= 3)
{
	$find = "";
	$ok = false;
	foreach (array_slice($argv, 2) as $arg)
	{
		$o = explode(":", $arg);
		if ($o[0] == $argv[1])
		{
			$find = $o[1];
			$ok = true;
		}
	}
	if ($ok) echo "$find\n";
}
