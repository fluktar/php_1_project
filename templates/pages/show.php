<div class="show">
    <?php $note = $params['note'] ?? null; ?>
    <?php if ($note) : ?>

        <ul>
            <li>ID: <?php echo $note['id'] ?></li>
            <li>Tytuł: <?php echo htmlentities($note['title']) ?></li>
            <li>Opis: <?php echo htmlentities($note['description']) ?> </li>
            <li>Utworzono: <?php echo htmlentities($note['created']) ?></li>

        </ul>
        <a href="/phptesty/?action=list"><button>Powrót</button></a>
    <?php else : ?>
        <div class="message">
            Brak notatki do wyświetlenia</div>
    <?php endif ?>
</div>