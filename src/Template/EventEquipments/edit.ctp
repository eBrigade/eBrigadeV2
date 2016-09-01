<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $eventEquipment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $eventEquipment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Event Equipments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventEquipments form large-9 medium-8 columns content">
    <?= $this->Form->create($eventEquipment) ?>
    <fieldset>
        <legend><?= __('Edit Event Equipment') ?></legend>
        <?php
            echo $this->Form->input('event_id', ['options' => $events, 'empty' => true]);
            echo $this->Form->input('equipment_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
