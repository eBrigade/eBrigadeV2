<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Barracks User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="barracksUsers index col-lg-9 col-md-8 columns content">
    <h3><?= __('Barracks Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('barrack_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($barracksUsers as $barracksUser): ?>
            <tr>
                <td><?= $barracksUser->has('user') ? $this->Html->link($barracksUser->user->id, ['controller' => 'Users', 'action' => 'view', $barracksUser->user->id]) : '' ?></td>
                <td><?= $barracksUser->has('barrack') ? $this->Html->link($barracksUser->barrack->name, ['controller' => 'Barracks', 'action' => 'view', $barracksUser->barrack->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $barracksUser->barrack_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $barracksUser->barrack_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $barracksUser->barrack_id], ['confirm' => __('Are you sure you want to delete # {0}?', $barracksUser->barrack_id)]) ?>
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
