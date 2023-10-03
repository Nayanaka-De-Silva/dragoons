<?php

namespace Components\Test\Integration;

require_once(__DIR__.'/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\PlayerCharacter\PlayerCharacter;
use Components\Race\Dwarf\Dwarf;
use Components\Size\Size;



class PlayerCharacterRaceTest extends TestCase {
  protected PlayerCharacter $testPlayerCharacter;
  protected string $testPlayerName = 'John Smith';
  protected string $testCharacterName = 'Sir Arthas';
  protected Dwarf $testRace;
  protected string $toolProficiency = "Smith's Tools";

  public function setUp(): void {
    $this->testPlayerCharacter = new PlayerCharacter($this->testPlayerName, $this->testCharacterName);
    $this->testRace = new Dwarf();

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

  public function tearDown(): void {
    unset($this->testPlayerCharacter);
    unset($this->testRace);
  }
}