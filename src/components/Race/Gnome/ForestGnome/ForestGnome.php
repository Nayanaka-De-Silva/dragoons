<?php

namespace Components\Race\Gnome\ForestGnome;

require_once(__DIR__ . '/../../../../vendor/autoload.php');

use Components\Proficiencies\Proficiencies;
use Components\Race\Gnome\Gnome;
use Components\Race\Race;
use Components\Size\Sizes\Sizes;

class ForestGnome extends Gnome {
  private array $abilityScoreIncrease = ['Type'=>'DEX', 'Amount'=>1];
}