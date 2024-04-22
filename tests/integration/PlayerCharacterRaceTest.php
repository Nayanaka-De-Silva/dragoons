<?php

namespace Components\Test\Integration;

require_once(__DIR__.'/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\PlayerCharacter\PlayerCharacter;
use Components\Abilities\Abilities;
use Components\Race\Dwarf;
use Components\Race\Elf;
use Components\Size\Size;
use Components\Feature\Darkvision;
use Components\Feature\DwarvenResilience;
use Components\Feature\FeyAncestry;
use Components\Feature\Stonecunning;
use Components\Feature\Trance;

class PlayerCharacterRaceTest extends TestCase {
  protected PlayerCharacter $testPlayerCharacter;
  protected string $testPlayerName = 'John Smith';
  protected string $testCharacterName = 'Sir Arthas';
  protected Dwarf $testRace;
  protected string $toolProficiency = "Smith's Tools";
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
    $this->testPlayerCharacter = new PlayerCharacter($this->testPlayerName, $this->testCharacterName);
    $this->testRace = new Dwarf();
    $this->testAbilities = new Abilities(
      $this->testAbilitiesArray['STR']['score'],
      $this->testAbilitiesArray['DEX']['score'],
      $this->testAbilitiesArray['CON']['score'],
      $this->testAbilitiesArray['INT']['score'],
      $this->testAbilitiesArray['WIS']['score'],
      $this->testAbilitiesArray['CHA']['score']
    );
    $this->testPlayerCharacter->setAbilities($this->testAbilities);
    $this->testPlayerCharacter->setRace($this->testRace);
  }

  public function testCanSetCharacterRaceAsDwarf(): void {
    $this->assertInstanceOf(Dwarf::class, $this->testPlayerCharacter->getRace());
  }

  public function testIfCharactersDefaultAgeIsEqualToRaceDefaultAgeUponCreation(): void {
    $this->assertEquals($this->testPlayerCharacter->getAge(), $this->testRace->getDefaultAge());
  }

  public function testIfCharactersDefaultWeightIsEqualToRaceDefaultAgeUponCreation(): void {
    $this->assertEquals($this->testPlayerCharacter->getWeight(), $this->testRace->getDefaultWeight());
  }

  public function testIfCharactersDefaultHeightIsEqualToRaceDefaultAgeUponCreation(): void {
    $this->assertEquals($this->testPlayerCharacter->getHeight(), $this->testRace->getDefaultHeight());
  }

  public function testIfCharacterDefaultSizeIsEqualToRaceDefaultSizeUponCreation(): void {
    $this->assertEquals($this->testPlayerCharacter->getSize(), $this->testRace->getDefaultSize());
  }

  public function testIfCharacterDefaultSizeAsAStringIsEqualToRaceDefaultSizeAsAStringUponCreation(): void {
    $this->assertEquals($this->testPlayerCharacter->getSize(true), $this->testRace->getDefaultSize()->value);
  }

  public function testIfCharacterSizeObjectCanBeRetrieved() {
    $this->assertInstanceOf(Size::class, $this->testPlayerCharacter->getSizeObject());
  }

  public function testIfCanGetTheDwarvenPlayersSpeedFromPlayerCharacter() {
    $this->assertEquals($this->testPlayerCharacter->getSpeed()->getCurrentSpeed(), $this->testRace->getDefaultSpeed());
  }

  public function testIfCanModifyDwarvenPlayersSpeedFromPlayerCharacter() {
    $modifier = 5;
    $this->testPlayerCharacter->getSpeed()->setModifier($modifier);
    $this->assertEquals($this->testPlayerCharacter->getSpeed()->getCurrentSpeed(), $this->testRace->getDefaultSpeed() + $modifier);
  }

  public function testIfAllDwarvenProficienciesAreLoaded() {
    $this->assertTrue($this->testPlayerCharacter->getProficiencies()->checkWeaponProficiencies("Battleaxe"));
    $this->assertTrue($this->testPlayerCharacter->getProficiencies()->checkWeaponProficiencies("Handaxe"));
    $this->assertTrue($this->testPlayerCharacter->getProficiencies()->checkWeaponProficiencies("Throwing Hammer"));
    $this->assertTrue($this->testPlayerCharacter->getProficiencies()->checkWeaponProficiencies("Warhammer"));

    $this->assertTrue($this->testPlayerCharacter->getProficiencies()->checkLanguageProficiencies("Common"));
    $this->assertTrue($this->testPlayerCharacter->getProficiencies()->checkLanguageProficiencies("Dwarvish"));

    $this->assertTrue($this->testPlayerCharacter->getProficiencies()->checkToolProficiencies($this->toolProficiency));
  }

  public function testIfAllElvishProficienciesAreLoaded() {
    $testElfCharacter = new PlayerCharacter('Jojo', 'Drizzt');
    $testElfCharacter->setAbilities($this->testAbilities);
    $testElfCharacter->setRace(new Elf());
    $this->assertTrue($testElfCharacter->getProficiencies()->checkSkillsProficiencies('Perception'));
    $this->assertTrue($testElfCharacter->getProficiencies()->checkLanguageProficiencies('Elvish'));
    $this->assertTrue($testElfCharacter->getProficiencies()->checkLanguageProficiencies('Common'));
  }

  public function testIfAllElvishFeaturesAreLoaded() {
    $testElfCharacter = new PlayerCharacter('Jojo', 'Drizzt');
    $testElfCharacter->setAbilities($this->testAbilities);
    $testElfCharacter->setRace(new Elf);
    $testFeatures = array('Darkvision'   => array('feature' => new Darkvision,  'from'=>'Elven Race Traits'),
                          'Trance'       => array('feature' => new Trance,      'from'=>'Elven Race Traits'),
                          'Fey Ancestry' => array('feature' => new FeyAncestry, 'from'=>'Elven Race Traits'));
    
    foreach ($testFeatures as $feature) {
      $this->assertArrayHasKey($feature['feature']->getName(), $testElfCharacter->getFeaturesList()->getFeatures());
    }
  }

  public function testIfAllDwarvenFeaturesAreLoaded() {
    $testDwarfCharacter = new PlayerCharacter('Jojo', 'Drizzt');
    $testDwarfCharacter->setAbilities($this->testAbilities)->setRace(new Dwarf());
    $testFeatures = array('Darkvision'         => array('feature' => new Darkvision(),        'source'=>'Dwarven Race Traits'),
                          'Dwarven Resilience' => array('feature' => new DwarvenResilience(), 'source'=>'Dwarven Race Traits'),
                          'Stonecunning'       => array('feature' => new Stonecunning(),      'source'=>'Dwarven Race Traits'));
    
    foreach ($testFeatures as $feature) {
      $this->assertArrayHasKey($feature['feature']->getName(), $testDwarfCharacter->getFeaturesList()->getFeatures());
    }
  }

  public function tearDown(): void {
    unset($this->testPlayerCharacter);
    unset($this->testRace);
  }
}