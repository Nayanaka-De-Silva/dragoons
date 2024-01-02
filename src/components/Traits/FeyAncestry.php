<?php

namespace Components\Traits;

require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Traits\Traits;


/**
 * FeyAncestry
 * 
 */
class FeyAncestry extends Traits {
	public function getDescription() {
		return "You have advantage on saving throws against being charmed, and magic can’t put you to sleep.";
	}
}