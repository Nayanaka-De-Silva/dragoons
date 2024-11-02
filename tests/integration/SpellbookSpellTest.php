<?php 

namespace Components\Test\Integration;

require_once(__DIR__.'/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\Spellbook\Spellbook;
use Components\Spell\Spell;

class SpellbookSpellTest extends TestCase {
	private Spellbook $testSpellbook;

  public function setUp(): void {
		$this->testSpellbook = new Spellbook();
  }

	public function testIfCanGetSpellByName() {
		$testSpellName = "Magic Missile";
		$this->assertEquals($testSpellName, $this->testSpellbook->searchSpellByName($testSpellName)->getName());
	}

	public function testInvalidSpellNameIsPassedIntoSearchSpellByNameFunction() {
		$errorMessage = "Spell not found in Spell List.";
		$testSpellName = "Non-existent Spell";
		$this->assertEquals($errorMessage, $this->testSpellbook->searchSpellByName($testSpellName));
	}

	public function testAbleToGetAnArrayOfSpells() {
		$this->assertIsArray($this->testSpellbook->getSpellList());
	}

	function tearDown(): void {
    unset($this->testSpellbook);
  }
}