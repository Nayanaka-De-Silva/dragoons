<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\Spell\Spell;

class SpellTest extends TestCase {
	protected array $testSpellDetails = array(
		"name" => "Magic Missile",
		"desc" => "You create three glowing darts of magical force. Each dart hits a creature of your choice that you can see within range. A dart deals 1d4 + 1 force damage to its target. The darts all strike simultaneously, and you can direct them to hit one creature or several.",
		"higher_level" => "When you cast this spell using a spell slot of 2nd level or higher, the spell creates one more dart for each slot level above 1st.",
		"page" => "phb 257",
		"range" => "120 feet",
		"components" => array("V", "S"),
		"ritual" => false,
		"duration" => "Instantaneous",
		"concentration" => false,
		"casting_time" => "1 action",
		"level" => 1,
		"school" => "Evocation",
		"classes" => array("Sorcerer", "Wizard")
	);

  // ----------------------------------------------------------------
  public function setUp(): void {
		$this->testSpell = new Spell($this->testSpellDetails);
  }

	public function testIfCanGetSpellName() {
		$this->assertEquals($this->testSpellDetails['name'], $this->testSpell->getName());
	}

	public function testIfCanGetSpellDesc() {
		$this->assertEquals($this->testSpellDetails['desc'], $this->testSpell->getDesc());
	}

	public function testIfCanGetSpellHigherLevelDetails() {
		$this->assertEquals($this->testSpellDetails['higher_level'], $this->testSpell->getHigherLevel());
	}

	public function testIfCanGetSpellPage() {
		$this->assertEquals($this->testSpellDetails['page'], $this->testSpell->getPage());
	}

	public function testIfCanGetSpellRange() {
		$this->assertEquals($this->testSpellDetails['range'], $this->testSpell->getRange());
	}

	public function testIfCanGetSpellComponenets() {
		$this->assertEquals($this->testSpellDetails['components'], $this->testSpell->getComponents());
	}

	public function testIfCanGetIfSpellIsRitual() {
		$this->assertEquals($this->testSpellDetails['ritual'], $this->testSpell->getRitual());
	}

	public function testIfCanGetSpellDuration() {
		$this->assertEquals($this->testSpellDetails['duration'], $this->testSpell->getDuration());
	}

	public function testIfCanGetIfSpellRequiresConcentration() {
		$this->assertEquals($this->testSpellDetails['concentration'], $this->testSpell->getConcentration());
	}

	public function testIfCanGetCastingTime() {
		$this->assertEquals($this->testSpellDetails['casting_time'], $this->testSpell->getCastingTime());
	}

	public function testIfCanGetSpellLevel() {
		$this->assertEquals($this->testSpellDetails['level'], $this->testSpell->getLevel());
	}

	public function testIfCanGetSpellSchool() {
		$this->assertEquals($this->testSpellDetails['school'], $this->testSpell->getSchool());
	}

	public function testIfCanGetSpellClasses() {
		$this->assertEquals($this->testSpellDetails['classes'], $this->testSpell->getClasses());
	}

  // ----------------------------------------------------------------
  public function tearDown(): void {
    unset($this->testSpell);
  }
}