#!/usr/bin/php
<?php
$args = [];
foreach (array_slice($argv, 1) as $arg)
{
	$args = array_merge($args, explode(" ", array_reduce(str_split(trim($arg, " ")), function ($prev, $curr) {
		return substr($prev, -1) == ' ' && $curr == ' ' ? $prev : $prev . $curr;
	})));
}
usort($args, function ($a, $b) {
	$a = strtolower($a);
	$b = strtolower($b);
	$alpha = str_split("abcdefghijklmnopqrstuvwxyz0123456789");
	for ($i = 0; $i < strlen($a) && $i < strlen($b); $i++)
	{
		if ($a[$i] == $b[$i])
			continue ;
		if (in_array($a[$i], $alpha) && !in_array($b[$i], $alpha))
			return (-1);
		if (!in_array($a[$i], $alpha) && in_array($b[$i], $alpha))
			return (1);
		return (array_search($a[$i], $alpha) < array_search($b[$i], $alpha) ? -1 : 1);
	}
	if (strlen($a) > strlen($b))
		return (1);
	if (strlen($a) < strlen($b))
		return (-1);
	return (0);
});
foreach ($args as $arg)
	echo "$arg\n";
