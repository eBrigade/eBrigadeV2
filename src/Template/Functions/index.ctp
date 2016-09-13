<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Function'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="functions index large-9 medium-8 columns content">
    <h3><?= __('Functions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($functions as $function): ?>
            <tr>
                <td><?= $this->Number->format($function->id) ?></td>
                <td><?= h($function->title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $function->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $function->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $function->id], ['confirm' => __('Are you sure you want to delete # {0}?', $function->id)]) ?>
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
