<?php

namespace Components\Feature;

require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Feature\Feature;


/**
 * FeyAncestry
 * 
 */
class FeyAncestry implements Feature {
	public function getDescription() {
		return "You have advantage on saving throws against being charmed, and magic can’t put you to sleep.";
	}

	public function getName() {
		$nameArr = explode('\\', __CLASS__);
		return end($nameArr);
	}
}