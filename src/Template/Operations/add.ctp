<div class="operations form large-9 medium-8 columns content">
    <?= $this->Form->create($operation) ?>
    <fieldset>
        <legend><?= __('Add Operation') ?></legend>
        <?php
        //event fields
        echo $this->Form->input('city_id', ['options' => $cities, 'empty' => true]);
        echo $this->Form->input('creator_id');
        echo $this->Form->input('bill_id');
        echo $this->Form->input('title');
        echo $this->Form->input('address');
        echo $this->Form->input('latitude');
        echo $this->Form->input('longitude');
        echo $this->Form->input('is_closed');
        echo $this->Form->input('closed', ['empty' => true]);
        echo $this->Form->input('price');
        echo $this->Form->input('canceled');
        echo $this->Form->input('canceled_detail');
        echo $this->Form->input('is_active');
        echo $this->Form->input('instructions');
        echo $this->Form->input('responsible_id');
        echo $this->Form->input('details');
        echo $this->Form->input('barrack_id', ['options' => $barracks, 'empty' => true]);
        echo $this->Form->input('event_start_date', ['empty' => true]);
        echo $this->Form->input('event_end_date', ['empty' => true]);
        echo $this->Form->input('horaires');
        echo $this->Form->input('public');

        //operation fields
        echo $this->Form->input('event_id', ['options' => $events]);
        echo $this->Form->input('public_headcount');
        echo $this->Form->input('operation_activity_id', ['options' => $operationActivities, 'onclick' => 'calculris()']);
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

<script>
    function calculris() {

        p1 = document.getElementById('effectifs-public').value;
        ap2 = document.getElementById('operation-activity-id');
        var p2cases = [0.25, 0.30, 35, 0.40, 0.40];
        p2 = p2cases[ap2.options[ap2.selectedIndex].value + 1];
        console.log(p1);


        /*p2 = parseFloat(ap2.options[ap2.selectedIndex].value);*/
        ae1 = document.getElementById('operation_environment_id');
        e1 = parseFloat(ae1.options[ae1.selectedIndex].value);
        ae2 = document.getElementById('operation_delay_id');
        e2 = parseFloat(ae2.options[ae2.selectedIndex].value);
        pub = document.getElementById('operation_type_id');
        if (p1 <= 100000) {
            p = p1;
        } else if (p1 > 100000) {
            p = 100000 + ((p1 - 100000) / 2);
        }
        i = p2 + e1 + e2;
        ris = i * (p / 1000);
        document.getElementById('public_ris').value = ris;
        console.log(ris);
        switch (true) {
            case ris <= 0.25:
                pub.value = 'PAS DE DISPOSITIF';
                break;
            case 0.25 < ris & ris <= 1.125:
                pub.value = "POINT D'ALERTE ET DE PREMIER SECOURS";
                break;
            case 1.125 < ris & ris <= 12:
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
