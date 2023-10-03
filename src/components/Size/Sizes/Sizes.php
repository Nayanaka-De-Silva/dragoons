<?php

namespace Components\Size\Sizes;

require_once(__DIR__ . '/../../../../vendor/autoload.php');

enum Sizes: string {
    case Fine = 'Fine';
    case Diminutive = 'Dimunitive';
    case Tiny = 'Tiny';
    case Small = 'Small';
    case Medium = 'Medium';
    case Large = 'Large';
    case Huge = 'Huge';
    case Gargantuan = 'Gargantuan';
    case Colossal = 'Colossal';
}