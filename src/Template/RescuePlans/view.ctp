<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rescue Plan'), ['action' => 'edit', $rescuePlan->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rescue Plan'), ['action' => 'delete', $rescuePlan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rescuePlan->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rescue Plans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rescue Plan'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rescue Plan Activities'), ['controller' => 'RescuePlanActivities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rescue Plan Activity'), ['controller' => 'RescuePlanActivities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rescue Plan Environments'), ['controller' => 'RescuePlanEnvironments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rescue Plan Environment'), ['controller' => 'RescuePlanEnvironments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rescue Plan Delays'), ['controller' => 'RescuePlanDelays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rescue Plan Delay'), ['controller' => 'RescuePlanDelays', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rescue Plan Types'), ['controller' => 'RescuePlanTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rescue Plan Type'), ['controller' => 'RescuePlanTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rescue Plan Recommendations'), ['controller' => 'RescuePlanRecommendations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rescue Plan Recommendation'), ['controller' => 'RescuePlanRecommendations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Organizations'), ['controller' => 'Organizations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organization'), ['controller' => 'Organizations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rescuePlans view large-9 medium-8 columns content">
    <h3><?= h($rescuePlan->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Event') ?></th>
            <td><?= $rescuePlan->has('event') ? $this->Html->link($rescuePlan->event->title, ['controller' => 'Events', 'action' => 'view', $rescuePlan->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Barrack') ?></th>
            <td><?= $rescuePlan->has('barrack') ? $this->Html->link($rescuePlan->barrack->name, ['controller' => 'Barracks', 'action' => 'view', $rescuePlan->barrack->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Rescue Plan Activity') ?></th>
            <td><?= $rescuePlan->has('rescue_plan_activity') ? $this->Html->link($rescuePlan->rescue_plan_activity->title, ['controller' => 'RescuePlanActivities', 'action' => 'view', $rescuePlan->rescue_plan_activity->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Rescue Plan Environment') ?></th>
            <td><?= $rescuePlan->has('rescue_plan_environment') ? $this->Html->link($rescuePlan->rescue_plan_environment->title, ['controller' => 'RescuePlanEnvironments', 'action' => 'view', $rescuePlan->rescue_plan_environment->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Rescue Plan Delay') ?></th>
            <td><?= $rescuePlan->has('rescue_plan_delay') ? $this->Html->link($rescuePlan->rescue_plan_delay->title, ['controller' => 'RescuePlanDelays', 'action' => 'view', $rescuePlan->rescue_plan_delay->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Rescue Plan Type') ?></th>
            <td><?= $rescuePlan->has('rescue_plan_type') ? $this->Html->link($rescuePlan->rescue_plan_type->title, ['controller' => 'RescuePlanTypes', 'action' => 'view', $rescuePlan->rescue_plan_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Rescue Plan Recommendation') ?></th>
            <td><?= $rescuePlan->has('rescue_plan_recommendation') ? $this->Html->link($rescuePlan->rescue_plan_recommendation->title, ['controller' => 'RescuePlanRecommendations', 'action' => 'view', $rescuePlan->rescue_plan_recommendation->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Public Reinforcement') ?></th>
            <td><?= h($rescuePlan->public_reinforcement) ?></td>
        </tr>
        <tr>
            <th><?= __('Organization') ?></th>
            <td><?= $rescuePlan->has('organization') ? $this->Html->link($rescuePlan->organization->title, ['controller' => 'Organizations', 'action' => 'view', $rescuePlan->organization->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($rescuePlan->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Public Headcount') ?></th>
            <td><?= $this->Number->format($rescuePlan->public_headcount) ?></td>
        </tr>
        <tr>
            <th><?= __('Public Ris') ?></th>
            <td><?= $this->Number->format($rescuePlan->public_ris) ?></td>
        </tr>
        <tr>
            <th><?= __('Public Total') ?></th>
            <td><?= $this->Number->format($rescuePlan->public_total) ?></td>
        </tr>
        <tr>
            <th><?= __('Actors Headcount') ?></th>
            <td><?= $this->Number->format($rescuePlan->actors_headcount) ?></td>
        </tr>
        <tr>
            <th><?= __('Rescuers Total') ?></th>
            <td><?= $this->Number->format($rescuePlan->rescuers_total) ?></td>
        </tr>
        <tr>
            <th><?= __('Headcount Total') ?></th>
            <td><?= $this->Number->format($rescuePlan->headcount_total) ?></td>
        </tr>
        <tr>
            <th><?= __('Report Assisted') ?></th>
            <td><?= $this->Number->format($rescuePlan->report_assisted) ?></td>
        </tr>
        <tr>
            <th><?= __('Report Slight') ?></th>
            <td><?= $this->Number->format($rescuePlan->report_slight) ?></td>
        </tr>
        <tr>
            <th><?= __('Report Medicalized') ?></th>
            <td><?= $this->Number->format($rescuePlan->report_medicalized) ?></td>
        </tr>
        <tr>
            <th><?= __('Report Reinforcement') ?></th>
            <td><?= $this->Number->format($rescuePlan->report_reinforcement) ?></td>
        </tr>
        <tr>
            <th><?= __('Report Evacuated') ?></th>
            <td><?= $this->Number->format($rescuePlan->report_evacuated) ?></td>
        </tr>
        <tr>
            <th><?= __('Meals Morning') ?></th>
            <td><?= $this->Number->format($rescuePlan->meals_morning) ?></td>
        </tr>
        <tr>
            <th><?= __('Meals Lunch') ?></th>
            <td><?= $this->Number->format($rescuePlan->meals_lunch) ?></td>
        </tr>
        <tr>
            <th><?= __('Meals Dinner') ?></th>
            <td><?= $this->Number->format($rescuePlan->meals_dinner) ?></td>
        </tr>
        <tr>
            <th><?= __('Meals Unit Cost') ?></th>
            <td><?= $this->Number->format($rescuePlan->meals_unit_cost) ?></td>
        </tr>
        <tr>
            <th><?= __('Meals Charge') ?></th>
            <td><?= $this->Number->format($rescuePlan->meals_charge) ?></td>
        </tr>
        <tr>
            <th><?= __('Meals Cost') ?></th>
            <td><?= $this->Number->format($rescuePlan->meals_cost) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Kilometers Vps') ?></th>
            <td><?= $this->Number->format($rescuePlan->cost_kilometers_vps) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Kilometers Other') ?></th>
            <td><?= $this->Number->format($rescuePlan->cost_kilometers_other) ?></td>
        </tr>
        <tr>
            <th><?= __('Discount Percentage') ?></th>
            <td><?= $this->Number->format($rescuePlan->discount_percentage) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Percentage Adpc') ?></th>
            <td><?= $this->Number->format($rescuePlan->cost_percentage_adpc) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Cost') ?></th>
            <td><?= $this->Number->format($rescuePlan->total_cost) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($rescuePlan->date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Actors Organization') ?></h4>
        <?= $this->Text->autoParagraph(h($rescuePlan->actors_organization)); ?>
    </div>
    <div class="row">
        <h4><?= __('General Organization') ?></h4>
        <?= $this->Text->autoParagraph(h($rescuePlan->general_organization)); ?>
    </div>
    <div class="row">
        <h4><?= __('Transport Organization') ?></h4>
        <?= $this->Text->autoParagraph(h($rescuePlan->transport_organization)); ?>
    </div>
    <div class="row">
        <h4><?= __('Team Instructions') ?></h4>
        <?= $this->Text->autoParagraph(h($rescuePlan->team_instructions)); ?>
    </div>
    <div class="row">
        <h4><?= __('Report Bilan Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($rescuePlan->report_bilan_notes)); ?>
    </div>
    <div class="row">
        <h4><?= __('Discount Reason') ?></h4>
        <?= $this->Text->autoParagraph(h($rescuePlan->discount_reason)); ?>
    </div>
</div>
