<?php 

namespace Components\Test\Integration;

require_once(__DIR__.'/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\CharacterClass\Bard\Bard;
use Components\Level\Level;

class CharacterClassLevelTest extends TestCase {
  protected Bard $testCharacterClass;
  protected Level $testLevel;

  protected int $testExp = 2800;
  
  public function setUp(): void {
    $this->testLevel = new Level($this->testExp);
    $this->testCharacterClass = new Bard();
    $this->testCharacterClass->setLevel($this->testLevel);
  }

  public function testIfCanGetLevelFromCharacterClass(): void {
    $this->assertEquals($this->testLevel->getCurrentLevel(), $this->testCharacterClass->getLevel()->getCurrentLevel());
  }

  public function testIfCanGetProficiencyBonusFromCharacterClass(): void {
    $this->assertEquals($this->testLevel->getCurrentProficiencyBonus(), $this->testCharacterClass->getLevel()->getCurrentProficiencyBonus());
  }

  public function tearDown(): void {
    unset($this->testCharacterClass);
    unset($this->testLevel);
  }
}