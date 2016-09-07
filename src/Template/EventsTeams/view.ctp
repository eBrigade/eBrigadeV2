<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Events Team'), ['action' => 'edit', $eventsTeam->team_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Events Team'), ['action' => 'delete', $eventsTeam->team_id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsTeam->team_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events Teams'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Events Team'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventsTeams view col-lg-9 col-md-8 columns content">
    <h3><?= h($eventsTeam->team_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Team') ?></th>
            <td><?= $eventsTeam->has('team') ? $this->Html->link($eventsTeam->team->name, ['controller' => 'Teams', 'action' => 'view', $eventsTeam->team->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Event') ?></th>
            <td><?= $eventsTeam->has('event') ? $this->Html->link($eventsTeam->event->title, ['controller' => 'Events', 'action' => 'view', $eventsTeam->event->id]) : '' ?></td>
        </tr>
    </table>
</div>
