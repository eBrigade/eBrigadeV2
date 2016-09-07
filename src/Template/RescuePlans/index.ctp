<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rescue Plan'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rescue Plan Activities'), ['controller' => 'RescuePlanActivities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rescue Plan Activity'), ['controller' => 'RescuePlanActivities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rescue Plan Environments'), ['controller' => 'RescuePlanEnvironments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rescue Plan Environment'), ['controller' => 'RescuePlanEnvironments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rescue Plan Delays'), ['controller' => 'RescuePlanDelays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rescue Plan Delay'), ['controller' => 'RescuePlanDelays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rescue Plan Types'), ['controller' => 'RescuePlanTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rescue Plan Type'), ['controller' => 'RescuePlanTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rescue Plan Recommendations'), ['controller' => 'RescuePlanRecommendations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rescue Plan Recommendation'), ['controller' => 'RescuePlanRecommendations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Organizations'), ['controller' => 'Organizations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Organization'), ['controller' => 'Organizations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rescuePlans index col-lg-9 col-md-8 columns content">
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
