<?php

namespace Components\Race;


require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Proficiencies\Proficiencies;
use Components\Race\SubRace\SubRace;

abstract class Race {
  // Default properties

  private string $name;
  protected SubRace $subRace;

  abstract public function getDefaultAge();
  abstract public function getDefaultWeight();
  abstract public function getDefaultHeight();
  abstract public function getDefaultSize();
  abstract public function getDefaultSpeed();

  abstract public function loadProficiencies(Proficiencies &$proficiencyObject);
  abstract public function loadTraits(array &$traits);

  abstract public function getAbilityScoreIncreaseAmount() : int;
  abstract public function getAbilityScoreIncreaseType() : string;

  public function getSubRace(): SubRace {
    return $this->subRace;
  }

  public function setSubRace(SubRace $subRace = null) {
    $this->subRace = $subRace;
  }

  public function getDefaultSubRace() : string {
    return $this->DEFAULT_SUB_CLASS;
  }
}