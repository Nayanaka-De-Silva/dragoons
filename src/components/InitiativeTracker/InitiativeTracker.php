<?php

namespace Components\InitiativeTracker;

use Components\Dice\Dice;
use Components\PlayerCharacter\PlayerCharacter;

/**
 * Initiative Tracker
 * 
 * Use this on the start of a battle.
 * This will track whose turn it is based on a physical dice roll, or a virtual one.
 */
class InitiativeTracker {
	private array $turnOrder;
	private array $combatants;

	public function __construct() {
		$this->turnOrder = [];
		$this->combatants = [];
	}

	public function addPlayerCharacter(PlayerCharacter $playerCharacter, int $dice = null) {
		$this->combatants[] = array('combatant' => $playerCharacter, 'roll' => $dice);
	}

	public function removePlayerCharacter(PlayerCharacter $playerCharacter) {
		$this->combatants = array_filter($this->combatants, function ($combatant) use ($playerCharacter) {
			return $combatant['combatant'] !== $playerCharacter;
		});
	}

	// -------------------------------------------------------------------

	public function getCombatants() {
		return $this->combatants;
	}
	
}