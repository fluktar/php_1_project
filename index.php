<?php

declare(strict_types=1);

namespace App;

require_once('src/utils/debug.php');
require_once('src/view.php');

// ini_set('display_errors', '0');

const DEFAULT_ACTION = 'list';


$action = $_GET['action'] ?? DEFAULT_ACTION;
// dump($action);
$view = new View();

$viewParams = [];
if ($action === 'create') {


    $page = 'create';

    $createdNote = false;



    if (!empty($_POST)) {
        $createdNote = true;
        $viewParams = [
            'title' => $_POST['title'],
            'description' => $_POST['description']
        ];
    }
    $viewParams['createdNote'] = $createdNote;
} else {

    $page = 'list';
    $viewParams['resultList'] = "nie udało się stworzyć notatki";
}

$view->render($action, $viewParams);
