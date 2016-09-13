<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Teams Vehicle'), ['action' => 'edit', $teamsVehicle->team_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Teams Vehicle'), ['action' => 'delete', $teamsVehicle->team_id], ['confirm' => __('Are you sure you want to delete # {0}?', $teamsVehicle->team_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Teams Vehicles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Teams Vehicle'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="teamsVehicles view large-9 medium-8 columns content">
    <h3><?= h($teamsVehicle->team_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Team') ?></th>
            <td><?= $teamsVehicle->has('team') ? $this->Html->link($teamsVehicle->team->name, ['controller' => 'Teams', 'action' => 'view', $teamsVehicle->team->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $teamsVehicle->has('vehicle') ? $this->Html->link($teamsVehicle->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $teamsVehicle->vehicle->id]) : '' ?></td>
        </tr>
    </table>
</div>
