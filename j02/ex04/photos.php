#!/usr/bin/php
<?php
if ($argc == 2)
{
	$content = file_get_contents($argv[1]);
	$matches = [];
	$domain = parse_url($argv[1])["host"];
	@mkdir($domain);
	preg_match_all('/<[[:blank:]]*img.*?[[:blank:]]*src=[\'"](.*?)[\'"](.*?)>/m', $content, $matches, PREG_SET_ORDER, 0);
	foreach ($matches as $match)
	{
		if ($match[1][0] == '/')
			file_put_contents($domain ."/". basename($match[1]), file_get_contents(parse_url($argv[1])["scheme"] ."://". $domain . $match[1]));
		else if (substr($match[1], 0, 4) == "http")
			file_put_contents($domain ."/". basename($match[1]), file_get_contents($match[1]));
	}
}
