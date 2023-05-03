<?php

namespace Components\Race;


require_once(__DIR__ . '/../../../vendor/autoload.php');

abstract class Race {
  // Default properties

  private string $name;

  abstract public function getDefaultAge();
  abstract public function getDefaultWeight();
  abstract public function getDefaultHeight();
}