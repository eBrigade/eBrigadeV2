<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Barracks Vehicle'), ['action' => 'edit', $barracksVehicle->barrack_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Barracks Vehicle'), ['action' => 'delete', $barracksVehicle->barrack_id], ['confirm' => __('Are you sure you want to delete # {0}?', $barracksVehicle->barrack_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Barracks Vehicles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Barracks Vehicle'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="barracksVehicles view large-9 medium-8 columns content">
    <h3><?= h($barracksVehicle->barrack_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Barrack') ?></th>
            <td><?= $barracksVehicle->has('barrack') ? $this->Html->link($barracksVehicle->barrack->name, ['controller' => 'Barracks', 'action' => 'view', $barracksVehicle->barrack->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $barracksVehicle->has('vehicle') ? $this->Html->link($barracksVehicle->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $barracksVehicle->vehicle->id]) : '' ?></td>
        </tr>
    </table>
</div>
