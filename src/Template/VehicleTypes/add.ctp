<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Vehicle Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehicleTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($vehicleType) ?>
    <fieldset>
        <legend><?= __('Add Vehicle Type') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('name');
            echo $this->Form->input('type');
            echo $this->Form->input('picture');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
