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
<div class="rescuePlans index large-9 medium-8 columns content">
    <h3><?= __('Rescue Plans') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('event_id') ?></th>
                <th><?= $this->Paginator->sort('barrack_id') ?></th>
                <th><?= $this->Paginator->sort('public_headcount') ?></th>
                <th><?= $this->Paginator->sort('rescue_plan_activity_id') ?></th>
                <th><?= $this->Paginator->sort('rescue_plan_environment_id') ?></th>
                <th><?= $this->Paginator->sort('rescue_plan_delay_id') ?></th>
                <th><?= $this->Paginator->sort('public_ris') ?></th>
                <th><?= $this->Paginator->sort('rescue_plan_type_id') ?></th>
                <th><?= $this->Paginator->sort('rescue_plan_recommendation_id') ?></th>
                <th><?= $this->Paginator->sort('public_reinforcement') ?></th>
                <th><?= $this->Paginator->sort('public_total') ?></th>
                <th><?= $this->Paginator->sort('organization_id') ?></th>
                <th><?= $this->Paginator->sort('actors_headcount') ?></th>
                <th><?= $this->Paginator->sort('rescuers_total') ?></th>
                <th><?= $this->Paginator->sort('headcount_total') ?></th>
                <th><?= $this->Paginator->sort('report_assisted') ?></th>
                <th><?= $this->Paginator->sort('report_slight') ?></th>
                <th><?= $this->Paginator->sort('report_medicalized') ?></th>
                <th><?= $this->Paginator->sort('report_reinforcement') ?></th>
                <th><?= $this->Paginator->sort('report_evacuated') ?></th>
                <th><?= $this->Paginator->sort('meals_morning') ?></th>
                <th><?= $this->Paginator->sort('meals_lunch') ?></th>
                <th><?= $this->Paginator->sort('meals_dinner') ?></th>
                <th><?= $this->Paginator->sort('meals_unit_cost') ?></th>
                <th><?= $this->Paginator->sort('meals_charge') ?></th>
                <th><?= $this->Paginator->sort('meals_cost') ?></th>
                <th><?= $this->Paginator->sort('cost_kilometers_vps') ?></th>
                <th><?= $this->Paginator->sort('cost_kilometers_other') ?></th>
                <th><?= $this->Paginator->sort('discount_percentage') ?></th>
                <th><?= $this->Paginator->sort('cost_percentage_adpc') ?></th>
                <th><?= $this->Paginator->sort('total_cost') ?></th>
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
                <td><?= $rescuePlan->has('rescue_plan_activity') ? $this->Html->link($rescuePlan->rescue_plan_activity->title, ['controller' => 'RescuePlanActivities', 'action' => 'view', $rescuePlan->rescue_plan_activity->id]) : '' ?></td>
                <td><?= $rescuePlan->has('rescue_plan_environment') ? $this->Html->link($rescuePlan->rescue_plan_environment->title, ['controller' => 'RescuePlanEnvironments', 'action' => 'view', $rescuePlan->rescue_plan_environment->id]) : '' ?></td>
                <td><?= $rescuePlan->has('rescue_plan_delay') ? $this->Html->link($rescuePlan->rescue_plan_delay->title, ['controller' => 'RescuePlanDelays', 'action' => 'view', $rescuePlan->rescue_plan_delay->id]) : '' ?></td>
                <td><?= $this->Number->format($rescuePlan->public_ris) ?></td>
                <td><?= $rescuePlan->has('rescue_plan_type') ? $this->Html->link($rescuePlan->rescue_plan_type->title, ['controller' => 'RescuePlanTypes', 'action' => 'view', $rescuePlan->rescue_plan_type->id]) : '' ?></td>
                <td><?= $rescuePlan->has('rescue_plan_recommendation') ? $this->Html->link($rescuePlan->rescue_plan_recommendation->title, ['controller' => 'RescuePlanRecommendations', 'action' => 'view', $rescuePlan->rescue_plan_recommendation->id]) : '' ?></td>
                <td><?= h($rescuePlan->public_reinforcement) ?></td>
                <td><?= $this->Number->format($rescuePlan->public_total) ?></td>
                <td><?= $rescuePlan->has('organization') ? $this->Html->link($rescuePlan->organization->title, ['controller' => 'Organizations', 'action' => 'view', $rescuePlan->organization->id]) : '' ?></td>
                <td><?= $this->Number->format($rescuePlan->actors_headcount) ?></td>
                <td><?= $this->Number->format($rescuePlan->rescuers_total) ?></td>
                <td><?= $this->Number->format($rescuePlan->headcount_total) ?></td>
                <td><?= $this->Number->format($rescuePlan->report_assisted) ?></td>
                <td><?= $this->Number->format($rescuePlan->report_slight) ?></td>
                <td><?= $this->Number->format($rescuePlan->report_medicalized) ?></td>
                <td><?= $this->Number->format($rescuePlan->report_reinforcement) ?></td>
                <td><?= $this->Number->format($rescuePlan->report_evacuated) ?></td>
                <td><?= $this->Number->format($rescuePlan->meals_morning) ?></td>
                <td><?= $this->Number->format($rescuePlan->meals_lunch) ?></td>
                <td><?= $this->Number->format($rescuePlan->meals_dinner) ?></td>
                <td><?= $this->Number->format($rescuePlan->meals_unit_cost) ?></td>
                <td><?= $this->Number->format($rescuePlan->meals_charge) ?></td>
                <td><?= $this->Number->format($rescuePlan->meals_cost) ?></td>
                <td><?= $this->Number->format($rescuePlan->cost_kilometers_vps) ?></td>
                <td><?= $this->Number->format($rescuePlan->cost_kilometers_other) ?></td>
                <td><?= $this->Number->format($rescuePlan->discount_percentage) ?></td>
                <td><?= $this->Number->format($rescuePlan->cost_percentage_adpc) ?></td>
                <td><?= $this->Number->format($rescuePlan->total_cost) ?></td>
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
