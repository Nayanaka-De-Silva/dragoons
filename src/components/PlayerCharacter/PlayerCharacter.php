<?php

namespace Components\PlayerCharacter;


require_once(__DIR__ . '/../../../vendor/autoload.php');

class PlayerCharacter {
  private string $playerName;
  private string $characterName;
  //private Level $level;

  public function __construct($playerName, $characterName)
  {
    $this->playerName = $playerName;
    $this->characterName = $characterName;
  }

  public function getPlayerName() {
    return $this->playerName;
  }

  public function getCharacterName() {
    return $this->characterName;
  }
}