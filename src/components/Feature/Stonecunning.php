<?php

namespace Components\Traits;

require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Traits\Traits;


/**
 * Stonecunning
 * 
 */
class Stonecunning extends Traits {
	public function getDescription() {
		return "Whenever you make an Intelligence (History) check related to the origin o f stonework, you are considered proficient in the History skill and add double your proficiency bonus to the check, instead of your normal proficiency bonus.";
	}
}