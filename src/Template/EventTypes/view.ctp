<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event Type'), ['action' => 'edit', $eventType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event Type'), ['action' => 'delete', $eventType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Event Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventTypes view large-9 medium-8 columns content">
    <h3><?= h($eventType->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($eventType->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($eventType->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Module') ?></th>
            <td><?= h($eventType->module) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($eventType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Events') ?></h4>
        <?php if (!empty($eventType->events)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('City Id') ?></th>
                <th><?= __('Bill Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Latitude') ?></th>
                <th><?= __('Longitude') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Is Closed') ?></th>
                <th><?= __('Closed') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Canceled') ?></th>
                <th><?= __('Canceled Detail') ?></th>
                <th><?= __('Is Active') ?></th>
                <th><?= __('Instructions') ?></th>
                <th><?= __('Details') ?></th>
                <th><?= __('Barrack Id') ?></th>
                <th><?= __('Event Start Date') ?></th>
                <th><?= __('Event End Date') ?></th>
                <th><?= __('Horaires') ?></th>
                <th><?= __('Public') ?></th>
                <th><?= __('Event Type Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($eventType->events as $events): ?>
            <tr>
                <td><?= h($events->id) ?></td>
                <td><?= h($events->city_id) ?></td>
                <td><?= h($events->bill_id) ?></td>
                <td><?= h($events->title) ?></td>
                <td><?= h($events->address) ?></td>
                <td><?= h($events->latitude) ?></td>
                <td><?= h($events->longitude) ?></td>
                <td><?= h($events->created) ?></td>
                <td><?= h($events->modified) ?></td>
                <td><?= h($events->is_closed) ?></td>
                <td><?= h($events->closed) ?></td>
                <td><?= h($events->price) ?></td>
                <td><?= h($events->canceled) ?></td>
                <td><?= h($events->canceled_detail) ?></td>
                <td><?= h($events->is_active) ?></td>
                <td><?= h($events->instructions) ?></td>
                <td><?= h($events->details) ?></td>
                <td><?= h($events->barrack_id) ?></td>
                <td><?= h($events->event_start_date) ?></td>
                <td><?= h($events->event_end_date) ?></td>
                <td><?= h($events->horaires) ?></td>
                <td><?= h($events->public) ?></td>
                <td><?= h($events->event_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Events', 'action' => 'view', $events->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Events', 'action' => 'edit', $events->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Events', 'action' => 'delete', $events->id], ['confirm' => __('Are you sure you want to delete # {0}?', $events->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
