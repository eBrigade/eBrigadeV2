<div class="operations form large-9 medium-8 columns content">
    <?= $this->Form->create($operation) ?>
    <fieldset>
        <legend><?= __('Add Operation') ?></legend>
        <?php
        //event fields
        echo $this->Form->input('operation.event.city_id', ['options' => $cities, 'empty' => true]);
        echo $this->Form->hidden('event.creator_id', ['value' => $creator]);
        echo $this->Form->input('event.bill_id');
        echo $this->Form->input('event.title');
        echo $this->Form->input('event.address');
        echo $this->Form->input('event.latitude');
        echo $this->Form->input('event.longitude');
        echo $this->Form->input('event.is_closed');
        echo $this->Form->input('event.closed', ['empty' => true]);
        echo $this->Form->input('event.price');
        echo $this->Form->input('event.canceled');
        echo $this->Form->input('event.canceled_detail');
        echo $this->Form->input('event.is_active');
        echo $this->Form->input('event.instructions');
        echo $this->Form->input('event.responsible_id');
        echo $this->Form->input('event.details');
        echo $this->Form->input('operation.event.barrack_id', ['options' => $barracks, 'empty' => true]);
        echo $this->Form->input('event.event_start_date', ['empty' => true]);
        echo $this->Form->input('event.event_end_date', ['empty' => true]);
        echo $this->Form->input('event.horaires');
        echo $this->Form->input('event.public');

        //operation fields

        echo $this->Form->input('public_headcount');
        echo $this->Form->input('operation_activity_id', ['options' => $operationActivities]);
        echo $this->Form->input('operation_environment_id', ['options' => $operationEnvironments]);
        echo $this->Form->input('operation_delay_id', ['options' => $operationDelays]);
        echo $this->Form->input('public_ris', ['disabled']);
        echo $this->Form->input('operation_type_id', ['options' => $operationTypes, 'disabled']);
        echo $this->Form->input('operation_recommendation_id', [ 'options' => $operationRecommendations]);
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

<?php echo $this->Html->script('calculRIS.js');?>