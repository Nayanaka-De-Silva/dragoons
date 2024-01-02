<?php

namespace Components\Level;

use Components\JSONImporter\JSONImporter;

require_once(__DIR__ . '/../../../vendor/autoload.php');

class Level {
  // Default properties
  private int $experiencePoints;
  private string $levelsFilePath = __DIR__ . '/levels.json';

  static private array $levelsArray = array();

  function __construct(int $experiencePoints) {
    $this->experiencePoints = $experiencePoints;
    
    if (empty($this->levelsArray)) {
      Level::$levelsArray = JSONImporter::importFromJSON($this->levelsFilePath);
    }
  }
  
  /**
   * getCurrentLevel
   * Obtains the current level of the player based on the current experience.
   * Uses a reverse search function to find the closest experience requirement for the given level.
   * 
   * @return int
   */
  public function getCurrentLevel() : int {
    foreach (array_reverse(Level::$levelsArray, true) as $level => $levelInfo) {
      if ($level != 1 && $this->experiencePoints >= $levelInfo['experience_points']) 
        return $level;
      else if ($level == 1 && $this->experiencePoints >= $levelInfo['experience_points'])
        return $level;
    }
    throw new \Exception("Level not found based on current experience points");
  }

  public function getCurrentProficiencyBonus() : int {
    return Level::$levelsArray[$this->getCurrentLevel()]['proficiency'];
  }
}