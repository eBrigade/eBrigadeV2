<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Events Material'), ['action' => 'edit', $eventsMaterial->event_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Events Material'), ['action' => 'delete', $eventsMaterial->event_id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsMaterial->event_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events Materials'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Events Material'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventsMaterials view large-9 medium-8 columns content">
    <h3><?= h($eventsMaterial->event_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Event') ?></th>
            <td><?= $eventsMaterial->has('event') ? $this->Html->link($eventsMaterial->event->title, ['controller' => 'Events', 'action' => 'view', $eventsMaterial->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Material') ?></th>
            <td><?= $eventsMaterial->has('material') ? $this->Html->link($eventsMaterial->material->id, ['controller' => 'Materials', 'action' => 'view', $eventsMaterial->material->id]) : '' ?></td>
        </tr>
    </table>
</div>
