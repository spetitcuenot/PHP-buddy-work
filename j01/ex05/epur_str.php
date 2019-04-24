#!/usr/bin/php
<?php
if ($argc == 2)
{
	echo array_reduce(str_split(trim($argv[1], " ")), function ($prev, $curr) {
		return substr($prev, -1) == ' ' && $curr == ' ' ? $prev : $prev . $curr;
	}) . "\n";
}
