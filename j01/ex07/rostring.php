#!/usr/bin/php
<?php
if ($argc >= 2)
{
	$args = explode(" ", array_reduce(str_split(trim($argv[1], " ")), function ($prev, $curr) {
		return substr($prev, -1) == ' ' && $curr == ' ' ? $prev : $prev . $curr;
	}));
	array_push($args, array_shift($args));
	echo implode(" ", $args) ."\n";
}
