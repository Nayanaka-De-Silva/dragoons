<?php

namespace Components\PlayerCharacter;

use Components\Defaults\Defaults;
use Components\Race\Race;
use Components\CharacterClass\CharacterClass;
use Components\Abilities\Abilities;
use Components\Feature\FeaturesList;
use Components\Proficiencies\Proficiencies;
use Components\Race\SubRace\SubRace;
use Components\Size\Size;
use Components\Size\Sizes\Sizes;
use Components\Speed\Speed;
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
  private FeaturesList $featuresList;

  // Character basic properties
  private int $age;
  private float $height;
  private float $weight;
  private string $eyes;
  private string $hair;
  private Size $size;

  public function __construct(string $playerName, string $characterName) {
    $this->playerName     = $playerName;
    $this->characterName  = $characterName;
    $this->proficiencies  = new Proficiencies;
    $this->featuresList   = new FeaturesList;
  }

  public function getPlayerName() {
    return $this->playerName;
  }

  public function getCharacterName() {
    return $this->characterName;
  }

  // ----------------------------------------------------------------
  // Race Methods
  /**
   * setRace - Set the Race of the Player Character
   * N.B. The Abilities of the Player Character must be set before setting the race.
   * This is because there are some races that will modify the abilities scores.
   *
   * @param Race $race
   * @return void
   */
  public function setRace(Race $race) {
    if (!isset($this->abilities))
      throw new Exception(Defaults::ERR_NO_ABILITIES);
    $this->race = $race;
    $this->abilities->IncreaseAbilityScore($race->getAbilityScoreIncreaseAmount(), $race->getAbilityScoreIncreaseType());
    $this->race->loadProficiencies($this->proficiencies);
    $this->race->loadFeatures($this->featuresList);
    $this->setDefaultRaceProperties();
  }

  public function getRace() {
    return $this->race;
  }

  /**
   * setSubRace - Sets the SubRace of the Player Character
   * N.B. Race must be set when setting the sub-race
   * @param SubRace $subRace - The Sub Race to be set
   * @param array $choices - Extra array to allow for different choices by the Player
   * @return PlayerCharacter
   */
  public function setSubRace(SubRace $subRace, $choices = array()) {
    if (!isset($this->race))
      throw new Exception(Defaults::ERR_NO_RACE);
    $this->race->setSubRace($subRace);
    $this->race->getSubRace()->loadSubRaceProficiencies($this->proficiencies, $choices);
    return $this;
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
  // Features
  public function getFeaturesList() : FeaturesList {
    return $this->featuresList;
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
  /**
   * setAbilities - Set the abilities of the Player Character
   * N.B. The abilities must be set before the Race, so that the appropriate
   * Ability Score Increases can be applied
   *
   * @param Abilities $abilities - Abilities Object
   * @return PlayerCharacter
   */
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