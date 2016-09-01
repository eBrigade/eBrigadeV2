<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Event Team'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventTeams index large-9 medium-8 columns content">
    <h3><?= __('Event Teams') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('team_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('event_id') ?></th>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventTeams as $eventTeam): ?>
            <tr>
                <td><?= $eventTeam->has('team') ? $this->Html->link($eventTeam->team->name, ['controller' => 'Teams', 'action' => 'view', $eventTeam->team->id]) : '' ?></td>
                <td><?= $eventTeam->has('user') ? $this->Html->link($eventTeam->user->id, ['controller' => 'Users', 'action' => 'view', $eventTeam->user->id]) : '' ?></td>
                <td><?= $eventTeam->has('event') ? $this->Html->link($eventTeam->event->title, ['controller' => 'Events', 'action' => 'view', $eventTeam->event->id]) : '' ?></td>
                <td><?= $this->Number->format($eventTeam->id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $eventTeam->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventTeam->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventTeam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventTeam->id)]) ?>
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
