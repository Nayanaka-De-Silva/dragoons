<?php

namespace Components\NonPlayerCharacter;

use Components\Abilities\Abilities;
use Components\Alignment\Alignment;
use Components\Alignment\Alignments;
use Components\ChallengeRating\ChallengeRating;
use Components\Defaults\Defaults;
use Components\Size\Size;
use Components\Type\Type;

class NonPlayerCharacter {
	private string $name;
	private Size $size;
	private Type $type;
	private Alignment $alignment;
	private Abilities $abilities;
	private ChallengeRating $challengeRating;

	public function __construct(string $name = null) {
		$this->name = $name ?? '';
	}

	public function getName(): string {
		if (!isset($this->name) || empty($this->name)) {
			throw new \Exception(Defaults::ERR_NO_NAME);
		}
		return $this->name;
	}	

	public function setName(string $name) {
		$this->name = $name;
		return $this;
	}

	public function getSize(): Size {
		if (!isset($this->size) || empty($this->size)) {
			throw new \Exception(Defaults::ERR_NO_SIZE);
		}
		return $this->size;
	}

	public function setSize(Size $size) {
		$this->size = $size;
		return $this;
	}

	public function getType(): Type {
		if (!isset($this->type) || empty($this->type)) {
			throw new \Exception(Defaults::ERR_NO_TYPE);
		}
		return $this->type;
	}

	public function setType(Type $type) {
		$this->type = $type;
		return $this;
	}

	public function getAlignment(): Alignment {
		if (!isset($this->alignment) || empty($this->alignment)) {
			throw new \Exception(Defaults::ERR_NO_ALIGNMENT);
		}
		return $this->alignment;
	}

	public function setAlignment(Alignment $alignment) {
		$this->alignment = $alignment;
		return $this;
	}

	public function setAbilities(Abilities $abilities) {
		$this->abilities = $abilities;
	}

	public function getAbilities() {
		return $this->abilities;
	}

	public function setChallengeRating(ChallengeRating $challengeRating) {
		$this->challengeRating = $challengeRating;
	}

	public function getChallengeRating(): ChallengeRating {
		return $this->challengeRating;
	}
}