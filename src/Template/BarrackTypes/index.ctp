<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Barrack Type'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="barrackTypes index col-lg-9 col-md-8 columns content">
    <h3><?= __('Barrack Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($barrackTypes as $barrackType): ?>
            <tr>
                <td><?= $this->Number->format($barrackType->id) ?></td>
                <td><?= h($barrackType->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $barrackType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $barrackType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $barrackType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $barrackType->id)]) ?>
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
