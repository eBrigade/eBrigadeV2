<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="operations index large-9 medium-8 columns content">
    <h3><?= __('Operations') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('barrack_id') ?></th>
                <th><?= $this->Paginator->sort('city_id') ?></th>
                <th><?= $this->Paginator->sort('date') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($operations as $operation): ?>
            <tr>
                <td><?= $this->Number->format($operation->id) ?></td>
                <td><?= $operation->has('barrack') ? $this->Html->link($operation->barrack->name, ['controller' => 'Barracks', 'action' => 'view', $operation->barrack->id]) : '' ?></td>
                <td><?= $operation->has('city') ? $this->Html->link($operation->city->id, ['controller' => 'Cities', 'action' => 'view', $operation->city->id]) : '' ?></td>
                <td><?= h($operation->date) ?></td>
                <td><?= h($operation->title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Vue opérationelle'), ['action' => 'operationnel', $operation->id]) ?>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $operation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $operation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $operation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operation->id)]) ?>
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
