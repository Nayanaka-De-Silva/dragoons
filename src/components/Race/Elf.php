<?php

namespace Components\Race;

require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Proficiencies\Proficiencies;
use Components\Race\Race;
use Components\Race\SubRace\SubRace;
use Components\Size\Sizes\Sizes;
use Components\Feature\Darkvision;
use Components\Feature\FeyAncestry;
use Components\Feature\Trance;
use Components\Feature\FeaturesList;

class Elf implements Race {
  // Class Defaults
  private int   $DEFAULT_AGE = 100;
  private float $DEFAULT_WEIGHT = 65.0; 
  private float $DEFAULT_HEIGHT = 5.5;
  private Sizes $DEFAULT_SIZE = Sizes::Medium;
  private int   $DEFAULT_SPEED = 30;
  protected $DEFAULT_SUB_RACE = 'HighElf';
  
  private array $abilityScoreIncrease = ['Type'=>'DEX', 'Amount'=>2];
  private SubRace $subRace;
  private string $name = 'Elf';
  

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

  public function getDefaultSubRace() {
    return $this->DEFAULT_SUB_RACE;
  }

  // ---------------------------------------------------------------
  public function loadProficiencies(Proficiencies $proficiencyObject) {
    $proficiencyObject->addSkillsProficiency("Perception", "Elven Keen Senses");
    $proficiencyObject->addLanguageProficiency("Common", "Elven Language Proficiency");
    $proficiencyObject->addLanguageProficiency("Elvish", "Elven Language Proficiency");
  }

  public function loadFeatures(FeaturesList $features) {
    $history = 'Elven Race Trait';
    $features->addFeature(new Darkvision, $history);
    $features->addFeature(new Trance, $history);
    $features->addFeature(new FeyAncestry, $history);
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