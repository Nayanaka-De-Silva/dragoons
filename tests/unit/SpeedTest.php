<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\Speed\Speed;

class SpeedTest extends TestCase {
  protected $testBaseSpeed = 25;

  public function setUp(): void {
    $this->testSpeed = new Speed($this->testBaseSpeed);  
  }
  // ----------------------------------------------------------------
  
  public function testAbleToGetBaseSpeed(): void {
    $this->assertEquals($this->testBaseSpeed, $this->testSpeed->getCurrentSpeed());
  }

	public function testAbleToAddPositiveModifierToBaseSpeed() : void {
		$modifier = 5;
		$this->testSpeed->setModifier($modifier);
		$this->assertEquals($this->testBaseSpeed + $modifier, $this->testSpeed->getCurrentSpeed());
	}

	public function testAbleToAddNegativeModifierToBaseSpeed() : void {
		$modifier = -5;
		$this->testSpeed->setModifier($modifier);
		$this->assertEquals($this->testBaseSpeed + $modifier, $this->testSpeed->getCurrentSpeed());
	}


  // ----------------------------------------------------------------
  public function tearDown(): void {
    unset($this->testSpeed);
  }
}