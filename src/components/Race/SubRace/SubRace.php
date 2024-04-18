<?php

namespace Components\Race\SubRace;

require_once(__DIR__ . '/../../../../vendor/autoload.php');

use Components\Proficiencies\Proficiencies;

interface SubRace {
  // Default properties
	public function loadSubRaceProficiencies(Proficiencies &$proficiencyObject, array $params);
  public function loadSubRaceTraits(array &$traits);
}