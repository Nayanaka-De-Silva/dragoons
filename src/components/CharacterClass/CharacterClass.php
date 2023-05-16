<?php

namespace Components\CharacterClass;

require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Level\Level;

abstract class CharacterClass {
  // Default properties

  private Level $level;

  public function __construct(int $startingExperience = 0) {
    $this->setLevel(new Level($startingExperience));
  }

  public function setLevel(Level $level) {
    $this->level = $level;
  }

  public function getLevel() {
    return $this->level;
  }
}