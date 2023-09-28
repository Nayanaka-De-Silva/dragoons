<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\Level\Level;

class LevelTest extends TestCase {
  protected Level $testLevel;
  protected int $level = 4;
  protected int $profBonus = 2;
  protected int $experiencePoints = 2800;

  // ----------------------------------------------------------------
  public function setUp(): void {
    $this->testLevel = new Level($this->experiencePoints);
  }
  
  /**
   * @dataProvider levelsProvider
   */
  public function testIfCanGetCurrentLevel($exp, $level, $prof) {
    $testLevel = new Level($exp);
    $this->assertEquals($level, $testLevel->getCurrentLevel());
  }

  /**
   * @dataProvider levelsProvider
   */
  public function testCanGetProficiencyBonus($exp, $level, $prof) {
    $testLevel = new Level($exp);
    $this->assertEquals($testLevel->getCurrentProficiencyBonus(), $prof);
  }

  // ----------------------------------------------------------------
  public function tearDown(): void {
    unset($this->testLevel);
  }

  // ----------------------------------------------------------------
  public static function levelsProvider(): array {
    return [
      [2800,    4, 2],
      [23485,   7, 3],
      [309485, 19, 6],
      [90001,  11, 4],
      [185000, 15, 5]
    ];
  }
}