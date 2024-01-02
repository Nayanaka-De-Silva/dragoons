<?php 

namespace Components\Test\Integration;

require_once(__DIR__.'/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\PlayerCharacter\PlayerCharacter;
use Components\Abilities\Abilities;
use Components\Race\Elf;
use Components\Race\SubRace\HighElf;

class PlayerCharacterSubRaceTest extends TestCase {
  protected PlayerCharacter $testPlayerCharacter;
  protected string $testPlayerName = 'John Smith';
  protected string $testCharacterName = 'Sir Arthas';
	protected string $testLanguage = 'Dwarven';

  public function setUp(): void {
		$this->testPlayerCharacter = new PlayerCharacter($this->testPlayerName, $this->testCharacterName);
		$this->testPlayerCharacter->setRace(new Elf);
		$this->testPlayerCharacter->setSubRace(new HighElf, array('high-elf-language' => $this->testLanguage));
  }

  public function testIfSubRaceHighElfCanBeSet(): void {
		$this->assertInstanceOf(get_class(new HighElf), $this->testPlayerCharacter->getRace()->getSubRace());
  }

/**
 * @dataProvider elvenWeaponsProvider
 */
	public function testIfSubRaceAddedWeaponProficiency($weapon): void {
		$this->assertTrue($this->testPlayerCharacter->getProficiencies()->checkWeaponProficiencies($weapon));
	}

	public function testIfHighElfSubRaceAddedLanguageProficiency(): void {
		$this->assertTrue($this->testPlayerCharacter->getProficiencies()->checkLanguageProficiencies($this->testLanguage));
	}

  public function tearDown(): void {
    unset($this->testPlayerCharacter);
  }

	public static function elvenWeaponsProvider() {
		return [
			['Longsword'],
			['Shortsword'],
			['Shortbow'],
			['Longbow']
		];
	}
}