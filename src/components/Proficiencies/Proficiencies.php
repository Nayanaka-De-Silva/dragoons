<?php

namespace Components\Proficiencies;

require_once(__DIR__ . '/../../../vendor/autoload.php');

class Proficiencies {
	private array $weapons;
	private array $languages;
	private array $skills;
	private array $savingThrows;
	private array $armor;
	private array $tools;

	public function addWeaponProficiency($weapon, $gainedFrom = null) {
		$this->weapons[$weapon] = ['gainedFrom' => $gainedFrom];
	}

	public function getWeaponProficiencies() {
		return array_keys($this->weapons);
	}

	public function checkWeaponProficiencies($weapon) {
		return array_key_exists($weapon, $this->weapons);
	}

	// ---------------------------------------------------------------------

	public function addLanguageProficiency($language, $gainedFrom = null) {
		$this->languages[$language] = ['gainedFrom' => $gainedFrom];
	}

	public function getLanguageProficiencies() {
		return array_keys($this->languages);
	}

	public function checkLanguageProficiencies($language) {
		return array_key_exists($language, $this->languages);
	}

	// ---------------------------------------------------------------------

	public function addSkillsProficiency($skill, $gainedFrom = null) {
		$this->skills[$skill] = ['gainedFrom' => $gainedFrom];
	}

	public function getSkillsProficiencies() {
		return array_keys($this->skills);
	}
	
	public function checkSkillsProficiencies($skill) {
		return array_key_exists($skill, $this->skills);
	}

	// ---------------------------------------------------------------------

	public function addSavingThrowProficiency($savingThrow, $gainedFrom = null) {
		$this->savingThrows[$savingThrow] = ['gainedFrom' => $gainedFrom];
	}

	public function getSavingThrowProficiencies() {
		return array_keys($this->savingThrows);
	}
	
	public function checkSavingThrowProficiencies($savingThrow) {
		return array_key_exists($savingThrow, $this->savingThrows);
	}

	// ---------------------------------------------------------------------

	public function addArmorProficiency($armor, $gainedFrom = null) {
		$this->armor[$armor] = ['gainedFrom' => $gainedFrom];
	}

	public function getArmorProficiencies() {
		return array_keys($this->armor);
	}

	public function checkArmorProficiencies($armor) {
		return array_key_exists($armor, $this->armor);
	}

	// ---------------------------------------------------------------------

	public function addToolProficiency($tool, $gainedFrom = null) {
		$this->tools[$tool] = ['gainedFrom' => $gainedFrom];
	}

	public function getToolProficiencies() {
		return array_keys($this->tools);
	}

			
	public function checkToolProficiencies($tool) {
		return array_key_exists($tool, $this->tools);
	}

	// ---------------------------------------------------------------------

}