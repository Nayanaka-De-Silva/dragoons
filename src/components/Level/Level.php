<?php

namespace Components\Level;

require_once(__DIR__ . '/../../../vendor/autoload.php');

class Level {
  // Default properties
  private int $experiencePoints;

  static private array $levelsArray = array();

  function __construct(int $experiencePoints) {
    $this->experiencePoints = $experiencePoints;
    
    if (empty($this->levelsArray)) {
      Level::$levelsArray = $this->importLevelsFromJSON();
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

  private function importLevelsFromJSON() : array {
    $jsonString = file_get_contents(__DIR__ . '/levels.json');

    $levelData = json_decode($jsonString, true);
  
    return $levelData;
  }
}