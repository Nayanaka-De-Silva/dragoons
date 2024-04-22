<?php

namespace Components\Feature;

require_once(__DIR__ . '/../../../vendor/autoload.php');

/**
 * Features
 * 
 * Used to record a series of Features that are using the Trait interface. This component is meant to store the Features a Player Character (or any character that can have Features).
 * A Trait is defined as a special ability that a Player Character obtains due to various sources.
 * For now, there's two types of Features:
 * 1. Race Trait (e.g. Darkvision)
 * 2. Class Trait (e.g. Favored Enemy)
 * (And potentially others as well)
 */
final class FeaturesList {

	private array $features;

	public function __construct() {
		$this->features = array();
	}
	
	public function getFeatures() : array {
		return $this->features;
	}

	public function addFeature(Feature $newFeature, string $source) : void {
		$this->features[$newFeature->getName()] = array('feature' => $newFeature, 'source' => $source);
	}
}