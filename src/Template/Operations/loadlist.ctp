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
                echo $lis->material_type->name;
            }
            if ($contentType == 'Vehicles') {
                echo $lis->vehicle_type->name;
            }
 ?> </li>
    <?php endforeach; ?>
<?php endif; ?>
