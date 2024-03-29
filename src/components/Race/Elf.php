<?php

namespace Components\Race;

require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Proficiencies\Proficiencies;
use Components\Race\Race;
use Components\Size\Sizes\Sizes;
use Components\Traits\Darkvision;
use Components\Traits\FeyAncestry;
use Components\Traits\Trance;

class Elf extends Race {
  // Class Defaults
  private int   $DEFAULT_AGE = 100;
  private float $DEFAULT_WEIGHT = 65.0; 
  private float $DEFAULT_HEIGHT = 5.5;
  private Sizes $DEFAULT_SIZE = Sizes::Medium;
  private int   $DEFAULT_SPEED = 30;
  protected $DEFAULT_SUB_CLASS = 'HighElf';
  
  private array $abilityScoreIncrease = ['Type'=>'DEX', 'Amount'=>2];

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

  // ---------------------------------------------------------------
  public function loadProficiencies(Proficiencies &$proficiencyObject) {
    $proficiencyObject->addSkillsProficiency("Perception", "Elven Keen Senses");
    $proficiencyObject->addLanguageProficiency("Common", "Elven Language Proficiency");
    $proficiencyObject->addLanguageProficiency("Elvish", "Elven Language Proficiency");
  }

  public function loadTraits(array &$traits) {
    $history = 'Elven Race Trait';
    $darkVision = new Darkvision();
    $traits['Darkvision'] = $darkVision->getTraitArray($history);
    $trance = new Trance();
    $traits['Trance'] = $trance->getTraitArray($history);
    $feyAncestry = new FeyAncestry();
    $traits['Fey Ancestry'] = $feyAncestry->getTraitArray($history);
  }

  // ---------------------------------------------------------------

  public function getAbilityScoreIncreaseAmount() : int {
    return $this->abilityScoreIncrease['Amount'];
  }

  public function getAbilityScoreIncreaseType() : string{
    return $this->abilityScoreIncrease['Type'];
  }
}