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

    $page = $params['page'] ?? [];
    $size = $page['size'] ?? 10;
    $currentPage = $page['number'] ?? 1;
    $pages = $page['pages'] ?? 1;
    $phrase = $params['phrase'] ?? null;

    ?>



    <div>
      <form action="/phptesty/" method="GET" class="settings-form">
        <div>
          <label for="">Wyszukaj: <input type="text" name="phrase"></label>

        </div>
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
        <div>
          <div>Rozmiar paczki</div>
          <label for="">1 <input type="radio" value="1" name="pagesize" <?php echo $size === 1 ? 'checked' : '' ?>> </label>
          <label for="">5 <input type="radio" value="5" name="pagesize" <?php echo $size === 5 ? 'checked' : '' ?>> </label>
          <label for="">10 <input type="radio" value="10" name="pagesize" <?php echo $size === 10 ? 'checked' : '' ?>> </label>
          <label for="">25 <input type="radio" value="25" name="pagesize" <?php echo $size === 25 ? 'checked' : '' ?>> </label>
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
    <?php $paginationUrl =  "&phrase=$phrase&pagesize=$size?sortby=$by&sortorder-$order";  ?>
    <ul class="pagination">
      <?php if ($currentPage !== 1) :  ?>
        <li>
          <a href="/phptesty/?page=<?php echo $currentPage - 1 . $paginationUrl ?>">
            <button>
              << </button>
          </a>
        </li>
      <?php endif; ?>
      <?php for ($i = 1; $i < $pages; $i++) { ?>
        <li>
          <a href="/phptesty/?page=<?php echo $i ?>&pagesize=<?php echo $size ?>?sortby=<?php echo $by ?>&sortorder=<?php echo $order  ?>">
            <button>
              <?php echo $i ?>
            </button>
          </a>
        </li>
      <?php } ?>
      <?php if ($currentPage < $pages) : ?>
        <li>
          <a href="/phptesty/?page=<?php echo $currentPage + 1 . $paginationUrl ?>">
            <button>
              >>
            </button>
          </a>
        </li>
      <?php endif; ?>

    </ul>

  </section>

</div>