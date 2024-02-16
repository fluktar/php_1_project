<div class="list">
  <section>

    <div class="message">
      <?php
      if (!empty($params['error'])) {
        switch ($params['error']) {
          case 'missingNoteId':
            echo 'Brak identyfikatora notatki !!!';
            break;
          case 'noteNotFound':
            echo 'Notatka nie została znaleziona !!!';
            break;
        }
      }
      ?>
    </div>

    <div class="message">
      <?php
      if (!empty($params['before'])) {
        switch ($params['before']) {
          case 'created':
            echo 'Notatka została utworzona !!!';
            break;
          case 'edited':
            echo 'Notatka została zaktualizowana !!!';
            break;
          case 'deleted':
            echo 'Notatka została usunięta !!!';
            break;
        }
      }
      ?>
    </div>

    <?php
    $sort = $params['sort'] ?? [];
    $by = $sort['by'] ?? 'title';
    $order = $sort['order'] ?? 'desc';
    ?>



    <div>
      <form action="/phptesty/" method="GET" class="settings-form">
        <div>
          <div>Sortuj po:</div>
          <label for="">Tytule:
            <input name="sortby" type="radio" value="title" <?php echo $by === 'title' ? 'checked' : ''  ?>>
          </label>
          <label for="">Dacie:
            <input name="sortby" type="radio" value="created" <?php echo $by === 'created' ? 'checked' : ''  ?>>
        </div>
        <div>
          <div>Kierunek sortowania</div>
          <label for="">Rosnąco:
            <input name="sortorder" type="radio" value="asc" <?php echo $order === 'asc' ? 'checked' : ''  ?>>
            <label for="">Malejąco:
              <input name="sortorder" type="radio" value="desc" <?php echo $order === 'desc' ? 'checked' : ''  ?>>
        </div>
        <input type="submit" value="Wyślij" />
      </form>
    </div>

    <div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
        <thead>
          <tr>
            <th>Id</th>
            <th>Tytuł</th>
            <th>Data</th>
            <th>Opcje</th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="tbl-content">
      <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
          <?php foreach ($params['notes'] ?? [] as $note) : ?>
            <tr>
              <td><?php echo $note['id'] ?></td>
              <td><?php echo $note['title'] ?></td>
              <td><?php echo $note['created'] ?></td>
              <td>
                <a href="/phptesty/?action=show&id=<?php echo $note['id'] ?>">
                  <button>Szczegóły</button>
                </a>
                <a href="/phptesty/?action=delete&id=<?php echo $note['id'] ?>">
                  <button>Usuń</button>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>


  </section>

</div>