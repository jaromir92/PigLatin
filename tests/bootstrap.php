<?php

require __DIR__ . '/../vendor/autoload.php';

use Nette\Configurator;

Tester\Environment::setup();

$configurator = new Configurator;

$configurator->setDebugMode(true);
$configurator->enableTracy(__DIR__ . '/../log');

$configurator->setTimeZone('Europe/Prague');
$configurator->setTempDirectory(__DIR__ . '/../temp');

$configurator->createRobotLoader()
        ->addDirectory(__DIR__ . '/../app')
        ->register();

$configurator->addConfig(__DIR__ . '/../app/config/common.neon');

return $configurator->createContainer();