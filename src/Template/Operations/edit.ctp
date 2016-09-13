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
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operation Activities'), ['controller' => 'OperationActivities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation Activity'), ['controller' => 'OperationActivities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operation Environments'), ['controller' => 'OperationEnvironments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation Environment'), ['controller' => 'OperationEnvironments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operation Delays'), ['controller' => 'OperationDelays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation Delay'), ['controller' => 'OperationDelays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operation Recommendations'), ['controller' => 'OperationRecommendations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation Recommendation'), ['controller' => 'OperationRecommendations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Organizations'), ['controller' => 'Organizations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Organization'), ['controller' => 'Organizations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operation Types'), ['controller' => 'OperationTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation Type'), ['controller' => 'OperationTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="operations form large-9 medium-8 columns content">
    <?= $this->Form->create($operation) ?>
    <fieldset>
        <legend><?= __('Edit Operation') ?></legend>
        <?php
            echo $this->Form->input('event_id', ['options' => $events]);
            echo $this->Form->input('barrack_id', ['options' => $barracks]);
            echo $this->Form->input('city_id', ['options' => $cities, 'empty' => true]);
            echo $this->Form->input('address');
            echo $this->Form->input('public_headcount');
            echo $this->Form->input('operation_activity_id', ['options' => $operationActivities]);
            echo $this->Form->input('operation_environment_id', ['options' => $operationEnvironments]);
            echo $this->Form->input('operation_delay_id', ['options' => $operationDelays]);
            echo $this->Form->input('public_ris');
            echo $this->Form->input('operation_recommendation_id', ['options' => $operationRecommendations]);
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
            echo $this->Form->input('operation_type_id', ['options' => $operationTypes, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
