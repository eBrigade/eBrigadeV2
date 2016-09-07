<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Operation Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="operationTypes index col-lg-9 col-md-8 columns content">
    <h3><?= __('Operation Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('min') ?></th>
                <th><?= $this->Paginator->sort('max') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($operationTypes as $operationType): ?>
            <tr>
                <td><?= $this->Number->format($operationType->id) ?></td>
                <td><?= h($operationType->title) ?></td>
                <td><?= $this->Number->format($operationType->min) ?></td>
                <td><?= $this->Number->format($operationType->max) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $operationType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $operationType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $operationType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operationType->id)]) ?>
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
