<?php

namespace Components\Race\SubRace;

require_once(__DIR__ . '/../../../../vendor/autoload.php');

use Components\Proficiencies\Proficiencies;

abstract class SubRace {
  // Default properties
	abstract public function loadSubRaceProficiencies(Proficiencies &$proficiencyObject, array $params);
  abstract public function loadSubRaceTraits(array &$traits);
}