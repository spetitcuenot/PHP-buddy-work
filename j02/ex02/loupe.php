#!/usr/bin/php
<?php
function callback_content($matches) {
	return str_replace($matches[1], strtoupper($matches[1]), $matches[0]);
}

function callback_title($matches) {
	return "title=". $matches[1] . strtoupper($matches[2]) . $matches[3];
}

function callback_a($matches) {
	$matches[0] = preg_replace_callback('/title=("|\')(.*?)("|\')/im', callback_title, $matches[0]);
	$matches[0] = preg_replace_callback('/.*?<.*?>((?:.|\n)*?)(?:<.*?>|\0)/im', callback_content, $matches[0]);
	$matches[0] = preg_replace_callback('/(.*?)(?:<.*?>|<\/.*?>)/im', callback_content, $matches[0]);
	return $matches[0];
}

if ($argc == 2)
{
	if (!file_exists($argv[1]))
		return;
	$content = file_get_contents($argv[1]);
	$content = preg_replace_callback('/<[[:blank:]]*a.*>(.|\n)*?<\/[[:blank:]]*a>/im', callback_a, $content);
	echo $content;
}
