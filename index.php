<?php

declare(strict_types=1);

namespace App;

require_once('src/utils/debug.php');
require_once('src/controller.php');

// ini_set('display_errors', '0');

// dump($action);

$controller = new Controller($_GET, $_POST);
$controller->run();
