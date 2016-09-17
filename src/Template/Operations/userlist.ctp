
<?php if (!empty($userlist)): ?>
    <?php foreach ($userlist as $users): ?>

        <li class="list-group-item action-btn">
            <?= $users->firstname . ' ' . $users->lastname; ?>
        </li>
    <?php endforeach; ?>
<?php endif; ?>