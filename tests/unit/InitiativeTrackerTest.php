<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use Components\InitiativeTracker\InitiativeTracker;
use Components\PlayerCharacter\PlayerCharacter;
use PHPUnit\Framework\TestCase;

class InitiativeTrackerTest extends TestCase {
	private InitiativeTracker $testTracker;
	private PlayerCharacter $playerMock;

  public function setUp(): void {
		$this->testTracker = new InitiativeTracker;
		$this->playerMock = $this->createStub(PlayerCharacter::class);
  }
  // ----------------------------------------------------------------

	public function testCanAddPlayerCharacterAndGetCombatantFirstIndex() {
		$this->testTracker->addPlayerCharacter($this->playerMock);
		$this->assertContains($this->playerMock, $this->testTracker->getCombatants()[0]);
	}

	public function testCanAddPlayerCharacterWithPhysicalDiceRoll() {
		$diceRoll = 12;
		$this->testTracker->addPlayerCharacter($this->playerMock, $diceRoll);
		$this->assertContains(array('combatant' => $this->playerMock, 'roll' => $diceRoll), $this->testTracker->getCombatants());
	}

	public function testCanRemovePlayerCharacter() {
		$this->testTracker->addPlayerCharacter($this->playerMock);
		$this->testTracker->removePlayerCharacter($this->playerMock);
		$this->assertEmpty($this->testTracker->getCombatants());
	}

  // ----------------------------------------------------------------
  public function tearDown(): void {
    unset($this->testTracker);
  }
}