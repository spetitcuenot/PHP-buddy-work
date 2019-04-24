#!/usr/bin/php
<?php
$args = [];
foreach (array_slice($argv, 1) as $arg)
{
	$args = array_merge($args, explode(" ", array_reduce(str_split(trim($arg, " ")), function ($prev, $curr) {
		return substr($prev, -1) == ' ' && $curr == ' ' ? $prev : $prev . $curr;
	})));
}
sort($args);
foreach ($args as $arg)
	echo "$arg\n";
