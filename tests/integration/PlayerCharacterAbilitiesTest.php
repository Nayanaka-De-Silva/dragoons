<?php 

namespace Components\Test\Integration;

require_once(__DIR__.'/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\PlayerCharacter\PlayerCharacter;
use Components\Abilities\Abilities;

class PlayerCharacterAbilitiesTest extends TestCase {
  protected PlayerCharacter $testPlayerCharacter;
  protected string $testPlayerName = 'John Smith';
  protected string $testCharacterName = 'Sir Arthas';
  protected Abilities $testAbilities;
  protected array $testAbilitiesArray = array(
    'STR' => ['score' => 14, 'mod' =>  2],
    'DEX' => ['score' => 13, 'mod' =>  1],
    'CON' => ['score' => 15, 'mod' =>  2],
    'INT' => ['score' => 10, 'mod' =>  0],
    'WIS' => ['score' =>  8, 'mod' => -1],
    'CHA' => ['score' => 12, 'mod' =>  1]
  );

  public function setUp(): void {
    $this->testAbilities = new Abilities(
      $this->testAbilitiesArray['STR']['score'],
      $this->testAbilitiesArray['DEX']['score'],
      $this->testAbilitiesArray['CON']['score'],
      $this->testAbilitiesArray['INT']['score'],
      $this->testAbilitiesArray['WIS']['score'],
      $this->testAbilitiesArray['CHA']['score']
    );
    $this->testPlayerCharacter = new PlayerCharacter($this->testPlayerName, $this->testCharacterName);
    $this->testPlayerCharacter->setAbilities($this->testAbilities);
  }

  public function testIfCanSetTheAbilityScoresOfTheCharacter(): void {
    $testAbilities2 = new Abilities(13, 12, 13, 13, 13, 13);
    $this->testPlayerCharacter->setAbilities($testAbilities2);
    $this->assertEquals($this->testPlayerCharacter->getAbilities(), $testAbilities2);
  }

  public function testIfCanGetTheStrengthScoreOfTheCharacter(): void {
    $this->assertEquals($this->testPlayerCharacter->getAbilities()->getStrengthScore(), $this->testAbilitiesArray['STR']['score']);
  }

  public function testIfCanGetTheDexterityScoreOfTheCharacter(): void {
    $this->assertEquals($this->testPlayerCharacter->getAbilities()->getDexterityScore(), $this->testAbilitiesArray['DEX']['score']);
  }

  public function testIfCanGetTheConstitutionScoreOfTheCharacter(): void {
    $this->assertEquals($this->testPlayerCharacter->getAbilities()->getConstitutionScore(), $this->testAbilitiesArray['CON']['score']);
  }

  public function testIfCanGetTheIntelligenceScoreOfTheCharacter(): void {
    $this->assertEquals($this->testPlayerCharacter->getAbilities()->getIntelligenceScore(), $this->testAbilitiesArray['INT']['score']);
  }

  public function testIfCanGetTheWisdomScoreOfTheCharacter(): void {
    $this->assertEquals($this->testPlayerCharacter->getAbilities()->getWisdomScore(), $this->testAbilitiesArray['WIS']['score']);
  }

  public function testIfCanGetTheCharismaScoreOfTheCharacter(): void {
    $this->assertEquals($this->testPlayerCharacter->getAbilities()->getCharismaScore(), $this->testAbilitiesArray['CHA']['score']);
  }

  public function tearDown(): void {
    unset($this->testAbilities);
    unset($this->testPlayerCharacter);
  }
}