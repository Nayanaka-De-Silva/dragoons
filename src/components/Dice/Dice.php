<?php

namespace Components\Dice;

require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Dice\DiceTypes\DiceTypes;

class Dice {
	private DiceTypes $dice;

	public function __construct(DiceTypes $diceType) {
    $this->dice = $diceType;
  }

	public function getDice() {
		return $this->dice;
	}

	public function rollDice() {
		return rand(1, $this->dice->value);
	}
}