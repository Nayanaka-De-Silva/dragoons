<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\Size\Size;
use Components\Size\Sizes\Sizes;

class SizeTest extends TestCase {
  
  public function setUp(): void {
  }
  // ----------------------------------------------------------------

  /**
   * @dataProvider sizeProvider
   */
  public function testIfCanGetSize($size, $space) {
    $testSize = new Size($size);
    $this->assertEquals($size, $testSize->getSize());
  }

  /**
   * @dataProvider sizeProvider
   */
  public function testIfCanGetSpaceForGivenSize($size, $space) {
    $testSize = new Size($size);
    $this->assertEquals($space, $testSize->getSpace());
  }

  /**
   * @dataProvider sizeProvider
   */
  public function testIfCanGetSizeAsString($size, $space, $sizeString) {
    $testSize = new Size($size);
    $this->assertEquals($sizeString, $testSize->getSizeAsString());
  }

  // ----------------------------------------------------------------
  public function tearDown(): void {
  }

  public static function sizeProvider(): array {
    return [
      [Sizes::Tiny, 2.5, 'Tiny'],
      [Sizes::Small, 5, 'Small'],
      [Sizes::Medium, 5, 'Medium'],
      [Sizes::Large, 10, 'Large'],
      [Sizes::Huge, 15, 'Huge'],
      [Sizes::Gargantuan, 20, 'Gargantuan'],
      [Sizes::Colossal, 30, 'Colossal']
    ];
  }
}