<?php

namespace Components\Spell;

require_once(__DIR__ . '/../../../vendor/autoload.php');

class Spell {
	private string 	$name;
	private string 	$desc;
	private string 	$higher_level;
	private string 	$page;
	private string 	$range;
	private array 	$components;
	private bool 		$ritual;
	private string 	$duration;
	private bool 		$concentration;
	private string 	$casting_time;
	private int 		$level;
	private string 	$school;
	private array 	$classes;

	public function __construct(array $details) {
		$this->name 					= $details['name'];
		$this->desc 					= $details['desc'];
		$this->higher_level 	= $details['higher_level'] ?? '';
		$this->page 					= $details['page'];
		$this->range 					= $details['range'];
		$this->components 		= explode(", ", $details['components']);
		$this->ritual 				= $details['ritual'] != "no" ? true : false;
		$this->duration 			= $details['duration'];
		$this->concentration 	= $details['concentration'] != "no" ? true : false;
		$this->casting_time 	= $details['casting_time'];
		$this->level 					= $details['level'] != "Cantrip" ? $details['level'][0] : 0;
		$this->school 				= $details['school'];
		$this->classes 				= explode(", ", $details['classes']);
	}

	public function getName() : string {
		return $this->name;
	}
	
	public function getDesc() : string {
		return $this->desc;
	}

	public function getHigherLevel() : string {
		return $this->higher_level;
	}

	public function getPage() : string {
		return $this->page;
	}

	public function getRange() : string {
		return $this->range;
	}

	public function getComponents() : array {
		return $this->components;
	}

	public function getRitual() : bool {
		return $this->ritual;
	}

	public function getDuration() : string {
		return $this->duration;
	}

	public function getConcentration() : bool {
		return $this->concentration;
	}

	public function getCastingTime() : string {
		return $this->casting_time;
	}

	public function getLevel() : string {
		return $this->level;
	}

	public function getSchool() : string {
		return $this->school;
	}

	public function getClasses() : array {
		return $this->classes;
	}

	public function getSpellAsArray() : array {
		return array(
			'name' 					=> $this->getName(),
			'desc' 					=> $this->getDesc(),
			'higher_level' 	=> $this->getHigherLevel(),
			'page' 					=> $this->getPage(),
			'range' 				=> $this->getRange(),
			'components' 		=> $this->getComponents(),
			'ritual' 				=> $this->getRitual(),
			'duration' 			=> $this->getDuration(),
			'concentration' => $this->getConcentration(),
			'casting_time' 	=> $this->getCastingTime(),
			'level' 				=> $this->getLevel(),
			'school' 				=> $this->getSchool(),
			'classes' 			=> $this->getClasses()
		);
	}
}