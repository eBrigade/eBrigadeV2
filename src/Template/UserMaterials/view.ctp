<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Material'), ['action' => 'edit', $userMaterial->user_id,$userMaterial->material_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Material'), ['action' => 'delete', $userMaterial->user_id,$userMaterial->material_id], ['confirm' => __('Are you sure you want to delete # {0} - {1}?', $userMaterial->user_id,$userMaterial->material_id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Materials'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Material'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userMaterials view large-9 medium-8 columns content">
    <h3><?= h($userMaterial->user->firstname.' '.$userMaterial->user->lastname) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $userMaterial->has('user') ? $this->Html->link($userMaterial->user->firstname.' '.$userMaterial->user->lastname, ['controller' => 'Users', 'action' => 'view', $userMaterial->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Material') ?></th>
            <td><?= $userMaterial->has('material') ? $this->Html->link($userMaterial->material->material_type->name, ['controller' => 'Materials', 'action' => 'view', $userMaterial->material->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($userMaterial->quantity) ?></td>
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
