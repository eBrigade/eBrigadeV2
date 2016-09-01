<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Team'), ['action' => 'edit', $team->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Team'), ['action' => 'delete', $team->id], ['confirm' => __('Are you sure you want to delete # {0}?', $team->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Event Teams'), ['controller' => 'EventTeams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Team'), ['controller' => 'EventTeams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Team Users'), ['controller' => 'TeamUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team User'), ['controller' => 'TeamUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="teams view large-9 medium-8 columns content">
    <h3><?= h($team->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($team->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($team->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($team->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Event Teams') ?></h4>
        <?php if (!empty($team->event_teams)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Team Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($team->event_teams as $eventTeams): ?>
            <tr>
                <td><?= h($eventTeams->team_id) ?></td>
                <td><?= h($eventTeams->user_id) ?></td>
                <td><?= h($eventTeams->event_id) ?></td>
                <td><?= h($eventTeams->id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EventTeams', 'action' => 'view', $eventTeams->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EventTeams', 'action' => 'edit', $eventTeams->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EventTeams', 'action' => 'delete', $eventTeams->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventTeams->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Team Users') ?></h4>
        <?php if (!empty($team->team_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Team Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($team->team_users as $teamUsers): ?>
            <tr>
                <td><?= h($teamUsers->team_id) ?></td>
                <td><?= h($teamUsers->user_id) ?></td>
                <td><?= h($teamUsers->id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TeamUsers', 'action' => 'view', $teamUsers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TeamUsers', 'action' => 'edit', $teamUsers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TeamUsers', 'action' => 'delete', $teamUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teamUsers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
