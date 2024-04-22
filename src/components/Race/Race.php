<?php

namespace Components\Race;


require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Proficiencies\Proficiencies;
use Components\Race\SubRace\SubRace;
use Components\Feature\FeaturesList;

interface Race {
  // Default properties
  public function getRaceName();
  public function getDefaultAge();
  public function getDefaultWeight();
  public function getDefaultHeight();
  public function getDefaultSize();
  public function getDefaultSpeed();
  public function getDefaultSubRace();
  public function loadProficiencies(Proficiencies $proficiencyObject);
  public function loadFeatures(FeaturesList $features);
  public function setSubRace(SubRace $subRace);
  public function getSubRace() : SubRace;
  public function getAbilityScoreIncreaseAmount() : int;
  public function getAbilityScoreIncreaseType() : string;
}