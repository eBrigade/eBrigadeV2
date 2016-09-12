<?php
if (!empty($team->users)): ?>
    <?php foreach ($team->users as $users): ?>
        <li class="list-group-item" onclick="clickAction(<?= $source ?>, <?= $team->id?>, <?= $users->id ?>, 'remove', '<?= $containerType?>', '<?= $contentType?>')"><?= $users->firstname . ' ' . $users->lastname ?> </li>
    <?php endforeach; ?>
<?php endif; ?>
