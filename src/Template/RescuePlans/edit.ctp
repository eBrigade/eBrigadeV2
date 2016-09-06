<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rescuePlan->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rescuePlan->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rescue Plans'), ['action' => 'index']) ?></li>
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
<div class="rescuePlans form large-9 medium-8 columns content">
    <?= $this->Form->create($rescuePlan) ?>
    <fieldset>
        <legend><?= __('Edit Rescue Plan') ?></legend>
        <?php
            echo $this->Form->input('event_id', ['options' => $events]);
            echo $this->Form->input('barrack_id', ['options' => $barracks]);
            echo $this->Form->input('public_headcount');
            echo $this->Form->input('rescue_plan_activity_id', ['options' => $rescuePlanActivities]);
            echo $this->Form->input('rescue_plan_environment_id', ['options' => $rescuePlanEnvironments]);
            echo $this->Form->input('rescue_plan_delay_id', ['options' => $rescuePlanDelays]);
            echo $this->Form->input('public_ris');
            echo $this->Form->input('rescue_plan_type_id', ['options' => $rescuePlanTypes]);
            echo $this->Form->input('rescue_plan_recommendation_id', ['options' => $rescuePlanRecommendations]);
            echo $this->Form->input('public_reinforcement');
            echo $this->Form->input('public_total');
            echo $this->Form->input('organization_id', ['options' => $organizations]);
            echo $this->Form->input('actors_headcount');
            echo $this->Form->input('rescuers_total');
            echo $this->Form->input('headcount_total');
            echo $this->Form->input('actors_organization');
            echo $this->Form->input('general_organization');
            echo $this->Form->input('transport_organization');
            echo $this->Form->input('team_instructions');
            echo $this->Form->input('report_assisted');
            echo $this->Form->input('report_slight');
            echo $this->Form->input('report_medicalized');
            echo $this->Form->input('report_reinforcement');
            echo $this->Form->input('report_evacuated');
            echo $this->Form->input('report_bilan_notes');
            echo $this->Form->input('meals_morning');
            echo $this->Form->input('meals_lunch');
            echo $this->Form->input('meals_dinner');
            echo $this->Form->input('meals_unit_cost');
            echo $this->Form->input('meals_charge');
            echo $this->Form->input('meals_cost');
            echo $this->Form->input('cost_kilometers_vps');
            echo $this->Form->input('cost_kilometers_other');
            echo $this->Form->input('discount_percentage');
            echo $this->Form->input('discount_reason');
            echo $this->Form->input('cost_percentage_adpc');
            echo $this->Form->input('total_cost');
            echo $this->Form->input('date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
