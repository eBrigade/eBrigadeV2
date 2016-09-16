<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Events Team'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventsTeams index large-9 medium-8 columns content">
    <h3><?= __('Events Teams') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('team_id') ?></th>
                <th><?= $this->Paginator->sort('event_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventsTeams as $eventsTeam): ?>
            <tr>
                <td><?= $eventsTeam->has('team') ? $this->Html->link($eventsTeam->team->name, ['controller' => 'Teams', 'action' => 'view', $eventsTeam->team->id]) : '' ?></td>
                <td><?= $eventsTeam->has('event') ? $this->Html->link($eventsTeam->event->title, ['controller' => 'Events', 'action' => 'view', $eventsTeam->event->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $eventsTeam->team_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventsTeam->team_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventsTeam->team_id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsTeam->team_id)]) ?>
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
