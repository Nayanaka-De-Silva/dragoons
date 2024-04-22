<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\Feature\Feature;
use Components\Feature\FeaturesList;

class FeaturesListTest extends TestCase {
  protected FeaturesList $testFeaturesList;

  public function setUp(): void {
		$this->testFeaturesList = new FeaturesList;
  }
  // ----------------------------------------------------------------

  public function testCanInstantiateFeatureComponent() {
		$this->assertInstanceOf(FeaturesList::class, $this->testFeaturesList, "FAILED: Not an Instance of ".Feature::class);
  }

	public function testCanGetFeatureArrayAsAnArray() {
		$this->assertIsArray($this->testFeaturesList->getFeatures(), "FAILED: Method getFeature() does not return an array");
	}

	public function testCanStoreFeatureInFeatureArray() {
		$featureMock = $this->createMock(Feature::class);
		$featureMock->method('getName')->willReturn($featureMock::class);
		$this->testFeaturesList->addFeature($featureMock, "Test Trait");
		$this->assertArrayHasKey($featureMock->getName(), $this->testFeaturesList->getFeatures(), "FAILED: Method getFeature() does not contain trait: ".$featureMock->getName());
	}

	public function testIfAbleToRunGetDescriptionMethodFromFeaturesListGetFeaturesFunction() {
		$featureMock = $this->createMock(Feature::class);
		$featureMock->method('getName')->willReturn($featureMock::class);
		$featureMock->expects($this->once())->method('getDescription');
		$this->testFeaturesList->addFeature($featureMock, "Test Trait");
		$this->testFeaturesList->getFeatures()[$featureMock->getName()]['feature']->getDescription();
	}

  // ----------------------------------------------------------------
  public function tearDown(): void {
		unset($this->testFeaturesList);
  }
}