<?php

namespace Coffee;

require __DIR__ . '/vendor/autoload.php';

try {
	$map = new Map([
		[0, 1, 0, 1],
		[1, 0, 0, 0],
		[0, 0, 0, 1],
		[0, 0, 1, 1]
	]);

	$table = new Table($map);

	var_dump($table->getSpots());
//
//	// Foreach cannot be used, we need re-evaluation
////	while (list(, $currentTile) = each($map->getUnVisitedTiles())) {
////	while (($currentTile = $map->getUnvisitedTile()) == true) {
//	while (isset($map->getUnVisitedTiles()[0]) && ($currentTile = $map->getUnVisitedTiles()[0]) == true) {
//		$currentTile->visit();
//
//		if ($currentTile->isRepresentingSpot()) {
//			$spot = new Spot($currentTile->getPosition());
//
//			foreach ($map->getNeighboursOfTile($currentTile) as $neighbouringTile) {
//				$neighbouringTile->visit();
//
//				if ($neighbouringTile->isRepresentingSpot()) {
//					$spot->addPosition($neighbouringTile->getPosition());
//				}
//			}
//
//			$table->addSpot($spot);
//		}
//	}
//
//	var_dump($table);
}
catch (\Exception $e) {
	echo 'Caught exception: ' . $e->getMessage() . "\n";
}
