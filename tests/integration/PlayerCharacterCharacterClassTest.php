<?php


namespace Components\Test\Integration;

require_once(__DIR__.'/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\PlayerCharacter\PlayerCharacter;
use Components\CharacterClass\Fighter\Fighter;
use Components\CharacterClass\Bard\Bard;

class PlayerCharacterCharacterClassTest extends TestCase {
  protected PlayerCharacter $testPlayerCharacter;
  protected string $playerName = 'John Smith';
  protected string $characterName = 'Sir Arthas';

  protected Fighter $testClass;
  protected Bard $testClass2;

  public function setUp(): void {
    $this->testClass = new Fighter();
    $this->testClass2 = new Bard();
    $this->testPlayerCharacter = new PlayerCharacter($this->playerName, $this->characterName);
  }

  public function testIfCanSetFighterClassToPlayerCharacter(): void {
    $this->testPlayerCharacter->setClass($this->testClass);
    $this->assertContains($this->testClass, $this->testPlayerCharacter->getAllClasses());
  }

  public function testIfCanSetBardClassToPlayerCharacter(): void {
    $this->testPlayerCharacter->setClass($this->testClass2);
    $this->assertContains($this->testClass2, $this->testPlayerCharacter->getAllClasses());
  }

  public function testIfCanSetBardClassAndFighterClassToPlayerCharacter(): void {
    $this->testPlayerCharacter->setClass($this->testClass);
    $this->testPlayerCharacter->setClass($this->testClass2);
    
    $this->assertEquals($this->testPlayerCharacter->getClassByIndex(0), $this->testClass);
    $this->assertEquals($this->testPlayerCharacter->getClassByIndex(1), $this->testClass2);
  }

  public function tearDown(): void {
    unset($this->testClass);
    unset($this->testPlayerCharacter);
  }
}