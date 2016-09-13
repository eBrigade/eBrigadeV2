<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usersVehicle->vehicle_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usersVehicle->vehicle_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users Vehicles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersVehicles form large-9 medium-8 columns content">
    <?= $this->Form->create($usersVehicle) ?>
    <fieldset>
        <legend><?= __('Edit Users Vehicle') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
