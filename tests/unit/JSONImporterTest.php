<?php

namespace Components\Test\Unit;

require_once(__DIR__ . '/../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Components\JSONImporter\JSONImporter;

class JSONImporterTest extends TestCase {
	private string $testFile = 'test-file.json';

  public function setUp(): void {
    $this->testJsonImporter = new JSONImporter();
  }
  // ----------------------------------------------------------------

	public function testIfFileImporterIsAbleToCheckIfAFileExists() {
		$testJsonFile = __DIR__.'/test-json.json';
		$testDataArray = array("Hello" => "Hello world!");

		$fp = $this->createJsonFile($testJsonFile);
		$this->writeArrayIntoJsonFile($fp, $testDataArray);

		$this->assertTrue($this->testJsonImporter->checkIfFilePathIsValid($testJsonFile));
		$this->destroyTestJsonFile($testJsonFile);
	}

	public function testIfCanGetATwoDimensionalArray() {
		$testArray = array(
			array(
				"name" => "testName",
				"age" => 23
			),
			array(
				"name" => "testName2",
				"age" => 21
			)
		);
		$this->createTestJsonFile($testArray);
		$this->assertEquals($testArray, $this->testJsonImporter->importFromJson($this->testFile));
	}

	public function testIfImporterWillThrowExceptionWhenImportPathIsInvalid() {
		$testInvalidPath = 'test.json';
		$this->expectException(\InvalidArgumentException::class);
		$this->testJsonImporter->importFromJSON($testInvalidPath);
	}

	public function testIfFileImporterImportsDataIntoAnArray() {
		$dataFile = array("Hello" => "World");
		$this->createTestJsonFile($dataFile);
		$this->assertEquals($dataFile, $this->testJsonImporter->importFromJson($this->testFile));
	}

  // ----------------------------------------------------------------
  public function tearDown(): void {
    unset($this->testJsonImporter);
		if (file_exists($this->testFile))
			$this->destroyTestJsonFile($this->testFile);
  }

	public function createJsonFile(string $filename) {
		return fopen($filename, 'c');
	}

	public function writeArrayIntoJsonFile($filePointer, array $data) {
		fwrite($filePointer, json_encode($data));
	}

	public function destroyTestJsonFile(string $filename) {
		if (file_exists($filename)) {
			unlink($filename);
			return true;
		} else {
			return false;
		}
	}

	public function createTestJsonFile(array $data) {
		$filePointer = $this->createJsonFile($this->testFile);
		$this->writeArrayIntoJsonFile($filePointer, $data);
		return $filePointer;
	}
}