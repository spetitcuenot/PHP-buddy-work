#!/usr/bin/php
<?php
if ($argc == 2)
{
	$matches = [];
	if (!preg_match('/^([-+]?\d+)(?:\s*)(\+|\*|\%|\/|-)(?:\s*)(\d+)$/', trim($argv[1]), $matches))
	{
		echo "Syntax Error\n";
		return;
	}
	$a = $matches[1];
	$op = $matches[2];
	$b = $matches[3];
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
