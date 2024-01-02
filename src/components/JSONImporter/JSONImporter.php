<?php

namespace Components\JSONImporter;

use InvalidArgumentException;

require_once(__DIR__ . '/../../../vendor/autoload.php');

/**
 * JSONImporter
 * 
 * Meant to import a jsonfile and return it in whatever format you want.
 * For now it has:
 * 1. Arrays
 */
class JSONImporter {

	public static function importFromJSON(string $jsonFilePath) {
		if (!JSONImporter::checkIfFilePathIsValid($jsonFilePath))
			throw new InvalidArgumentException("Cannot Find spells.json file in local directory. Current Path: ".$jsonFilePath);
		
		$jsonString = file_get_contents($jsonFilePath);
		
		$data = json_decode($jsonString, true);

		return $data;
	}

	public static function checkIfFilePathIsValid(string $jsonFilePath) {
		return file_exists($jsonFilePath);
	}
}