<?php

namespace Components\Spellbook;

require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Spell\Spell;
use Components\JSONImporter\JSONImporter;
use Exception;

class Spellbook {
	private array $spellList;
	private string $spellPath = __DIR__.'/spells.json';

	public function __construct() {
		$spellArray = JSONImporter::importFromJSON($this->spellPath);
		$this->spellList = $this->loadSpellsFromSpellArray($spellArray);
	}

	/**
	 * Retrieves the list of spells.
	 * 
	 * For now, it returns a list of spells as Spell Objects
	 * It is up to the user of the component to decide how to use the list.
	 *
	 * @return array An array containing the list of spells.
	 */
	public function getSpellList() : array {
		return $this->spellList;
	}

	public function searchSpellByName($spellName) {
		return $this->spellList[$spellName] ?? "Spell not found in Spell List.";
	}

	// -----------------------------------------------------------------

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