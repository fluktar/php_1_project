<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/2579630608.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/style.css">
</head>

<body>
    <div class="header">
        <h1><i class="far fa-clipboard"></i>Moje notatki</h1>
    </div>
    <div class="container">
        <div class="menu">
            <ul>
                <li><a href="/phptesty/">Strona główna</a></li>
                <li><a href="/phptesty/?action=create">Nowa notatka</a></li>
            </ul>
        </div>
        <div>
            <?php
            require_once("templates/pages/$page.php");
            ?>
        </div>

    </div>
    <div class="footer">
        <p>Notatki - projekt w kursie PHP</p>
    </div>
</body>

</html>