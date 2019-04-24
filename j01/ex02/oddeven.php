#!/usr/bin/php
<?php
while (1)
{
	echo "Entrez un nombre: ";
	$number = trim(fgets(STDIN));
	if (feof(STDIN))
		break ;
	if (is_numeric($number))
		echo "Le chiffre ". $number ." est ". ($number % 2 ? 'Impair' : 'Pair') ."\n";
	else
		echo "'$number' n'est pas un chiffre\n";
}
