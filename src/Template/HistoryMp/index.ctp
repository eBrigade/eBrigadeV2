<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New History Mp'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="historyMp index large-9 medium-8 columns content">
    <h3><?= __('History Mp') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('to_user') ?></th>
                <th><?= $this->Paginator->sort('from_user') ?></th>
                <th><?= $this->Paginator->sort('subject') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('send') ?></th>
                <th><?= $this->Paginator->sort('recipients') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historyMp as $historyMp): ?>
            <tr>
                <td><?= $this->Number->format($historyMp->id) ?></td>
                <td><?= $this->Number->format($historyMp->to_user) ?></td>
                <td><?= $this->Number->format($historyMp->from_user) ?></td>
                <td><?= h($historyMp->subject) ?></td>
                <td><?= h($historyMp->created) ?></td>
                <td><?= h($historyMp->send) ?></td>
                <td><?= h($historyMp->recipients) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $historyMp->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $historyMp->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $historyMp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $historyMp->id)]) ?>
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
