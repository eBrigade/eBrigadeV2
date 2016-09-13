<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Notification'), ['action' => 'edit', $notification->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notification'), ['action' => 'delete', $notification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notification->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notification'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notifications view large-9 medium-8 columns content">
    <h3><?= h($notification->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($notification->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Source Id') ?></th>
            <td><?= $this->Number->format($notification->source_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Receiver') ?></th>
            <td><?= $this->Number->format($notification->receiver) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= $this->Number->format($notification->type) ?></td>
        </tr>
    </table>
</div>
