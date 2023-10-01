<?php

namespace Components\Abilities;

require_once(__DIR__ . '/../../../vendor/autoload.php');

class Abilities {
  // Ability score
  protected int $strengthScore;
  protected int $dexterityScore;
  protected int $constitutionScore;
  protected int $intelligenceScore;
  protected int $wisdomScore;
  protected int $charismaScore;

  public function __construct($strengthScore, $dexterityScore, $constitutionScore, $intelligenceScore, $wisdomScore, $charismaScore) {
    $this->strengthScore = $strengthScore;
    $this->dexterityScore = $dexterityScore;
    $this->constitutionScore = $constitutionScore;
    $this->intelligenceScore = $intelligenceScore;
    $this->wisdomScore = $wisdomScore;
    $this->charismaScore = $charismaScore;
  }

  // ----------------------------------------------------------------
  // Ability Score Methods

  public function IncreaseAbilityScore(int $amount, string $type) {
    switch($type) {
      case 'STR':
        $this->strengthScore += $amount;
        break;
      case 'DEX':
        $this->dexterityScore += $amount;
        break;
      case 'CON':
        $this->constitutionScore += $amount;
        break;
      case 'INT':
        $this->intelligenceScore += $amount;
      case 'WIS':
        $this->wisdomScore += $amount;
        break;
      case 'CHA':
        $this->charismaScore += $amount;
        break;
      default:
        throw new \Exception('Cannot find Ability Type');
    }
  }

  public function getAbilityScore(string $type): int {
    switch($type) {
      case 'STR':
        return $this->getStrengthScore();
      case 'DEX':
        return $this->getDexterityScore();
      case 'CON':
        return $this->getConstitutionScore();
      case 'INT':
        return $this->getIntelligenceScore();
      case 'WIS':
        return $this->getWisdomScore();
      case 'CHA':
        return $this->getCharismaScore();
      default:
        throw new \Exception("Cannot find Ability Type");
    }
  }

  public function getStrengthScore(): int {
    return $this->strengthScore;
  }

  public function getDexterityScore(): int {
    return $this->dexterityScore;
  }

  public function getConstitutionScore(): int {
    return $this->constitutionScore;
  }

  public function getIntelligenceScore(): int {
    return $this->intelligenceScore;
  }

  public function getWisdomScore(): int {
    return $this->wisdomScore;
  }
  
  public function getCharismaScore(): int {
    return $this->charismaScore;
  }

  // ----------------------------------------------------------------
  // Ability Modifier Methods

  public function getStrengthModifier(): int {
    return $this->getModiferFromScore($this->strengthScore);
  }

  public function getDexterityModifier(): int {
    return $this->getModiferFromScore($this->dexterityScore);
  }

  public function getConstitutionModifier(): int {
    return $this->getModiferFromScore($this->constitutionScore);
  }

  public function getIntelligenceModifier(): int {
    return $this->getModiferFromScore($this->intelligenceScore);
  }

  public function getWisdomModifier(): int {
    return $this->getModiferFromScore($this->wisdomScore);
  }

  public function getCharismaModifier(): int {
    return $this->getModiferFromScore($this->charismaScore);
  }

  private function getModiferFromScore(int $score): int {
    return floor(($score - 10) / 2);
  }


}