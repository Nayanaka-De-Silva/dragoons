<?php

namespace Components\Race\SubRace;

use Components\Proficiencies\Proficiencies;
use Components\Race\SubRace\SubRace;


require_once(__DIR__ . '/../../../../vendor/autoload.php');

class MountainDwarf extends SubRace{
  // Default properties
	public function loadSubRaceProficiencies(Proficiencies &$proficiencyObject, array $params) {
		$proficiencyObject->addArmorProficiency('Light Armor', 'Dwarven Armor Training');
		$proficiencyObject->addArmorProficiency('Medium Armor', 'Dwarven Armor Training');
	}

	public function loadSubRaceTraits(array &$traits) {
		// Do Nothing lmao

	}
}