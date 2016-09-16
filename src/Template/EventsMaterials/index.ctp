<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Events Material'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventsMaterials index large-9 medium-8 columns content">
    <h3><?= __('Events Materials') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('event_id') ?></th>
                <th><?= $this->Paginator->sort('material_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventsMaterials as $eventsMaterial): ?>
            <tr>
                <td><?= $eventsMaterial->has('event') ? $this->Html->link($eventsMaterial->event->title, ['controller' => 'Events', 'action' => 'view', $eventsMaterial->event->id]) : '' ?></td>
                <td><?= $eventsMaterial->has('material') ? $this->Html->link($eventsMaterial->material->id, ['controller' => 'Materials', 'action' => 'view', $eventsMaterial->material->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $eventsMaterial->event_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventsMaterial->event_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventsMaterial->event_id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsMaterial->event_id)]) ?>
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
