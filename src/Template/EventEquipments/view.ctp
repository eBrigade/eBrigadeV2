<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event Equipment'), ['action' => 'edit', $eventEquipment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event Equipment'), ['action' => 'delete', $eventEquipment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventEquipment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Event Equipments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Equipment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventEquipments view large-9 medium-8 columns content">
    <h3><?= h($eventEquipment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Event') ?></th>
            <td><?= $eventEquipment->has('event') ? $this->Html->link($eventEquipment->event->title, ['controller' => 'Events', 'action' => 'view', $eventEquipment->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Equipment Id') ?></th>
            <td><?= $this->Number->format($eventEquipment->equipment_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($eventEquipment->id) ?></td>
        </tr>
    </table>
</div>
