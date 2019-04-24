#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
$output = [];
exec("w", $output);
foreach (array_slice($output, 2) as $line)
{
	$matches = [];
	preg_match_all('/([a-zA-Z0-9:-]*)[[:blank:]]*/', $line, $matches);
	$d = DateTime::createFromFormat("H:i", $matches[1][3]);
	echo $matches[1][0] ." ". ($matches[1][1] != "console" ? ("tty". $matches[1][1]) : $matches[1][1]) ."  ". $d->format("M d H:i"). "\n";
}
