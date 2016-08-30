<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $operation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $operation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operation Activities'), ['controller' => 'OperationActivities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation Activity'), ['controller' => 'OperationActivities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operation Types'), ['controller' => 'OperationTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation Type'), ['controller' => 'OperationTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operation Recommendations'), ['controller' => 'OperationRecommendations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation Recommendation'), ['controller' => 'OperationRecommendations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="operations form large-9 medium-8 columns content">
    <?= $this->Form->create($operation) ?>
    <fieldset>
        <legend><?= __('Edit Operation') ?></legend>
        <?php
            echo $this->Form->input('event_id', ['options' => $events]);
            echo $this->Form->input('caserne_id');
            echo $this->Form->input('public_headcount');
            echo $this->Form->input('operation_activity_id', ['options' => $operationActivities]);
            echo $this->Form->input('operation_environments');
            echo $this->Form->input('operation_delays');
            echo $this->Form->input('public_ris');
            echo $this->Form->input('operation_type_id', ['options' => $operationTypes]);
            echo $this->Form->input('operation_recommendation_id', ['options' => $operationRecommendations]);
            echo $this->Form->input('public_reinforcement');
            echo $this->Form->input('public_total');
            echo $this->Form->input('public_organization');
            echo $this->Form->input('actors_headcount');
            echo $this->Form->input('rescuers_total');
            echo $this->Form->input('heacount_total');
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
