<?php

namespace Components\Feature;

require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Feature\Feature;


/**
 * Stonecunning
 * 
 */
class Stonecunning implements Feature {
	public function getDescription() {
		return "Whenever you make an Intelligence (History) check related to the origin o f stonework, you are considered proficient in the History skill and add double your proficiency bonus to the check, instead of your normal proficiency bonus.";
	}

	public function getName() {
		$nameArr = explode('\\', __CLASS__);
		return end($nameArr);
	}
}