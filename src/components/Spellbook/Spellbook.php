<?php

namespace Components\Spellbook;

require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Spell\Spell;

class Spellbook {
	private array $spellList;

	public function __construct() {
		$spellArray = $this->importSpellsFromJSON();
		$this->spellList = $this->loadSpellsFromSpellArray($spellArray);
	}

	public function searchSpellByName($spellName) {
		return $this->spellList[$spellName] ?? "Spell not found in Spell List.";
	}

	// -----------------------------------------------------------------

	private function importSpellsFromJSON() : array {
    $jsonString = file_get_contents(__DIR__ . '/spells.json');

    $spellData = json_decode($jsonString, true);
  
    return $spellData;
  }

	private function loadSpellsFromSpellArray(array $spellArray) : array {
		$spellList = array();
		foreach($spellArray as $spellData) {
			$spell = $this->convertSpellDataIntoSpellObject($spellData);
			$spellList[$spell->getName()] = $spell;
		}
		return $spellList;
	}

	private function convertSpellDataIntoSpellObject($spellArray) : Spell {
		return new Spell($spellArray);
	}
}