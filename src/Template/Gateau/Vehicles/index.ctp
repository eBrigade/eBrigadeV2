<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Model Vehicles'), ['controller' => 'ModelVehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Model Vehicle'), ['controller' => 'ModelVehicles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Vehicles'), ['controller' => 'EventVehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Vehicle'), ['controller' => 'EventVehicles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehicles index large-9 medium-8 columns content">
    <h3><?= __('Vehicles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('matriculation') ?></th>
                <th><?= $this->Paginator->sort('number_kilometer') ?></th>
                <th><?= $this->Paginator->sort('snow') ?></th>
                <th><?= $this->Paginator->sort('air_conditionner') ?></th>
                <th><?= $this->Paginator->sort('type_vehicle_id') ?></th>
                <th><?= $this->Paginator->sort('model_vehicle_id') ?></th>
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
                <td><?= $this->Number->format($vehicle->type_vehicle_id) ?></td>
                <td><?= $vehicle->has('model_vehicle') ? $this->Html->link($vehicle->model_vehicle->name, ['controller' => 'ModelVehicles', 'action' => 'view', $vehicle->model_vehicle->id]) : '' ?></td>
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
