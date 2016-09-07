<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Material'), ['action' => 'edit', $userMaterial->user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Material'), ['action' => 'delete', $userMaterial->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $userMaterial->user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Materials'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Material'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userMaterials view large-9 medium-8 columns content">
    <h3><?= h($userMaterial->user_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $userMaterial->has('user') ? $this->Html->link($userMaterial->user->id, ['controller' => 'Users', 'action' => 'view', $userMaterial->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Material') ?></th>
            <td><?= $userMaterial->has('material') ? $this->Html->link($userMaterial->material->id, ['controller' => 'Materials', 'action' => 'view', $userMaterial->material->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('From Date') ?></th>
            <td><?= h($userMaterial->from_date) ?></td>
        </tr>
        <tr>
            <th><?= __('To Date') ?></th>
            <td><?= h($userMaterial->to_date) ?></td>
        </tr>
    </table>
</div>
