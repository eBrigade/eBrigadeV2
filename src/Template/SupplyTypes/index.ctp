<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Supply Type'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="supplyTypes index large-9 medium-8 columns content">
    <h3><?= __('Supply Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('code') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('measure_unit') ?></th>
                <th><?= $this->Paginator->sort('quantity_per_unit') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($supplyTypes as $supplyType): ?>
            <tr>
                <td><?= $this->Number->format($supplyType->id) ?></td>
                <td><?= h($supplyType->code) ?></td>
                <td><?= h($supplyType->name) ?></td>
                <td><?= h($supplyType->measure_unit) ?></td>
                <td><?= $this->Number->format($supplyType->quantity_per_unit) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $supplyType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplyType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplyType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplyType->id)]) ?>
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
