<?php 

require_once(__DIR__ . '/vendor/autoload.php');

use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new Commands\Spellbook());
$application->run();