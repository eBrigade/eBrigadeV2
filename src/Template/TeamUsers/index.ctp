<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Team User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="teamUsers index large-9 medium-8 columns content">
    <h3><?= __('Team Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('team_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teamUsers as $teamUser): ?>
            <tr>
                <td><?= $teamUser->has('team') ? $this->Html->link($teamUser->team->name, ['controller' => 'Teams', 'action' => 'view', $teamUser->team->id]) : '' ?></td>
                <td><?= $teamUser->has('user') ? $this->Html->link($teamUser->user->id, ['controller' => 'Users', 'action' => 'view', $teamUser->user->id]) : '' ?></td>
                <td><?= $this->Number->format($teamUser->id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $teamUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $teamUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $teamUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teamUser->id)]) ?>
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
