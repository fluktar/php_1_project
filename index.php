<?php

declare(strict_types=1);

namespace App;

require_once('src/utils/debug.php');
require_once('src/view.php');

// ini_set('display_errors', '0');

const DEFAULT_ACTION = 'list';


$action = $_GET['action'] ?? DEFAULT_ACTION;

$view = new View();

$viewParams = [];
if ($action === 'create') {
    $page = 'create';
    $viewParams['resultCrate'] = "notatka została stworzona";
} else {
    $page = 'list';
    $viewParams['resultList'] = "nie udało się stworzyć notatki";
}

$view->render($action, $viewParams);
