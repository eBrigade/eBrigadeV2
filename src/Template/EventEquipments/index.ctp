<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Event Equipment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventEquipments index large-9 medium-8 columns content">
    <h3><?= __('Event Equipments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('event_id') ?></th>
                <th><?= $this->Paginator->sort('equipment_id') ?></th>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventEquipments as $eventEquipment): ?>
            <tr>
                <td><?= $eventEquipment->has('event') ? $this->Html->link($eventEquipment->event->title, ['controller' => 'Events', 'action' => 'view', $eventEquipment->event->id]) : '' ?></td>
                <td><?= $this->Number->format($eventEquipment->equipment_id) ?></td>
                <td><?= $this->Number->format($eventEquipment->id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $eventEquipment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventEquipment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventEquipment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventEquipment->id)]) ?>
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
