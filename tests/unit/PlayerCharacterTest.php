<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use Components\Defaults\Defaults;
use PHPUnit\Framework\TestCase;
use Components\PlayerCharacter\PlayerCharacter;
use Components\Race\Race;
use Components\Race\SubRace\MountainDwarf;
use Components\Race\SubRace\HillDwarf;
use Components\Race\Dwarf;
use Components\Race\SubRace\SubRace;
use Components\Size\Size;
use Components\Size\Sizes\Sizes;
use Components\Speed\Speed;
use Exception;

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

  public function testIfUnableToLoadSubRaceWithoutLoadingRace(): void {
    $subRaceStub = $this->createStub(MountainDwarf::class);
    $this->expectException(Exception::class);
    $this->testPlayerCharacter->setSubRace($subRaceStub);
  }

  // ----------------------------------------------------------------
  public function tearDown(): void {
    unset($this->testPlayerCharacter);
  }

  public function RaceSubRaceProvider() {
    return array(
      [Dwarf::class, MountainDwarf::class],
      [Dwarf::class, HillDwarf::class]
    );
  }
}