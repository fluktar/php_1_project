<div>
    <h3>nowa notatka</h3>
    <?php if ($params['createdNote']) : ?>
        <div>
            <div>Tytuł: <?php echo $params["title"] ?> </div>
            <div>Notatka treść:<?php echo $params['description'] ?> </div>
        </div>
    <?php else : ?>
        <form action="/?action=create" class="note-form" method="post">
            <ul>
                <li>
                    <label>Tytuł <span class="required">*</span> </label>
                    <input type="text" class="field-long" name="title">
                </li>
                <li>
                    <label>Opis</label>
                    <textarea name="description" id="field5" class="field-long field-textarea"></textarea>
                </li>
                <li>
                    <input type="submit" value="Submit" id="submit">
                </li>
            </ul>
        </form>
    <?php endif; ?>
</div>