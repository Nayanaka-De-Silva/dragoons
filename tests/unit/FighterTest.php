<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\CharacterClass\Fighter\Fighter;
use Components\Dice\DiceTypes\DiceTypes;
use Components\Dice\Dice;
use Components\Level\Level;

class FighterTest extends TestCase {
  private Fighter $testFighter;
  private Level $testLevel;
  

  public function setUp(): void {
    $this->testLevel = new Level(10);
    $this->testFighter = new Fighter();
  }
  // ----------------------------------------------------------------
  
  public function testCanObtainHitDiceAs10ForFighterClass(): void {
    $expectedHitDice = new Dice(DiceTypes::d12);
    $this->testFighter->setLevel($this->testLevel);
		$this->testFighter->loadHitDice($this->testFighter->getDefaultHitDice());
		
    $this->assertEquals($expectedHitDice, $this->testFighter->getHitDice());
	}

  // ----------------------------------------------------------------
  public function tearDown(): void {
    unset($this->testFighter);
  }
}