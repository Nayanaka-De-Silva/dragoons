<?php

namespace Components\Test\Unit;

include_once(__DIR__.'/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Commands\Spellbook;
use Components\Spell\Spell;

class SpellbookCommandTest extends TestCase
{
	protected Spellbook $spellCommand;

	protected function setUp(): void
	{
		$this->spellCommand = new Spellbook();
	}

	protected function tearDown(): void
	{
		// Clean up any resources or state here
		unset($this->spellCommand);
	}

	public function testSpellbookCommandCanBeInstantiated() {
		$this->assertInstanceOf(Spellbook::class, $this->spellCommand);
	}

	public function testSpellbookCommandCanGetSpellAsString() {
		$testSpellDetails = [
			'name' => 'Magic Missile',
			'level' => '1st-level evocation',
			'casting_time' => '1 action',
			'range' => '60 feet',
			'components' => 'V, S',
			'duration' => 'Instantaneous',
			'desc' => 'A dart of magical force',
			'higher_level' => 'When you cast this spell using a spell slot of 2nd level or higher, the spell creates one more dart for each slot level above 1st.',
			'classes' => 'Sorcerer, Wizard',
			'school' => 'Evocation',
			'page' => 'PHB 257',
			'ritual' => 'no',
			'concentration' => 'no'
		];
		$testSpell = new Spell($testSpellDetails);
		$this->assertIsString($this->spellCommand->getSpellAsString($testSpell));
	}

}