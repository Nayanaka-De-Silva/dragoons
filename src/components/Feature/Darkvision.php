<?php

namespace Components\Traits;

require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Traits\Trait;


/**
 * Darkvision
 * 
 */
class Darkvision implements Trait {
	public function getDescription() {
		return "Accustomed to twilit forests and the night sky, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bgith light, and in darkness as if it were dim light. You can't discen color in darkness, only shades of grey.";
	}
}