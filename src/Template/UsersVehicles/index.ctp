<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Users Vehicle'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersVehicles index large-9 medium-8 columns content">
    <h3><?= __('Users Vehicles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('vehicle_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usersVehicles as $usersVehicle): ?>
            <tr>
                <td><?= $usersVehicle->has('user') ? $this->Html->link($usersVehicle->user->id, ['controller' => 'Users', 'action' => 'view', $usersVehicle->user->id]) : '' ?></td>
                <td><?= $usersVehicle->has('vehicle') ? $this->Html->link($usersVehicle->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $usersVehicle->vehicle->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usersVehicle->vehicle_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersVehicle->vehicle_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersVehicle->vehicle_id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersVehicle->vehicle_id)]) ?>
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
