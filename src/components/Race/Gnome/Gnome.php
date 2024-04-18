<?php

namespace Components\Race\Gnome;

require_once(__DIR__ . '/../../../../../vendor/autoload.php');

use Components\Proficiencies\Proficiencies;
use Components\Race\Race;
use Components\Size\Size;
use Components\Size\Sizes\Sizes;

class Gnome extends Race {
  // Class Defaults
  private int   $DEFAULT_AGE = 60;
  private float $DEFAULT_WEIGHT = 40.0; 
  private float $DEFAULT_HEIGHT = 4.0;
  private Sizes $DEFAULT_SIZE = Sizes::Small;
  private int   $DEFAULT_SPEED = 25;
  
  private array $abilityScoreIncrease = ['Type'=>'INT', 'Amount'=>2];

  private string $name = 'Gnome';

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

  public function getDefaultSize() {
    return $this->DEFAULT_SIZE;
  }

  public function getDefaultSpeed() {
    return $this->DEFAULT_SPEED;
  }

  // ---------------------------------------------------------------
  public function loadProficiencies(Proficiencies &$proficiencyObject) {
    // The default tool proficiency depends on the players choice.
    // For development purposes, we'll hardcode it to the default value
    $proficiencyObject->addLanguageProficiency("Common", "Gnomish Language Proficiency");
    $proficiencyObject->addLanguageProficiency("Gnomish", "Gnomish Language Proficiency");
  }

  public function loadTraits(array $traits) {
    // Coming Soon
  }

  // ---------------------------------------------------------------

  public function getAbilityScoreIncreaseAmount() : int {
    return $this->abilityScoreIncrease['Amount'];
  }

  public function getAbilityScoreIncreaseType() : string{
    return $this->abilityScoreIncrease['Type'];
  }
}