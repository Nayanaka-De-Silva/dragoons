<?php

namespace Components\Race\Dwarf;

require_once(__DIR__ . '/../../../../vendor/autoload.php');

use Components\Race\Race;

class Dwarf extends Race {
  // Class Defaults
  private int $DEFAULT_AGE = 55;
  private float $DEFAULT_WEIGHT = 77.0; 
  private float $DEFAULT_HEIGHT = 4.0;
  private array $abilityScoreIncrease = ['Type'=>'CON', 'Amount'=>2];

  private string $name = 'Dwarf';

  public function getRaceName() {
    return $this->name;
  }

  // ----------------------------------------------------------------

  public function getDefaultAge() {
    return $this->DEFAULT_AGE;
  }

  public function getDefaultWeight(){
    return $this->DEFAULT_WEIGHT;
  }

  public function getDefaultHeight(){
    return $this->DEFAULT_HEIGHT;
  }

  // ---------------------------------------------------------------

  public function getAbilityScoreIncreaseAmount() : int {
    return $this->abilityScoreIncrease['Amount'];
  }

  public function getAbilityScoreIncreaseType() : string{
    return $this->abilityScoreIncrease['Type'];
  }
}