<h1>Opérations en cours</h1>
<div class="rescuePlans index large-9 medium-8 columns content">
    <h3><?= __('Rescue Plans') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('event_id') ?></th>
                <th><?= $this->Paginator->sort('barrack_id') ?></th>
                <th><?= $this->Paginator->sort('rescue_plan_type_id') ?></th>
                <th><?= $this->Paginator->sort('organization_id') ?></th>
                <th><?= $this->Paginator->sort('actors_headcount') ?></th>
                <th><?= $this->Paginator->sort('rescuers_total') ?></th>
                <th><?= $this->Paginator->sort('headcount_total') ?></th>
                <th><?= $this->Paginator->sort('date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rescuePlans as $rescuePlan): ?>
            <tr>
                <td><?= $this->Number->format($rescuePlan->id) ?></td>
                <td><?= $rescuePlan->has('event') ? $this->Html->link($rescuePlan->event->title, ['controller' => 'Events', 'action' => 'view', $rescuePlan->event->id]) : '' ?></td>
                <td><?= $rescuePlan->has('barrack') ? $this->Html->link($rescuePlan->barrack->name, ['controller' => 'Barracks', 'action' => 'view', $rescuePlan->barrack->id]) : '' ?></td>
                <td><?= $this->Number->format($rescuePlan->public_headcount) ?></td>
                <td><?= $rescuePlan->has('rescue_plan_type') ? $this->Html->link($rescuePlan->rescue_plan_type->title, ['controller' => 'RescuePlanTypes', 'action' => 'view', $rescuePlan->rescue_plan_type->id]) : '' ?></td>
                <td><?= $this->Number->format($rescuePlan->public_total) ?></td>
                <td><?= $rescuePlan->has('organization') ? $this->Html->link($rescuePlan->organization->title, ['controller' => 'Organizations', 'action' => 'view', $rescuePlan->organization->id]) : '' ?></td>
                <td><?= $this->Number->format($rescuePlan->actors_headcount) ?></td>
                <td><?= $this->Number->format($rescuePlan->rescuers_total) ?></td>
                <td><?= $this->Number->format($rescuePlan->headcount_total) ?></td>
                <td><?= h($rescuePlan->date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rescuePlan->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rescuePlan->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rescuePlan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rescuePlan->id)]) ?>
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
