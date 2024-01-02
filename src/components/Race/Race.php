<?php

namespace Components\Race;


require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Proficiencies\Proficiencies;

abstract class Race {
  // Default properties

  private string $name;

  abstract public function getDefaultAge();
  abstract public function getDefaultWeight();
  abstract public function getDefaultHeight();
  abstract public function getDefaultSize();
  abstract public function getDefaultSpeed();

  abstract public function loadProficiencies(Proficiencies &$proficiencyObject);
  abstract public function loadTraits(array &$traits);
}