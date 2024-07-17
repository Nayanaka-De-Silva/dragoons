<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\ChallengeRating\ChallengeRating;
use Components\JSONImporter\JSONImporter;

class testChallengeRatingTest extends TestCase {
	private ChallengeRating $testChallengeRating;

	public function setUp(): void {
		$this->testChallengeRating = new ChallengeRating(10);
	}

	public function testCanInstantiatetestChallengeRatingObject() {
		$this->assertInstanceOf(ChallengeRating::class, $this->testChallengeRating);
	}
/**
 * @dataProvider challengeRatingProficiencyProvider
 */
	public function testCanGetProficiencyBonusFromChallengeRating($challengeRating, $proficiency) {
		$testChallengeRating = new ChallengeRating($challengeRating);
		$this->assertEquals($proficiency, $testChallengeRating->getProficiencyBonus());
	}

	public function tearDown(): void {
		unset($this->testChallengeRating);
	}

	// ==========================================

	static public function challengeRatingProficiencyProvider() : array {
		return [
			['0.125', 2],
			['0.25', 2],
			['5', 3],
			['8', 3],
			['13', 5],
			['12', 4]
		];
	}

}