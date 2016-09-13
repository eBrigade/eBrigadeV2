<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vehicle Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehicleTypes index large-9 medium-8 columns content">
    <h3><?= __('Vehicle Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('code') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= $this->Paginator->sort('picture') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicleTypes as $vehicleType): ?>
            <tr>
                <td><?= $this->Number->format($vehicleType->id) ?></td>
                <td><?= h($vehicleType->code) ?></td>
                <td><?= h($vehicleType->name) ?></td>
                <td><?= h($vehicleType->type) ?></td>
                <td><?= h($vehicleType->picture) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vehicleType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehicleType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehicleType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicleType->id)]) ?>
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
