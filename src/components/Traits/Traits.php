<?php

namespace Components\Traits;

require_once(__DIR__ . '/../../../vendor/autoload.php');

/**
 * Traits
 * 
 * This class is pretty abstract, since this is the place where all the extra "traits" that a character gains from Races and Classes get defeined.
 * For now, there's two types of Traits:
 * 1. Race Trait (e.g. Darkvision)
 * 2. Class Trait (e.g. Favored Enemy)
 * (And potential others)
 */
abstract class Traits {

	abstract public function getDescription();
	
	public function getTraitHistory($history) {
		return $history;
	}
	
	public function getTraitArray(string $history) {
		return array('trait' => $this, 'from' => $this->getTraitHistory($history));
	}
}