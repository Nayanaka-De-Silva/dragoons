<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\PlayerCharacter\PlayerCharacter;

class PlayerCharacterTest extends TestCase {
  protected PlayerCharacter $testPlayerCharacter;
  protected string $testPlayerName = 'John Smith';
  protected string $testCharacterName = 'Sir Arthas';

  public function setUp(): void {
    $this->testPlayerCharacter = new PlayerCharacter($this->testPlayerName, $this->testCharacterName);
  }

  public function testIfCanGetCharacterName(): void {
    $this->assertEquals($this->testPlayerCharacter->getCharacterName(), $this->testCharacterName);
  }

  public function testIfCanGetPlayerName(): void {
    $this->assertEquals($this->testPlayerCharacter->getPlayerName(), $this->testPlayerName);
  }

  public function tearDown(): void {
    unset($this->testPlayerCharacter);
  }
}