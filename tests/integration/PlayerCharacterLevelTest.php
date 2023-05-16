<?php


namespace Components\Test\Integration;

require_once(__DIR__.'/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\PlayerCharacter\PlayerCharacter;
use Components\Level\Level;

class PlayerCharacterLevelTest extends TestCase {
  protected PlayerCharacter $testPlayerCharacter;
  protected string $playerName = 'John Smith';
  protected string $characterName = 'Sir Arthas';

  protected Level $testLevel;
  protected int $testExp = 10000;

  public function setUp(): void {
    $this->testPlayerCharacter = new PlayerCharacter($this->playerName, $this->characterName);
    $this->testLevel = new Level($this->testExp);
  }
  
  public function testIfCanGetPlayerCharacterLevel(): void {
    $this->testPlayerCharacter->setLevel($this->testLevel);
    $this->assertEquals($this->testLevel->getCurrentLevel(), $this->testPlayerCharacter->getLevel()->getCurrentLevel());
  }

  public function testIfCanGetPlayerCharacterProficiencyBonus(): void {
    $this->testPlayerCharacter->setLevel($this->testLevel);
    $this->assertEquals($this->testLevel->getCurrentProficiencyBonus(), $this->testPlayerCharacter->getLevel()->getCurrentProficiencyBonus());
  }

  public function tearDown(): void {
    unset($this->testLevel);
    unset($this->testPlayerCharacter);
  }
}