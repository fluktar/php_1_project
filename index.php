<?php

declare(strict_types=1);

namespace App;

// include('src/utils/debug.php');
// include_once('src/utils/debug.php');

require_once('src/utils/debug.php');
require_once('src/view.php');

$action = $_GET['action'] ?? null;

$view = new View();
$view->render($action);
