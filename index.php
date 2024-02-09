<?php

declare(strict_types=1);

namespace App;

$configuration = require_once('config/config.php');
require_once('src/utils/debug.php');
require_once('src/controller.php');

$request = ['get' => $_GET, 'post' => $_POST];



// $controller = new Controller($request);
// $controller->run();
Controller::initConfiguration($configuration);
(new Controller($request))->run();
