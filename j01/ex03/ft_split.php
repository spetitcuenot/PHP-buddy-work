<?php
function ft_split($str) {
	$arr = explode(" ", array_reduce(str_split(trim($str, " ")), function ($prev, $curr) {
		return substr($prev, -1) == ' ' && $curr == ' ' ? $prev : $prev . $curr;
	}));
	sort($arr);
	return $arr;
}
