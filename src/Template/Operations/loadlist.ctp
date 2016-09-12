<?php
if (!empty($list)): ?>
    <?php foreach ($list as $lis): ?>
        <li class="list-group-item" onclick="clickAction(
        <?= $source ?>, <?= $containerID?>, <?= $lis->id ?>, 'remove', '<?= $containerType?>', '<?= $contentType?>')">
            <?php
            if ($contentType == 'Users') {
                echo $lis->firstname . ' ' . $lis->lastname;
            }
            if ($contentType == 'Materials') {
                echo 'Material id : ' . $lis->id;
            }
            if ($contentType == 'Vehicles') {
                echo 'vehicle ID : ' . $lis->id;
            }
 ?> </li>
    <?php endforeach; ?>
<?php endif; ?>
