<?php

namespace Components\Traits;

require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Traits\Traits;


/**
 * Dwarven Resilience
 * 
 */
class DwarvenResilience extends Traits {
	public function getDescription() {
		return "You have advantage on saving throws against poison, and you have resistance against poison damage";
	}
}