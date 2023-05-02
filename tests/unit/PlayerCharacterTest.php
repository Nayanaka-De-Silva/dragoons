<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\PlayerCharacter\PlayerCharacter;

class PlayerCharacterTest extends TestCase {
  protected PlayerCharacter $testPlayerCharacter;
  protected string $testPlayerName = 'John Smith';
  protected string $testCharacterName = 'Sir Arthas';
  protected int $testAge = 25;
  protected float $testHeight = 5.4;
  protected float $testWeight = 134.0;

  public function setUp(): void {
    $this->testPlayerCharacter = new PlayerCharacter($this->testPlayerName, $this->testCharacterName);
  }
  // ----------------------------------------------------------------

  public function testIfCanGetCharacterName(): void {
    $this->assertEquals($this->testPlayerCharacter->getCharacterName(), $this->testCharacterName);
  }

  public function testIfCanGetPlayerName(): void {
    $this->assertEquals($this->testPlayerCharacter->getPlayerName(), $this->testPlayerName);
  }

  public function testIfCanSetPlayerAge(): void {
    $this->testPlayerCharacter->setAge($this->testAge);
    $this->assertEquals($this->testAge, $this->testPlayerCharacter->getAge());
  }

  public function testIfCanSetPlayerHeight(): void {
    $this->testPlayerCharacter->setHeight($this->testHeight);
    $this->assertEquals($this->testHeight, $this->testPlayerCharacter->getHeight());
  }

  public function testIfCanSetPlayerWeight(): void {
    $this->testPlayerCharacter->setWeight($this->testWeight);
    $this->assertEquals($this->testWeight, $this->testPlayerCharacter->getWeight());
  }

  // ----------------------------------------------------------------
  public function tearDown(): void {
    unset($this->testPlayerCharacter);
  }
}