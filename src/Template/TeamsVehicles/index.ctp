<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Teams Vehicle'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="teamsVehicles index large-9 medium-8 columns content">
    <h3><?= __('Teams Vehicles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('team_id') ?></th>
                <th><?= $this->Paginator->sort('vehicle_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teamsVehicles as $teamsVehicle): ?>
            <tr>
                <td><?= $teamsVehicle->has('team') ? $this->Html->link($teamsVehicle->team->name, ['controller' => 'Teams', 'action' => 'view', $teamsVehicle->team->id]) : '' ?></td>
                <td><?= $teamsVehicle->has('vehicle') ? $this->Html->link($teamsVehicle->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $teamsVehicle->vehicle->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $teamsVehicle->team_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $teamsVehicle->team_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $teamsVehicle->team_id], ['confirm' => __('Are you sure you want to delete # {0}?', $teamsVehicle->team_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
