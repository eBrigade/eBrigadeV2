<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Availability'), ['action' => 'edit', $availability->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Availability'), ['action' => 'delete', $availability->id], ['confirm' => __('Are you sure you want to delete # {0}?', $availability->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Availabilities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Availability'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="availabilities view large-9 medium-8 columns content">
    <h3><?= h($availability->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $availability->has('user') ? $this->Html->link($availability->user->id, ['controller' => 'Users', 'action' => 'view', $availability->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($availability->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($availability->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Result') ?></h4>
        <?= $this->Text->autoParagraph(h($availability->result)); ?>
    </div>
</div>
