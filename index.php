<?php

namespace Coffee;

require __DIR__ . '/vendor/autoload.php';

try {
	$map = new Map([
		[0, 1, 0, 1],
		[1, 0, 0, 0],
		[0, 0, 0, 1],
		[0, 0, 0, 1]
	]);

//	$table = new Table();

	var_dump($map->describedByArray());
}
catch (\Exception $e) {
	echo 'Caught exception: ' . $e->getMessage() . "\n";
}
