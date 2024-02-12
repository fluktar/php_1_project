<?php

declare(strict_types=1);

namespace App;

use App\Exception\AppException;

$configuration = require_once('config/config.php');
require_once('src/utils/debug.php');
require_once('src/controller.php');


$request = ['get' => $_GET, 'post' => $_POST];

try {

    // $controller = new Controller($request);
    // $controller->run();
    Controller::initConfiguration($configuration);
    (new Controller($request))->run();
} catch (AppException $e) {
    echo ('<h1>Wystąpił błąd w aplikacji</h1>');
    echo ('<h3>' . $e->getMessage() . '</h3>');
} catch (\Throwable $e) {

    echo ('<h1>Wystąpił błąd w aplikacji</h1>');
    dump($e);
}
