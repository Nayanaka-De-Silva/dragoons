<?php

namespace Components\CharacterClass;

require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Level\Level;
use Components\Dice\Dice;
use Components\Dice\DiceTypes\DiceTypes;

abstract class CharacterClass {
  // Default properties

  private Level $level;
  private Dice $hitDice;
  private int $hitDiceCount;

  public function __construct(int $startingExperience = 0) {
    $this->setLevel(new Level($startingExperience));
  }

  public function setLevel(Level $level) {
    $this->level = $level;
  }

  public function getLevel() {
    return $this->level;
  }

  /**
   * loadHitDice - Used to load the Hit Dice for the specific Character Class
   * This function should be called in the constructor of the specific Class in order to load the characters hit dice
   *
   * @param DiceTypes $hitDiceType - The type of dice to load as the HitDice
   * @return Dice - Returns the newly created dice
   */
  public function loadHitDice(DiceTypes $hitDiceType) : Dice {
    $this->hitDice = new Dice($hitDiceType);
    $this->hitDiceCount = $this->getMaximumAvailableHitDice();
    return $this->hitDice;
  }

	/**
	 * getMaximumAvailableHitDice - Get the maximum number of Hit Dice available for the character
	 * N.B. The maximum number of hit dice is dependant on the level, since you get a hit dice for every
	 * level you have.
	 * @return int - Maximum Number of Hit Dice
	 */
	public function getMaximumAvailableHitDice() : int {
		return $this->level->getCurrentLevel();
	}

  /**
   * getAvailableHitDice - Get the available number of Hit Dice that the character has left
   * @return int - Available Number of Hit Dice
   */
  public function getAvailableHitDice() : int {
    return $this->hitDiceCount;
  }

  /**
   * getHitDice - Get the hit dice that is assigned to the character's class
   * This function allows the user to perform dice functions, such as obtaining the dice type and rolling said dice.
   *
   * @return Dice - The Hit Dice assigned from the loadHitDice function
   */
  public function getHitDice() : Dice {
    return $this->hitDice;
  }
}