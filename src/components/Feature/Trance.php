<?php

namespace Components\Feature;

use Components\Feature\Feature;

require_once(__DIR__ . '/../../../vendor/autoload.php');

/**
 * Trance
 * 
 */
class Trance implements Feature {
	public function getDescription() {
		return "Elves don’t need to sleep. Instead, they meditate deeply, remaining semiconscious, for 4 hours a day. (The Common word for such meditation is “trance.”) While meditating, you can dream after a fashion; such dreams are actually mental exercises that have become reflexive through years o f practice. After resting in this way, you gain the same benefit that a human does from 8 hours o f sleep.";
	}

	public function getName() {
		$nameArr = explode('\\', __CLASS__);
		return end($nameArr);
	}
}