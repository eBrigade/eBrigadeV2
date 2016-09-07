<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Barracks User'), ['action' => 'edit', $barracksUser->barrack_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Barracks User'), ['action' => 'delete', $barracksUser->barrack_id], ['confirm' => __('Are you sure you want to delete # {0}?', $barracksUser->barrack_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Barracks Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Barracks User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="barracksUsers view large-9 medium-8 columns content">
    <h3><?= h($barracksUser->barrack_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $barracksUser->has('user') ? $this->Html->link($barracksUser->user->id, ['controller' => 'Users', 'action' => 'view', $barracksUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Barrack') ?></th>
            <td><?= $barracksUser->has('barrack') ? $this->Html->link($barracksUser->barrack->name, ['controller' => 'Barracks', 'action' => 'view', $barracksUser->barrack->id]) : '' ?></td>
        </tr>
    </table>
</div>
