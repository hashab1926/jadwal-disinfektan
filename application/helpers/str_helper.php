<?php
if (!function_exists('str_contains')) {
function str_contains($string,$contains){
	if (strpos($string, $contains) !== false)
		return true;

	return false;
}
}
