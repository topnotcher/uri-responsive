<?php

$str = 'a-b-c-d';

$temp = array();

$path = &$temp;

foreach (explode('-',$str) as $part) {
	if (!isset($path[$part]))
		$path[$part] = array();

	$path = &$path[$part];
}
$path = 'foo';
print_r($temp);

