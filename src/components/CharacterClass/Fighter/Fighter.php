<?php


namespace Components\CharacterClass\Fighter;

require_once(__DIR__ . '/../../../../vendor/autoload.php');

use Components\CharacterClass\CharacterClass;
use Components\Dice\DiceTypes\DiceTypes;
use Components\Proficiencies\Proficiencies;

/**
 * Fighter Class
 * 
 * Well Rounded Specialists
 * Trained For Danger
 */

class Fighter extends CharacterClass {
  private string $name = 'Fighter';
	private DiceTypes $defaultHitDice = DiceTypes::d12;

  
  public function loadProficiencies(Proficiencies &$proficiencyObject) {
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

  public function getDefaultHitDice() : DiceTypes {
    return $this->defaultHitDice;
  }
}