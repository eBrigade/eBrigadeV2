<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Events Vehicle'), ['action' => 'edit', $eventsVehicle->event_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Events Vehicle'), ['action' => 'delete', $eventsVehicle->event_id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsVehicle->event_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events Vehicles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Events Vehicle'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventsVehicles view col-lg-9 col-md-8 columns content">
    <h3><?= h($eventsVehicle->event_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Event') ?></th>
            <td><?= $eventsVehicle->has('event') ? $this->Html->link($eventsVehicle->event->title, ['controller' => 'Events', 'action' => 'view', $eventsVehicle->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $eventsVehicle->has('vehicle') ? $this->Html->link($eventsVehicle->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $eventsVehicle->vehicle->id]) : '' ?></td>
        </tr>
    </table>
</div>
