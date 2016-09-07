<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Events Vehicle'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventsVehicles index large-9 medium-8 columns content">
    <h3><?= __('Events Vehicles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('event_id') ?></th>
                <th><?= $this->Paginator->sort('vehicle_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventsVehicles as $eventsVehicle): ?>
            <tr>
                <td><?= $eventsVehicle->has('event') ? $this->Html->link($eventsVehicle->event->title, ['controller' => 'Events', 'action' => 'view', $eventsVehicle->event->id]) : '' ?></td>
                <td><?= $eventsVehicle->has('vehicle') ? $this->Html->link($eventsVehicle->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $eventsVehicle->vehicle->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $eventsVehicle->event_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventsVehicle->event_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventsVehicle->event_id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsVehicle->event_id)]) ?>
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
