<?php

namespace Components\PlayerCharacter;

use Components\Defaults\Defaults;
use Components\Race\Race;
use Components\CharacterClass\CharacterClass;
use Components\Abilities\Abilities;
use Components\Size\Size;
use Components\Size\Sizes\Sizes;

require_once(__DIR__ . '/../../../vendor/autoload.php');

class PlayerCharacter {
  private string $playerName;
  private string $characterName;

  private Race $race;
  private array $classes;
  private Abilities $abilities;

  // Character basic properties
  private int $age;
  private float $height;
  private float $weight;
  private string $eyes;
  private string $hair;
  private Size $size;

  public function __construct(string $playerName, string $characterName, Race $race = null) {
    $this->playerName = $playerName;
    $this->characterName = $characterName;
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
    $this->setDefaultRaceProperties();
  }

  public function getRace() {
    return $this->race;
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
  // Private methods

  private function setDefaultRaceProperties() {
    $this->age    = $this->race->getDefaultAge();
    $this->weight = $this->race->getDefaultWeight();
    $this->height = $this->race->getDefaultHeight();
    $this->size   = new Size($this->race->getDefaultSize());
  }
}