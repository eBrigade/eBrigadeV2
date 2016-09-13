<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Vehicle'), ['action' => 'edit', $usersVehicle->vehicle_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Vehicle'), ['action' => 'delete', $usersVehicle->vehicle_id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersVehicle->vehicle_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Vehicles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Vehicle'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersVehicles view large-9 medium-8 columns content">
    <h3><?= h($usersVehicle->vehicle_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $usersVehicle->has('user') ? $this->Html->link($usersVehicle->user->id, ['controller' => 'Users', 'action' => 'view', $usersVehicle->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $usersVehicle->has('vehicle') ? $this->Html->link($usersVehicle->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $usersVehicle->vehicle->id]) : '' ?></td>
        </tr>
    </table>
</div>
