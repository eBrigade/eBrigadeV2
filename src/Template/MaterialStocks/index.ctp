<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Material Stock'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materialStocks index large-9 medium-8 columns content">
    <h3><?= __('Material Stocks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('material_id') ?></th>
                <th><?= $this->Paginator->sort('stock') ?></th>
                <th><?= $this->Paginator->sort('affectation') ?></th>
                <th><?= $this->Paginator->sort('affectation_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($materialStocks as $materialStock): ?>
            <tr>
                <td><?= $this->Number->format($materialStock->id) ?></td>
                <td><?= $materialStock->has('material') ? $this->Html->link($materialStock->material->name, ['controller' => 'Materials', 'action' => 'view', $materialStock->material->id]) : '' ?></td>
                <td><?= $this->Number->format($materialStock->stock) ?></td>
                <td><?= h($materialStock->affectation) ?></td>
                <td><?= $this->Number->format($materialStock->affectation_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $materialStock->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $materialStock->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $materialStock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materialStock->id)]) ?>
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
