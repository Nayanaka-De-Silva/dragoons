<?php

namespace Components\Feature;

require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Feature\Feature;


/**
 * Dwarven Resilience
 * 
 */
class DwarvenResilience implements Feature {
	public function getDescription() {
		return "You have advantage on saving throws against poison, and you have resistance against poison damage";
	}

	public function getName() {
		$nameArr = explode('\\', __CLASS__);
		return end($nameArr);
	}
}