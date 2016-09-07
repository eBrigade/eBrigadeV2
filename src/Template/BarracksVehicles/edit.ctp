<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $barracksVehicle->barrack_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $barracksVehicle->barrack_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Barracks Vehicles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="barracksVehicles form col-lg-9 col-md-8 columns content">
    <?= $this->Form->create($barracksVehicle) ?>
    <fieldset>
        <legend><?= __('Edit Barracks Vehicle') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
