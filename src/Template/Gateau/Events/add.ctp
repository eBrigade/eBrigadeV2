<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Equipments'), ['controller' => 'EventEquipments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Equipment'), ['controller' => 'EventEquipments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Teams'), ['controller' => 'EventTeams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Team'), ['controller' => 'EventTeams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Vehicles'), ['controller' => 'EventVehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Vehicle'), ['controller' => 'EventVehicles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="events form col-lg-9 col-md-8 columns content">
    <?= $this->Form->create($event) ?>
    <fieldset>
        <legend><?= __('Add Event') ?></legend>
        <?php
            echo $this->Form->input('city_id', ['options' => $cities, 'empty' => true]);
            echo $this->Form->input('creator_id');
            echo $this->Form->input('bill_id');
            echo $this->Form->input('title');
            echo $this->Form->input('address');
            echo $this->Form->input('latitude');
            echo $this->Form->input('longitude');
            echo $this->Form->input('is_closed');
            echo $this->Form->input('closed', ['empty' => true]);
            echo $this->Form->input('price');
            echo $this->Form->input('canceled');
            echo $this->Form->input('canceled_detail');
            echo $this->Form->input('is_active');
            echo $this->Form->input('instructions');
            echo $this->Form->input('responsible_id');
            echo $this->Form->input('details');
            echo $this->Form->input('barrack_id', ['options' => $barracks, 'empty' => true]);
            echo $this->Form->input('event_start_date', ['empty' => true]);
            echo $this->Form->input('event_end_date', ['empty' => true]);
            echo $this->Form->input('horaires');
            echo $this->Form->input('public');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
