<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Operation Activity'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="operationActivities index large-9 medium-8 columns content">
    <h3><?= __('Operation Activities') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('coefficient') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($operationActivities as $operationActivity): ?>
            <tr>
                <td><?= $this->Number->format($operationActivity->id) ?></td>
                <td><?= h($operationActivity->coefficient) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $operationActivity->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $operationActivity->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $operationActivity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operationActivity->id)]) ?>
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
