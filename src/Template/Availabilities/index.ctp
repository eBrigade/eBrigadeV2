<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Availability'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="availabilities index large-9 medium-8 columns content">
    <h3><?= __('Availabilities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($availabilities as $availability): ?>
            <tr>
                <td><?= $this->Number->format($availability->id) ?></td>
                <td><?= $availability->has('user') ? $this->Html->link($availability->user->id, ['controller' => 'Users', 'action' => 'view', $availability->user->id]) : '' ?></td>
                <td><?= h($availability->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $availability->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $availability->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $availability->id], ['confirm' => __('Are you sure you want to delete # {0}?', $availability->id)]) ?>
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
