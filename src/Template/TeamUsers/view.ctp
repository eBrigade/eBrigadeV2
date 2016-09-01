<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Team User'), ['action' => 'edit', $teamUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Team User'), ['action' => 'delete', $teamUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teamUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Team Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="teamUsers view large-9 medium-8 columns content">
    <h3><?= h($teamUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Team') ?></th>
            <td><?= $teamUser->has('team') ? $this->Html->link($teamUser->team->name, ['controller' => 'Teams', 'action' => 'view', $teamUser->team->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $teamUser->has('user') ? $this->Html->link($teamUser->user->id, ['controller' => 'Users', 'action' => 'view', $teamUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($teamUser->id) ?></td>
        </tr>
    </table>
</div>
