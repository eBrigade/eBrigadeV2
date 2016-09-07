<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bills'), ['controller' => 'Bills', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bill'), ['controller' => 'Bills', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Types'), ['controller' => 'EventTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Type'), ['controller' => 'EventTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rescue Plans'), ['controller' => 'RescuePlans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rescue Plan'), ['controller' => 'RescuePlans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="events form large-9 medium-8 columns content">
    <?= $this->Form->create($event) ?>
    <fieldset>
        <legend><?= __('Add Event') ?></legend>
        <?php
            echo $this->Form->input('city_id', ['options' => $cities, 'empty' => true]);
            echo $this->Form->input('bill_id', ['options' => $bills, 'empty' => true]);
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
            echo $this->Form->input('details');
            echo $this->Form->input('barrack_id', ['options' => $barracks, 'empty' => true]);
            echo $this->Form->input('event_start_date', ['empty' => true]);
            echo $this->Form->input('event_end_date', ['empty' => true]);
            echo $this->Form->input('horaires');
            echo $this->Form->input('public');
            echo $this->Form->input('event_type_id', ['options' => $eventTypes, 'empty' => true]);
            echo $this->Form->input('materials._ids', ['options' => $materials]);
            echo $this->Form->input('teams._ids', ['options' => $teams]);
            echo $this->Form->input('vehicles._ids', ['options' => $vehicles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
