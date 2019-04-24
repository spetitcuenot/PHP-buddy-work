#!/usr/bin/php
<?php
if ($argc == 3)
{
	$type = ["nom", "prenom", "mail", "IP", "pseudo"];
	if (!in_array(strtolower($argv[2]), $type)) return;
	$index = array_search(strtolower($argv[2]), $type);
	if (!($content = @file_get_contents($argv[1]))) return;
	$nom = [];
	$prenom = [];
	$mail = [];
	$IP = [];
	$pseudo = [];

	foreach (array_slice(explode("\n", $content), 1) as $line)
	{
		if (!$line[0]) break;
		$data = str_getcsv($line, ";");
		$nom[$data[$index]] = $data[0];
		$prenom[$data[$index]] = $data[1];
		$mail[$data[$index]] = $data[2];
		$IP[$data[$index]] = $data[3];
		$pseudo[$data[$index]] = $data[4];
	}

	while (1)
	{
		echo "Entrez votre commande: ";
		$code = trim(fgets(STDIN));
		if (feof(STDIN)) break;
		eval($code);
	}
}
