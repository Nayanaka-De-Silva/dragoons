<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\Race\Dwarf;
use Components\Race\SubRace\MountainDwarf;

class DwarfTest extends TestCase {
  protected Dwarf $testDwarf;

  public function setUp(): void {
    $this->testDwarf = new Dwarf();  
  }
  // ----------------------------------------------------------------
  
  public function testCanGetAbilityScoreIncreaseAmountForDwarfRace(): void {
    $expectedAbilityScoreIncrease = 2;
    $this->assertEquals($expectedAbilityScoreIncrease, $this->testDwarf->getAbilityScoreIncreaseAmount());
  }

  public function testCanGetAbilityScoreIncreaseTypeForDwarfRace(): void {
    $expectedAbilityScoreIncreaseType = 'CON';
    $this->assertEquals($expectedAbilityScoreIncreaseType, $this->testDwarf->getAbilityScoreIncreaseType());
  }

  public function testCanSetMountainDwarfAsASubRace() {
    $testSubRace = $this->createStub(MountainDwarf::class);
    $this->testDwarf->setSubRace($testSubRace);
    $this->assertEquals($this->testDwarf->getSubRace(), $testSubRace);
  }

  // ----------------------------------------------------------------
  public function tearDown(): void {
    unset($this->testDwarf);
  }
}