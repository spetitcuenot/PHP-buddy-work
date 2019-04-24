<?php
function ft_is_sort($arr) {
	$cpy = [];
	foreach ($arr as $e)
		array_push($cpy, $e);
	sort($cpy);
	for ($i = 0; $i < count($arr); $i++)
		if ($cpy[$i] != $arr[$i])
			return false;
	return true;
}
