<?php

namespace Components\Speed;

require_once(__DIR__ . '/../../../vendor/autoload.php');

class Speed {
	const DEFAULT_SPEED = 30;

	private $baseSpeed;
	private $modifiers;

	public function __construct(int $baseSpeed = Speed::DEFAULT_SPEED) {
		$this->baseSpeed = $baseSpeed;
		$this->modifiers = 0;
	}

	public function getCurrentSpeed() {
		return $this->baseSpeed + $this->modifiers;
	}

	public function setModifier(int $modifiers) {
		$this->modifiers = $modifiers;
	}

}