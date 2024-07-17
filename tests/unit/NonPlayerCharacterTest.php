<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use Components\Abilities\Abilities;
use Components\Alignment\Alignment;
use PHPUnit\Framework\TestCase;
use Components\NonPlayerCharacter\NonPlayerCharacter;
use Components\Defaults\Defaults;
use Components\Size\Size;
use Components\Type\Type;

class NonPlayerCharacterTest extends TestCase {
	private NonPlayerCharacter $testNpc;
	private array $testNpcInfo = array(
		'Name' => 'Alvin'
	);

  public function setUp(): void {
		$this->testNpc = new NonPlayerCharacter;
  }
  // ----------------------------------------------------------------
  
  public function testCanInstantiateANonPlayerCharacter(): void {
		$this->assertInstanceOf(NonPlayerCharacter::class, $this->testNpc);
	}

	public function testCanGetNonPlayerCharacterName(): void {
		$testName = 'Alvin';
		$testNpc = new NonPlayerCharacter($testName);
		$this->assertEqualsCanonicalizing($testName, $testNpc->getName());
	}
	
	public function testWillThrowErrorMessageIfTryingToGetNameIfNotAlreadySet(): void {
		$this->expectExceptionMessage(Defaults::ERR_NO_NAME);
		$testNpc = new NonPlayerCharacter;
		$testNpc->getName();
	}

	public function testAbleToSetNameOfNonPlayerCharacter(): void {
		$this->assertEqualsCanonicalizing($this->testNpcInfo['Name'], $this->testNpc->setName($this->testNpcInfo['Name'])->getName());
	}

	public function testCanSetAndGetNonPlayerCharacterSize(): void {
		$sizeMock = $this->createMock(Size::class);
		$this->assertEquals($sizeMock, $this->testNpc->setSize($sizeMock)->getSize());
	}

	public function testWillThrowErrorWithAnMessageIfTryingToGetSizeIfNotAlreadySet(): void {
		$this->expectExceptionMessage(Defaults::ERR_NO_SIZE);
		$testNpc = new NonPlayerCharacter;
		$testNpc->getSize();
	}

	public function testCanSetAndGetNonPlayerCharacterType(): void {
		$typeMock = $this->createMock(Type::class);
		$this->assertEquals($typeMock, $this->testNpc->setType($typeMock)->getType());
	}

	public function testWillThrowErrorWithAnMessageIfTryingToGetTypeIfNotAlreadySet(): void {
		$this->expectExceptionMessage(Defaults::ERR_NO_TYPE);
		$testNpc = new NonPlayerCharacter;
		$testNpc->getType();
	}

	/**
	 * @dataProvider alignmentProvider
	 */
	public function testCanSetAndGetNonPlayerCharacterAlignment($alignment): void {
		$this->assertEquals($alignment, $this->testNpc->setAlignment($alignment)->getAlignment());
	}

	public function testWillThrowErrorWithAnMessageIfTryingToGetAlignmentIfNotAlreadySet(): void {
		$this->expectExceptionMessage(Defaults::ERR_NO_ALIGNMENT);
		$testNpc = new NonPlayerCharacter;
		$testNpc->getAlignment();
	}

	public function testCanStoreAbilityScoreToNonPlayerCharacter() {
		$abilityScoreMock = $this->createMock(Abilities::class);
		$this->testNpc->setAbilities($abilityScoreMock);
		$this->assertEquals($abilityScoreMock, $this->testNpc->getAbilities());
	}

	public function testCanGetDexterityModifierFromAbilitiesMock() {
		$dexScore = 12;
		$abilityScoreMock = $this->createMock(Abilities::class);
		$abilityScoreMock->method('getDexterityScore')->willReturn($dexScore);
		$this->testNpc->setAbilities($abilityScoreMock);
		$this->assertEquals($dexScore, $this->testNpc->getAbilities()->getDexterityScore());
	}

	public function testCanGetCharismaModifierFromAbilitiesMock() {
		$chaScore = 15;
		$abilityScoreMock = $this->createMock(Abilities::class);
		$abilityScoreMock->method('getCharismaModifier')->willReturn($chaScore);
		$this->testNpc->setAbilities($abilityScoreMock);
		$this->assertEquals($chaScore, $this->testNpc->getAbilities()->getCharismaModifier());
	}

	public static function alignmentProvider(): array {
		return array(
			[Alignment::ChaoticNeutral],
			[Alignment::LawfulGood]
		);
	}

  // ----------------------------------------------------------------
  public function tearDown(): void {
    unset($this->testNpc);
  }
}