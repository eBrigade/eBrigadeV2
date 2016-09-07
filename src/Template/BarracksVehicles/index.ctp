<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Barracks Vehicle'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="barracksVehicles index large-9 medium-8 columns content">
    <h3><?= __('Barracks Vehicles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('barrack_id') ?></th>
                <th><?= $this->Paginator->sort('vehicle_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($barracksVehicles as $barracksVehicle): ?>
            <tr>
                <td><?= $barracksVehicle->has('barrack') ? $this->Html->link($barracksVehicle->barrack->name, ['controller' => 'Barracks', 'action' => 'view', $barracksVehicle->barrack->id]) : '' ?></td>
                <td><?= $barracksVehicle->has('vehicle') ? $this->Html->link($barracksVehicle->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $barracksVehicle->vehicle->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $barracksVehicle->barrack_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $barracksVehicle->barrack_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $barracksVehicle->barrack_id], ['confirm' => __('Are you sure you want to delete # {0}?', $barracksVehicle->barrack_id)]) ?>
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
