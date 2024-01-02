<?php

namespace Components\Race\SubRace;

use Components\Proficiencies\Proficiencies;

require_once(__DIR__ . '/../../../../vendor/autoload.php');

class HighElf extends SubRace{
  // Default properties
	public function loadSubRaceProficiencies(Proficiencies &$proficiencyObject, array $params) {
		$proficiencyObject->addWeaponProficiency('Longsword', 'Elf Weapon Training');
		$proficiencyObject->addWeaponProficiency('Shortsword', 'Elf Weapon Training');
		$proficiencyObject->addWeaponProficiency('Shortbow', 'Elf Weapon Training');
		$proficiencyObject->addWeaponProficiency('Longbow', 'Elf Weapon Training');

		if ($params['high-elf-language']) {
			$proficiencyObject->addLanguageProficiency($params['high-elf-language'], 'High Elven Extra Language');
		}
	}

	public function loadSubRaceTraits(array &$traits) {
		return null;
	}
}