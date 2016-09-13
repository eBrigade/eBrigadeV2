<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Equipment Type'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="equipmentTypes index large-9 medium-8 columns content">
    <h3><?= __('Equipment Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($equipmentTypes as $equipmentType): ?>
            <tr>
                <td><?= $this->Number->format($equipmentType->id) ?></td>
                <td><?= h($equipmentType->title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $equipmentType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $equipmentType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $equipmentType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipmentType->id)]) ?>
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
