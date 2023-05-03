<?php

namespace Components\PlayerCharacter;

use Components\Defaults\Defaults;
use Components\Race\Race;
use Components\CharacterClass\CharacterClass;

require_once(__DIR__ . '/../../../vendor/autoload.php');

class PlayerCharacter {
  private string $playerName;
  private string $characterName;

  private Race $race;
  private array $classes;

  // Character basic properties
  private int $age;
  private float $height;
  private float $weight;
  private string $eyes;
  private string $hair;

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

  public function setClass(CharacterClass $newClass): void {
    $this->classes[] = $newClass;
  }

  public function getAllClasses(): array {
    return $this->classes;
  }

  public function getClassByIndex(int $classIdx = 1): CharacterClass {
    return $this->classes[$classIdx];
  }

  // ----------------------------------------------------------------
  // Basic Properties methods

  public function setAge(int $age) {
    $this->age = $age;
  }
  public function getAge(): int {
    return $this->age;
  }

  public function setHeight(float $height) {
    $this->height = $height;
  }
  public function getHeight(): float {
    return $this->height;
  }

  public function setWeight(float $weight) {
    $this->weight = $weight;
  }
  public function getWeight() {
    return $this->weight;
  }

  // ----------------------------------------------------------------
  // Private methods

  private function setDefaultRaceProperties() {
    $this->age    = $this->race->getDefaultAge();
    $this->weight = $this->race->getDefaultWeight();
    $this->height = $this->race->getDefaultHeight();
  }
}