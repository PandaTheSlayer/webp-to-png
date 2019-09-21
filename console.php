#!/usr/bin/env php

<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Converter\ConverterCommand;

$app = new Application();
$app->add(new ConverterCommand());
$app->run();
