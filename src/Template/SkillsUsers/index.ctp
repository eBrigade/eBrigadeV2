<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Skills User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Skills'), ['controller' => 'Skills', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Skill'), ['controller' => 'Skills', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="skillsUsers index large-9 medium-8 columns content">
    <h3><?= __('Skills Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('skill_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('date_acquired') ?></th>
                <th><?= $this->Paginator->sort('validity_date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($skillsUsers as $skillsUser): ?>
            <tr>
                <td><?= $skillsUser->has('skill') ? $this->Html->link($skillsUser->skill->name, ['controller' => 'Skills', 'action' => 'view', $skillsUser->skill->id]) : '' ?></td>
                <td><?= $skillsUser->has('user') ? $this->Html->link($skillsUser->user->id, ['controller' => 'Users', 'action' => 'view', $skillsUser->user->id]) : '' ?></td>
                <td><?= h($skillsUser->date_acquired) ?></td>
                <td><?= h($skillsUser->validity_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $skillsUser->skill_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $skillsUser->skill_id,$skillsUser->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $skillsUser->skill_id,$skillsUser->user_id], ['confirm' => __('Are you sure you want to delete # {0} {1}?', $skillsUser->skill_id,$skillsUser->user_id)]) ?>
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
