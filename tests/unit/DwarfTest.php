<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\Race\Dwarf;
use Components\Race\SubRace\MountainDwarf;

class DwarfTest extends TestCase {
  

  public function setUp(): void {
    $this->testDwarf = new Dwarf();  
  }
  // ----------------------------------------------------------------
  
  public function testIfCanGetAbilityScoreIncreaseAmountForDwarfRace(): void {
    $expectedAbilityScoreIncrease = 2;
    $this->assertEquals($expectedAbilityScoreIncrease, $this->testDwarf->getAbilityScoreIncreaseAmount());
  }

  public function testIfCanGetAbilityScoreIncreaseTypeForDwarfRace(): void {
    $expectedAbilityScoreIncreaseType = 'CON';
    $this->assertEquals($expectedAbilityScoreIncreaseType, $this->testDwarf->getAbilityScoreIncreaseType());
  }

  public function testIfCanSetMountainDwarfAsSubRace() {
    $testSubRace = new MountainDwarf();
    $this->testDwarf->setSubRace($testSubRace);
    $this->assertEquals($this->testDwarf->getSubRace(), $testSubRace);
  }

  // ----------------------------------------------------------------
  public function tearDown(): void {
    unset($this->testDwarf);
  }
}