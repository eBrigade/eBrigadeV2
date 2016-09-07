<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Materials Team'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materialsTeams index col-lg-9 col-md-8 columns content">
    <h3><?= __('Materials Teams') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('team_id') ?></th>
                <th><?= $this->Paginator->sort('material_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($materialsTeams as $materialsTeam): ?>
            <tr>
                <td><?= $materialsTeam->has('team') ? $this->Html->link($materialsTeam->team->name, ['controller' => 'Teams', 'action' => 'view', $materialsTeam->team->id]) : '' ?></td>
                <td><?= $materialsTeam->has('material') ? $this->Html->link($materialsTeam->material->id, ['controller' => 'Materials', 'action' => 'view', $materialsTeam->material->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $materialsTeam->team_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $materialsTeam->team_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $materialsTeam->team_id], ['confirm' => __('Are you sure you want to delete # {0}?', $materialsTeam->team_id)]) ?>
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
