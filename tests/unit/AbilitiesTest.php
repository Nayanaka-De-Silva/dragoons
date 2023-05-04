<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\Abilities\Abilities;

class AbilitiesTest extends TestCase {
  protected Abilities $testAbilities;
  protected array $testAbilityScores = array(
    'STR' => ['score' => 14, 'mod' =>  2],
    'DEX' => ['score' => 13, 'mod' =>  1],
    'CON' => ['score' => 15, 'mod' =>  2],
    'INT' => ['score' => 10, 'mod' =>  0],
    'WIS' => ['score' =>  8, 'mod' => -1],
    'CHA' => ['score' => 12, 'mod' =>  1]
  );

  public function setUp(): void {
    $this->testAbilities = new Abilities(
      $this->testAbilityScores['STR']['score'],
      $this->testAbilityScores['DEX']['score'],
      $this->testAbilityScores['CON']['score'],
      $this->testAbilityScores['INT']['score'],
      $this->testAbilityScores['WIS']['score'],
      $this->testAbilityScores['CHA']['score']
    );
  }
  // ----------------------------------------------------------------
  public function testIfCanGetStrengthAbilityScore(): void {
    $this->assertEquals($this->testAbilities->getStrengthScore(), $this->testAbilityScores['STR']['score']);
  }

  public function testIfCanGetDexterityAbilityScore(): void {
    $this->assertEquals($this->testAbilities->getDexterityScore(), $this->testAbilityScores['DEX']['score']);
  }

  public function testIfCanGetConstitutionAbilityScore(): void {
    $this->assertEquals($this->testAbilities->getConstitutionScore(), $this->testAbilityScores['CON']['score']);
  }

  public function testIfCanGetIntelligenceAbilityScore(): void {
    $this->assertEquals($this->testAbilities->getIntelligenceScore(), $this->testAbilityScores['INT']['score']);
  }

  public function testIfCanGetWisdomAbilityScore(): void {
    $this->assertEquals($this->testAbilities->getWisdomScore(), $this->testAbilityScores['WIS']['score']);
  }

  public function testIfCanGetCharismaAbilityScore(): void {
    $this->assertEquals($this->testAbilities->getCharismaScore(), $this->testAbilityScores['CHA']['score']);
  }

  // ----------------------------------------------------------------

  public function testIfCanGetStrengthModifier(): void {
    $this->assertEquals($this->testAbilities->getStrengthModifier(), $this->testAbilityScores['STR']['mod']);
  }

  public function testIfCanGetDexterityModifier(): void {
    $this->assertEquals($this->testAbilities->getDexterityModifier(), $this->testAbilityScores['DEX']['mod']);
  }

  public function testIfCanGetConstitutionModifier(): void {
    $this->assertEquals($this->testAbilities->getConstitutionModifier(), $this->testAbilityScores['CON']['mod']);
  }

  public function testIfCanGetIntelligenceModifier(): void {
    $this->assertEquals($this->testAbilities->getIntelligenceModifier(), $this->testAbilityScores['INT']['mod']);
  }

  public function testIfCanGetWisdomModifier(): void {
    $this->assertEquals($this->testAbilities->getWisdomModifier(), $this->testAbilityScores['WIS']['mod']);
  }

  public function testIfCanGetCharismaModifier(): void {
    $this->assertEquals($this->testAbilities->getCharismaModifier(), $this->testAbilityScores['CHA']['mod']);
  }

  // ----------------------------------------------------------------
  public function tearDown(): void {
    unset($this->testAbilities);
  }
}