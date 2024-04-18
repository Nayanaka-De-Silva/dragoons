<?php

namespace Components\PlayerCharacter;

use Components\Defaults\Defaults;
use Components\Race\Race;
use Components\CharacterClass\CharacterClass;
use Components\Abilities\Abilities;
use Components\Proficiencies\Proficiencies;
use Components\Race\SubRace\SubRace;
use Components\Size\Size;
use Components\Size\Sizes\Sizes;
use Components\Speed\Speed;
use Components\Traits\Traits;
use Exception;

require_once(__DIR__ . '/../../../vendor/autoload.php');

class PlayerCharacter {
  private string $playerName;
  private string $characterName;

  private Race $race;
  private array $classes;
  private Abilities $abilities;
  private Speed $speed;
  private Proficiencies $proficiencies;
  private array $traits;

  // Character basic properties
  private int $age;
  private float $height;
  private float $weight;
  private string $eyes;
  private string $hair;
  private Size $size;

  public function __construct(string $playerName, string $characterName) {
    $this->playerName = $playerName;
    $this->characterName = $characterName;
    $this->proficiencies = new Proficiencies();
    $this->traits = array();
  }

  public function getPlayerName() {
    return $this->playerName;
  }

  public function getCharacterName() {
    return $this->characterName;
  }

  // ----------------------------------------------------------------
  // Race Methods

  public function setRace(Race $race) {
    $this->race = $race;
    $this->race->loadProficiencies($this->proficiencies);
    $this->race->loadTraits($this->traits);
    $this->setDefaultRaceProperties();
  }

  public function getRace() {
    return $this->race;
  }

  public function setSubRace(SubRace $subRace, $choices = array()) {
    if (!isset($this->race))
      throw new Exception(Defaults::ERR_NO_RACE);
    $this->race->setSubRace($subRace);
    $this->race->getSubRace()->loadSubRaceProficiencies($this->proficiencies, $choices);
  }

  public function getSubRace() : SubRace {
    return $this->race->getSubRace();
  }

  // ----------------------------------------------------------------
  // Class Methods

  public function setClass(CharacterClass $newClass): PlayerCharacter {
    $this->classes[] = $newClass;
    return $this;
  }

  public function getAllClasses(): array {
    return $this->classes;
  }

  public function getClassByIndex(int $classIdx = 0): CharacterClass {
    return $this->classes[$classIdx];
  }
  // ----------------------------------------------------------------
  // Traits
  public function getTraits() : array {
    return $this->traits;
  }

  public function getTraitFromName(string $name) {
    return $this->traits[$name]['trait'];
  }

  // ----------------------------------------------------------------
  // Basic Properties methods

  public function setAge(int $age): PlayerCharacter {
    $this->age = $age;
    return $this;
  }
  public function getAge(): int {
    return $this->age;
  }

  public function setHeight(float $height): PlayerCharacter{
    $this->height = $height;
    return $this;
  }
  public function getHeight(): float {
    return $this->height;
  }

  public function setWeight(float $weight): PlayerCharacter {
    $this->weight = $weight;
    return $this;
  }
  public function getWeight() {
    return $this->weight;
  }

  public function getSize(bool $asString = false) {
    return !$asString ? $this->size->getSize() : $this->size->getSizeAsString();
  }

  public function getSizeObject() {
    return $this->size;
  }


  // ----------------------------------------------------------------
  // Abilities Methods
  public function setAbilities(Abilities $abilities): PlayerCharacter {
    $this->abilities = $abilities;
    return $this;
  }

  public function getAbilities() {
    return $this->abilities;
  }

  // ----------------------------------------------------------------
  // Speed Methods
  public function getSpeed() {
    return $this->speed;
  }

  // ----------------------------------------------------------------
  // Proficiencies Methods
  public function getProficiencies() {
    return $this->proficiencies;
  }

  // ----------------------------------------------------------------
  // Private methods

  private function setDefaultRaceProperties() {
    $this->age    = $this->race->getDefaultAge();
    $this->weight = $this->race->getDefaultWeight();
    $this->height = $this->race->getDefaultHeight();
    $this->size   = new Size($this->race->getDefaultSize());
    $this->speed  = new Speed($this->race->getDefaultSpeed());
  }
}