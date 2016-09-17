<?php
if (!empty($list)): ?>
    <?php foreach ($list as $lis): ?>
        <li class="list-group-item" >
            <?php
            if ($contentType == 'Users') {
                echo $lis->firstname . ' ' . $lis->lastname;
            }
            if ($contentType == 'Materials') {
                echo $lis->name;
            }
            if ($contentType == 'Vehicles') {
                echo $lis->vehicle_type->name;
            }
 ?> </li>
    <?php endforeach; ?>
<?php endif; ?>
