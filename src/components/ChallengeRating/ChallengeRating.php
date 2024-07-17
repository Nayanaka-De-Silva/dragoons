<?php

namespace Components\ChallengeRating;

use Components\JSONImporter\JSONImporter;

require_once(__DIR__ . '/../../../vendor/autoload.php');

class ChallengeRating {
	private string $challengeRating;
	private int $proficiencyBonus;

	
	public function __construct(string $challengeRating) {
		$this->challengeRating = $challengeRating;
		$jsonDecoder = new JSONImporter;
		$data = $jsonDecoder->importFromJSON(dirname(__FILE__).'/challengeRatings.json');
		$this->proficiencyBonus = $data[$challengeRating]['proficiency'];
	}

	public function getProficiencyBonus() {
		return $this->proficiencyBonus;
	}
}