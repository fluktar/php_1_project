<?php

declare(strict_types=1);

namespace App;

// include('src/utils/debug.php');
// include_once('src/utils/debug.php');

require('src/utils/debug.php');

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = null;
}

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="header">
        <h1>Moje notatki</h1>
    </div>
    <div class="container">
        <div class="menu">
            <ul>
                <li><a href="/phptesty/">Lista notatek</a></li>
                <li><a href="/phptesty/?action=create">Nowa notatka</a></li>
            </ul>
        </div>
        <div>
            <?php if ($action === 'create') : ?>
                <h3>nowa notatka</h3>
            <?php else : ?>
                <h4>lista notatek</h4>
            <?php endif; ?>
        </div>

    </div>
    <div class="footer">

    </div>
</body>

</html>