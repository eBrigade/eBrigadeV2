<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Equipments'), ['controller' => 'EventEquipments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Equipment'), ['controller' => 'EventEquipments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Teams'), ['controller' => 'EventTeams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Team'), ['controller' => 'EventTeams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Vehicles'), ['controller' => 'EventVehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Vehicle'), ['controller' => 'EventVehicles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="events index large-9 medium-8 columns content">
    <h3><?= __('Events') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('city_id') ?></th>
                <th><?= $this->Paginator->sort('creator_id') ?></th>
                <th><?= $this->Paginator->sort('bill_id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('address') ?></th>
                <th><?= $this->Paginator->sort('latitude') ?></th>
                <th><?= $this->Paginator->sort('longitude') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('is_closed') ?></th>
                <th><?= $this->Paginator->sort('closed') ?></th>
                <th><?= $this->Paginator->sort('price') ?></th>
                <th><?= $this->Paginator->sort('canceled') ?></th>
                <th><?= $this->Paginator->sort('canceled_detail') ?></th>
                <th><?= $this->Paginator->sort('is_active') ?></th>
                <th><?= $this->Paginator->sort('instructions') ?></th>
                <th><?= $this->Paginator->sort('responsible_id') ?></th>
                <th><?= $this->Paginator->sort('details') ?></th>
                <th><?= $this->Paginator->sort('barrack_id') ?></th>
                <th><?= $this->Paginator->sort('event_start_date') ?></th>
                <th><?= $this->Paginator->sort('event_end_date') ?></th>
                <th><?= $this->Paginator->sort('horaires') ?></th>
                <th><?= $this->Paginator->sort('public') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event): ?>
            <tr>
                <td><?= $this->Number->format($event->id) ?></td>
                <td><?= $event->has('city') ? $this->Html->link($event->city->id, ['controller' => 'Cities', 'action' => 'view', $event->city->id]) : '' ?></td>
                <td><?= $this->Number->format($event->creator_id) ?></td>
                <td><?= $this->Number->format($event->bill_id) ?></td>
                <td><?= h($event->title) ?></td>
                <td><?= h($event->address) ?></td>
                <td><?= $this->Number->format($event->latitude) ?></td>
                <td><?= $this->Number->format($event->longitude) ?></td>
                <td><?= h($event->created) ?></td>
                <td><?= h($event->modified) ?></td>
                <td><?= h($event->is_closed) ?></td>
                <td><?= h($event->closed) ?></td>
                <td><?= $this->Number->format($event->price) ?></td>
                <td><?= h($event->canceled) ?></td>
                <td><?= h($event->canceled_detail) ?></td>
                <td><?= h($event->is_active) ?></td>
                <td><?= h($event->instructions) ?></td>
                <td><?= h($event->responsible_id) ?></td>
                <td><?= h($event->details) ?></td>
                <td><?= $event->has('barrack') ? $this->Html->link($event->barrack->name, ['controller' => 'Barracks', 'action' => 'view', $event->barrack->id]) : '' ?></td>
                <td><?= h($event->event_start_date) ?></td>
                <td><?= h($event->event_end_date) ?></td>
                <td><?= h($event->horaires) ?></td>
                <td><?= h($event->public) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $event->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $event->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?>
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
