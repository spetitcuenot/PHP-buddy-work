#!/usr/bin/php
<?php
if ($argc == 2)
{
	$matches = [];
	$days = ["lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"];
	$months = ["janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre"];
	if (!preg_match('/^([a-zA-Z][a-z]*) (\d{1,2}) ([a-zA-Z][a-z]*) (\d{4}) (\d{2}):(\d{2}):(\d{2})$/', $argv[1], $matches) ||
		!in_array(strtolower($matches[1]), $days) || !in_array(strtolower($matches[3]), $months) ||
		$matches[2] > 31 || $matches[5] > 23 || $matches[6] > 59 || $matches[7] > 59)
	{
		echo "Wrong Format\n";
		return;
	}
	date_default_timezone_set('Europe/Paris');
	$d = DateTime::createFromFormat("d/m/Y H:i:s", $matches[2] ."/". (array_search(strtolower($matches[3]), $months) + 1) ."/". $matches[4] ." ". $matches[5] .":". $matches[6] .":". $matches[7]);
	echo $d->getTimestamp(). "\n";
}
