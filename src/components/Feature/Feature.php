<?php

namespace Components\Feature;

require_once(__DIR__ . '/../../../vendor/autoload.php');



interface Feature {
	public function getDescription();
}