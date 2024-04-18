<?php

namespace Components\Race;


require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Proficiencies\Proficiencies;
use Components\Race\SubRace\SubRace;

interface Race {
  // Default properties
  public function getRaceName();
  public function getDefaultAge();
  public function getDefaultWeight();
  public function getDefaultHeight();
  public function getDefaultSize();
  public function getDefaultSpeed();
  public function getDefaultSubRace();
  public function loadProficiencies(Proficiencies &$proficiencyObject);
  public function loadTraits(array &$traits);
  public function setSubRace(SubRace $subRace);
  public function getSubRace() : SubRace;
}