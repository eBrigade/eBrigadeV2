<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event Team'), ['action' => 'edit', $eventTeam->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event Team'), ['action' => 'delete', $eventTeam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventTeam->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Event Teams'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Team'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventTeams view large-9 medium-8 columns content">
    <h3><?= h($eventTeam->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Team') ?></th>
            <td><?= $eventTeam->has('team') ? $this->Html->link($eventTeam->team->name, ['controller' => 'Teams', 'action' => 'view', $eventTeam->team->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $eventTeam->has('user') ? $this->Html->link($eventTeam->user->id, ['controller' => 'Users', 'action' => 'view', $eventTeam->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Event') ?></th>
            <td><?= $eventTeam->has('event') ? $this->Html->link($eventTeam->event->title, ['controller' => 'Events', 'action' => 'view', $eventTeam->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($eventTeam->id) ?></td>
        </tr>
    </table>
</div>
