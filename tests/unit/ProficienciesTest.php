<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\Proficiencies\Proficiencies;

class ProficienciesTest extends TestCase {
	protected Proficiencies $testProf;

  public function setUp(): void {
		$this->testProf = new Proficiencies();
  }
  // ----------------------------------------------------------------
  
	/**
   * @dataProvider proficienciesProvider
   */
  public function testCanSetProficiency(string $profType, string $profItem, string $gainedFrom): void {
		switch ($profType) {
			case "weapon":
				$this->testProf->addWeaponProficiency($profItem, $gainedFrom);
				$this->assertContains($profItem, $this->testProf->getWeaponProficiencies());
				break;
			case "language":
				$this->testProf->addLanguageProficiency($profItem, $gainedFrom);
				$this->assertContains($profItem, $this->testProf->getLanguageProficiencies());
				break;
			case "skill":
				$this->testProf->addSkillsProficiency($profItem, $gainedFrom);
				$this->assertContains($profItem, $this->testProf->getSkillsProficiencies());
				break;
			case "savingThrow":
				$this->testProf->addSavingThrowProficiency($profItem, $gainedFrom);
				$this->assertContains($profItem, $this->testProf->getSavingThrowProficiencies());
				break;
			case "armor":
				$this->testProf->addArmorProficiency($profItem, $gainedFrom);
				$this->assertContains($profItem, $this->testProf->getArmorProficiencies());
				break;
			case "tool":
				$this->testProf->addToolProficiency($profItem, $gainedFrom);
				$this->assertContains($profItem, $this->testProf->getToolProficiencies());
				break;
			default:
				// If the code reaches this point, It's failed test
				$this->assertTrue(false, "Unrecognized Proficiency Type: {$profType}");
		}
		
  }

	/**
   * @dataProvider proficienciesProvider
   */
	public function testCanCheckIfProficiencyIsSet($profType, $profItem, $gainedFrom) {
		switch ($profType) {
			case "weapon":
				$this->testProf->addWeaponProficiency($profItem, $gainedFrom);
				$this->assertTrue($this->testProf->checkWeaponProficiencies($profItem));
				break;
			case "language":
				$this->testProf->addLanguageProficiency($profItem, $gainedFrom);
				$this->assertTrue($this->testProf->checkLanguageProficiencies($profItem));
				break;
			case "skill":
				$this->testProf->addSkillsProficiency($profItem, $gainedFrom);
				$this->assertTrue($this->testProf->checkSkillsProficiencies($profItem));
				break;
			case "savingThrow":
				$this->testProf->addSavingThrowProficiency($profItem, $gainedFrom);
				$this->assertTrue($this->testProf->checkSavingThrowProficiencies($profItem));
				break;
			case "armor":
				$this->testProf->addArmorProficiency($profItem, $gainedFrom);
				$this->assertTrue($this->testProf->checkArmorProficiencies($profItem));
				break;
			case "tool":
				$this->testProf->addToolProficiency($profItem, $gainedFrom);
				$this->assertTrue($this->testProf->checkToolProficiencies($profItem));
				break;
			default:
				// If the code reaches this point, It's failed test
				$this->assertTrue(false, "Unrecognized Proficiency Type: {$profType}");
		}
		
	}


  // ----------------------------------------------------------------
  public function tearDown(): void {
    unset($this->testProf);
  }

	// ----------------------------------------------------------------
	public static function proficienciesProvider(): array {
    return [
      ['weapon', 'Longsword', 'Race'],
      ['language', 'Elvish', 'Class'],
      ['skill', 'Nature', 'Class'],
      ['savingThrow', 'Dexterity', 'Background'],
      ['armor', 'Chail Mail', 'Background'],
      ['tool', 'proficiencies', 'Race'],
      ['weapon', 'Scimitar', 'Background'],
			['weapon', 'Dagger', 'Class'],
			['skill', 'Perception', 'Race'],
			['savingThrow', 'Constitution', 'Background']
    ];
  }
}