<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Operation Environment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="operationEnvironments index large-9 medium-8 columns content">
    <h3><?= __('Operation Environments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('coefficient') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($operationEnvironments as $operationEnvironment): ?>
            <tr>
                <td><?= $this->Number->format($operationEnvironment->id) ?></td>
                <td><?= $this->Number->format($operationEnvironment->coefficient) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $operationEnvironment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $operationEnvironment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $operationEnvironment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operationEnvironment->id)]) ?>
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
