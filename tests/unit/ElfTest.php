<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\Race\Elf;
use Components\Size\Sizes\Sizes;

class ElfTest extends TestCase {
  

  public function setUp(): void {
    $this->testElf = new Elf();  
  }
  // ----------------------------------------------------------------
  
  public function testIfCanGetAbilityScoreIncreaseAmountForElfRace(): void {
    $expectedAbilityScoreIncrease = 2;
    $this->assertEquals($expectedAbilityScoreIncrease, $this->testElf->getAbilityScoreIncreaseAmount());
  }

  public function testIfCanGetAbilityScoreIncreaseTypeForElfRace(): void {
    $expectedAbilityScoreIncreaseType = 'DEX';
    $this->assertEquals($expectedAbilityScoreIncreaseType, $this->testElf->getAbilityScoreIncreaseType());
  }

  public function testIfSpeedIsthirty() {
    $expectedSpeed = 30;
    $this->assertEquals($expectedSpeed, $this->testElf->getDefaultSpeed());
  }

  public function testIfDefaultSizeIsMedium() {
    $expectedSize = Sizes::Medium;
    $this->assertEquals($expectedSize, $this->testElf->getDefaultSize());
  }

  public function testIfDefaultAgeIsOneHundred(){
    $expectedDefaultAge = 100;
    $this->assertEquals($expectedDefaultAge, $this->testElf->getDefaultAge());
  }


  // ----------------------------------------------------------------
  public function tearDown(): void {
    unset($this->testElf);
  }
}