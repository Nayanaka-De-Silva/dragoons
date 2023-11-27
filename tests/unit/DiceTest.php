<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\Dice\Dice;
use Components\Dice\DiceTypes\DiceTypes;

class DiceTest extends TestCase {
	private DiceTypes $testDiceType = DiceTypes::d20;

  public function setUp(): void {
    $this->testDice = new Dice($this->testDiceType);
  }
  // ----------------------------------------------------------------
  
  public function testCanInstantiateInstanceOfDice(){
		$this->assertInstanceOf(get_class(new Dice($this->testDiceType)), $this->testDice);
	}

	public function testCanGetTheDiceType() {
		$this->assertEquals($this->testDiceType, $this->testDice->getDice());
	}

  public function testAD20DiceGeneratesANumberLessThan20() {
    $this->assertLessThanOrEqual(20, $this->testDice->rollDice());
  }

  public function testAD20DiceGeneratesANumberGreaterThan0() {
    $this->assertGreaterThanOrEqual(1, $this->testDice->rollDice());
  }

  // ----------------------------------------------------------------
  public function tearDown(): void {
    unset($this->testDice);
  }
}