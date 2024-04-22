<?php

namespace Components\Race;

require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Feature\FeaturesList;
use Components\Proficiencies\Proficiencies;
use Components\Race\Race;
use Components\Race\SubRace\MountainDwarf;
use Components\Race\SubRace\SubRace;
use Components\Size\Sizes\Sizes;
use Components\Feature\Darkvision;
use Components\Feature\DwarvenResilience;
use Components\Feature\Stonecunning;

class Dwarf implements Race {
  // Class Defaults
  private int           $DEFAULT_AGE = 55;
  private float         $DEFAULT_WEIGHT = 77.0; 
  private float         $DEFAULT_HEIGHT = 4.0;
  private Sizes         $DEFAULT_SIZE = Sizes::Small;
  private int           $DEFAULT_SPEED = 25;
  private MountainDwarf $DEFAULT_SUB_RACE;

  public function __construct() {
    $this->DEFAULT_SUB_RACE = new MountainDwarf;
  }
  
  private array $abilityScoreIncrease = ['Type'=>'CON', 'Amount'=>2];
  private SubRace $subRace;

  public function getRaceName() {
    return 'Dwarf';
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

  public function getDefaultSubRace() {
    return $this->DEFAULT_SUB_RACE;
  }

  // ---------------------------------------------------------------
  public function loadProficiencies(Proficiencies $proficiencyObject) {
    $proficiencyObject->addWeaponProficiency("Battleaxe",       "Dwarven Combat Training");
    $proficiencyObject->addWeaponProficiency("Handaxe",         "Dwarven Combat Training");
    $proficiencyObject->addWeaponProficiency("Throwing Hammer", "Dwarven Combat Training");
    $proficiencyObject->addWeaponProficiency("Warhammer",       "Dwarven Combat Training");

    // The default tool proficiency depends on the players choice.
    // For development purposes, we'll hardcode it to the default value
    $toolProficiency = "Smith's Tools";
    $proficiencyObject->addToolProficiency($toolProficiency, "Dwarven Tool Proficiency");

    $proficiencyObject->addLanguageProficiency("Common", "Dwarven Language Proficiency");
    $proficiencyObject->addLanguageProficiency("Dwarvish", "Dwarven Language Proficiency");
  }

  public function loadFeatures(FeaturesList $features) {
    $history = 'Dwarven Race Traits';
    $features->addFeature(new Darkvision, $history);
    $features->addFeature(new DwarvenResilience, $history);
    $features->addFeature(new Stonecunning, $history);
  }

  public function setSubRace(SubRace $subRace) {
    $this->subRace = $subRace;
  }

  public function getSubRace() : SubRace {
    return $this->subRace;
  }

  // ---------------------------------------------------------------

  public function getAbilityScoreIncreaseAmount() : int {
    return $this->abilityScoreIncrease['Amount'];
  }

  public function getAbilityScoreIncreaseType() : string{
    return $this->abilityScoreIncrease['Type'];
  }
}