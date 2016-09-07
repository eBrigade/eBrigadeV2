<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Model Vehicles'), ['controller' => 'ModelVehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Model Vehicle'), ['controller' => 'ModelVehicles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Vehicles'), ['controller' => 'EventVehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Vehicle'), ['controller' => 'EventVehicles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehicles form col-lg-9 col-md-8 columns content">
    <?= $this->Form->create($vehicle) ?>
    <fieldset>
        <legend><?= __('Add Vehicle') ?></legend>
        <?php
            echo $this->Form->input('matriculation');
            echo $this->Form->input('number_kilometer');
            echo $this->Form->input('snow');
            echo $this->Form->input('air_conditionner');
            echo $this->Form->input('type_vehicle_id');
            echo $this->Form->input('model_vehicle_id', ['options' => $modelVehicles, 'empty' => true]);
            echo $this->Form->input('bought', ['empty' => true]);
            echo $this->Form->input('end_warranty', ['empty' => true]);
            echo $this->Form->input('next_revision', ['empty' => true]);
            echo $this->Form->input('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
