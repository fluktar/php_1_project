<div class="show">
    <?php $note = $params['note'] ?? null; ?>
    <?php if ($note) : ?>

        <ul>
            <li>ID: <?php echo $note['id'] ?></li>
            <li>Tytuł: <?php echo ($note['title']) ?></li>
            <li>Opis: <?php echo ($note['description']) ?> </li>
            <li>Utworzono: <?php echo ($note['created']) ?></li>

        </ul>
        <form method="POST" action="/phptesty/?action=delete">
            <input name="id" type="hidden" value="  <?php echo $note['id'] ?>" />
            <input type="submit" value="usuń!">
        </form>
    <?php else : ?>
        <div class="message">
            Brak notatki do wyświetlenia</div>
    <?php endif ?>
    <a href="/phptesty/?action=list"><button>Powrót</button></a>

</div>