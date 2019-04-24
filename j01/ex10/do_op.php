#!/usr/bin/php
<?php
if ($argc == 4)
{
	$a = trim($argv[1]);
	$op = strtolower(trim($argv[2]));
	$b = trim($argv[3]);
	switch ($op) {
		case "+":
			echo ($a + $b)."\n";
			break;
		case "-":
			echo ($a - $b)."\n";
			break;
		case "*":
			echo ($a * $b)."\n";
			break;
		case "/":
			echo ($a / $b)."\n";
			break;
		case "%":
			echo ($a % $b)."\n";
			break;
	}
}
else
	echo "Incorrect Parameters\n";
