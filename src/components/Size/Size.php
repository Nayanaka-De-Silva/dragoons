<?php

namespace Components\Size;

require_once(__DIR__ . '/../../../vendor/autoload.php');

use Components\Size\Sizes\Sizes;

class Size {
    private Sizes $size;
    
    public function __construct(Sizes $size = Sizes::Medium) {
        $this->size = $size;
    }

    public function getSize() {
        return $this->size;
    }

    public function getSpace() {
        $space = null;
        switch($this->size){
					case Sizes::Fine:
						$space = 0.5;
						break;
					case Sizes::Diminutive:
						$space = 1;
						break;
					case Sizes::Tiny:
						$space = 2.5;
						break;
					case Sizes::Small:
					case Sizes::Medium:
						$space = 5;
						break;
					case Sizes::Large:
						$space = 10;
						break;
					case Sizes::Huge:
						$space = 15;
						break;
					case Sizes::Gargantuan:
						$space = 20;
						break;
					case Sizes::Colossal:
						$space = 30;
						break;
				};
				return $space;
    }

    public function getSizeAsString() {
        return $this->size->value;
    }
}