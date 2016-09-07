<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Materials Team'), ['action' => 'edit', $materialsTeam->team_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Materials Team'), ['action' => 'delete', $materialsTeam->team_id], ['confirm' => __('Are you sure you want to delete # {0}?', $materialsTeam->team_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Materials Teams'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Materials Team'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="materialsTeams view large-9 medium-8 columns content">
    <h3><?= h($materialsTeam->team_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Team') ?></th>
            <td><?= $materialsTeam->has('team') ? $this->Html->link($materialsTeam->team->name, ['controller' => 'Teams', 'action' => 'view', $materialsTeam->team->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Material') ?></th>
            <td><?= $materialsTeam->has('material') ? $this->Html->link($materialsTeam->material->id, ['controller' => 'Materials', 'action' => 'view', $materialsTeam->material->id]) : '' ?></td>
        </tr>
    </table>
</div>
