<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicle Types'), ['controller' => 'VehicleTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle Type'), ['controller' => 'VehicleTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicle Models'), ['controller' => 'VehicleModels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle Model'), ['controller' => 'VehicleModels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehicles index col-lg-9 col-md-8 columns content">
    <h3><?= __('Vehicles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('matriculation') ?></th>
                <th><?= $this->Paginator->sort('number_kilometer') ?></th>
                <th><?= $this->Paginator->sort('snow') ?></th>
                <th><?= $this->Paginator->sort('air_conditionner') ?></th>
                <th><?= $this->Paginator->sort('vehicle_type_id') ?></th>
                <th><?= $this->Paginator->sort('vehicle_model_id') ?></th>
                <th><?= $this->Paginator->sort('bought') ?></th>
                <th><?= $this->Paginator->sort('end_warranty') ?></th>
                <th><?= $this->Paginator->sort('next_revision') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicles as $vehicle): ?>
            <tr>
                <td><?= $this->Number->format($vehicle->id) ?></td>
                <td><?= h($vehicle->matriculation) ?></td>
                <td><?= $this->Number->format($vehicle->number_kilometer) ?></td>
                <td><?= h($vehicle->snow) ?></td>
                <td><?= h($vehicle->air_conditionner) ?></td>
                <td><?= $vehicle->has('vehicle_type') ? $this->Html->link($vehicle->vehicle_type->name, ['controller' => 'VehicleTypes', 'action' => 'view', $vehicle->vehicle_type->id]) : '' ?></td>
                <td><?= $vehicle->has('vehicle_model') ? $this->Html->link($vehicle->vehicle_model->name, ['controller' => 'VehicleModels', 'action' => 'view', $vehicle->vehicle_model->id]) : '' ?></td>
                <td><?= h($vehicle->bought) ?></td>
                <td><?= h($vehicle->end_warranty) ?></td>
                <td><?= h($vehicle->next_revision) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vehicle->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehicle->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehicle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id)]) ?>
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
