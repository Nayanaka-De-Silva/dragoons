<?php

namespace Components\Feature;

require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Feature\Feature;


/**
 * Darkvision
 * 
 */
class Darkvision implements Feature {
	public function getDescription() {
		return "Accustomed to twilit forests and the night sky, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bgith light, and in darkness as if it were dim light. You can't discen color in darkness, only shades of grey.";
	}

	public function getName() {
		$nameArr = explode('\\', __CLASS__);
		return end($nameArr);
	}
}