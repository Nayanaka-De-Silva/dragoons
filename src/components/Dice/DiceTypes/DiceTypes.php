<?php

namespace Components\Dice\DiceTypes;

require_once(__DIR__ . '/../../../../vendor/autoload.php');

enum DiceTypes : int {
	case d4 = 4;
	case d6 = 6;
	case d8 = 8;
	case d10 = 10;
	case d12 = 12;
	case d20 = 20;
	case d100 = 100;
}
