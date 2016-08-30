<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operation Activities'), ['controller' => 'OperationActivities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation Activity'), ['controller' => 'OperationActivities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operation Environments'), ['controller' => 'OperationEnvironments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation Environment'), ['controller' => 'OperationEnvironments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operation Delays'), ['controller' => 'OperationDelays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation Delay'), ['controller' => 'OperationDelays', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operation Types'), ['controller' => 'OperationTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation Type'), ['controller' => 'OperationTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operation Recommendations'), ['controller' => 'OperationRecommendations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation Recommendation'), ['controller' => 'OperationRecommendations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Organizations'), ['controller' => 'Organizations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Organization'), ['controller' => 'Organizations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="operations form large-9 medium-8 columns content">
    <?= $this->Form->create($operation) ?>
    <fieldset>
        <legend><?= __('Add Operation') ?></legend>
        <?php
            echo $this->Form->input('event_id', ['options' => $events]);
            echo $this->Form->input('barrack_id', ['options' => $barracks]);
            echo $this->Form->input('public_headcount');
            echo $this->Form->input('operation_activity_id', ['options' => $operationActivities]);
            echo $this->Form->input('operation_environment_id', ['options' => $operationEnvironments]);
            echo $this->Form->input('operation_delay_id', ['options' => $operationDelays]);
            echo $this->Form->input('public_ris');
            echo $this->Form->input('operation_type_id', ['options' => $operationTypes]);
            echo $this->Form->input('operation_recommendation_id', ['options' => $operationRecommendations]);
            echo $this->Form->input('public_reinforcement');
            echo $this->Form->input('public_total');
            echo $this->Form->input('organization_id', ['options' => $organizations]);
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

<script>
    function calculris() {
        p1 = document.getElementById('public_headcount').value;
        ap2 = document.getElementById('operation_activity_id');
        p2 = parseFloat(ap2.options[ap2.selectedIndex].text);
        ae1 = document.getElementById('operation_environment_id');
        e1 = parseFloat(ae1.options[ae1.selectedIndex].text);
        ae2 = document.getElementById('operation_delay_id');
        e2 = parseFloat(ae2.options[ae2.selectedIndex].text);
        pub = document.getElementById('operation_type_id');
        if (p1 <= 100000) {
            p = p1;
        } else if (p1 > 100000) {
            p = 100000 + ((p1 - 100000) / 2);
        }
        i = p2 + e1 + e2;
        ris = i * (p / 1000);
        document.getElementById('public-ris').value = ris;
        console.log(ris);
        switch (true) {
            case ris <= 0.25:
                pub.value = 'PAS DE DISPOSITIF';
                break;
            case 0.25 < ris & ris <= 1.125:
                pub.value = "POINT D'ALERTE ET DE PREMIER SECOURS";
                break;
            case 1.125 <ris & ris <= 12:
                pub.value = "DPS DE PETITE ENVERGURE";
                break;
            case 12 < ris & ris <= 36:
                pub.value = "DPS DE MOYENNE ENVERGURE";
                break;
            case 36 < ris:
                pub.value = "DPS DE GRANDE ENVERGURE";
        }
    }
</script>