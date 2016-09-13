<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Skills User'), ['action' => 'edit', $skillsUser->skill_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Skills User'), ['action' => 'delete', $skillsUser->skill_id], ['confirm' => __('Are you sure you want to delete # {0}?', $skillsUser->skill_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Skills Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skills User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Skills'), ['controller' => 'Skills', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skill'), ['controller' => 'Skills', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="skillsUsers view large-9 medium-8 columns content">
    <h3><?= h($skillsUser->skill_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Skill') ?></th>
            <td><?= $skillsUser->has('skill') ? $this->Html->link($skillsUser->skill->name, ['controller' => 'Skills', 'action' => 'view', $skillsUser->skill->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $skillsUser->has('user') ? $this->Html->link($skillsUser->user->id, ['controller' => 'Users', 'action' => 'view', $skillsUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Date Acquired') ?></th>
            <td><?= h($skillsUser->date_acquired) ?></td>
        </tr>
        <tr>
            <th><?= __('Validity Date') ?></th>
            <td><?= h($skillsUser->validity_date) ?></td>
        </tr>
    </table>
</div>
