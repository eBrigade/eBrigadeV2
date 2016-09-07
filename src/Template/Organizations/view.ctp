<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Organization'), ['action' => 'edit', $organization->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Organization'), ['action' => 'delete', $organization->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organization->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Organizations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organization'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rescue Plans'), ['controller' => 'RescuePlans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rescue Plan'), ['controller' => 'RescuePlans', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="organizations view large-9 medium-8 columns content">
    <h3><?= h($organization->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($organization->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Address1') ?></th>
            <td><?= h($organization->address1) ?></td>
        </tr>
        <tr>
            <th><?= __('Address2') ?></th>
            <td><?= h($organization->address2) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= $organization->has('city') ? $this->Html->link($organization->city->id, ['controller' => 'Cities', 'action' => 'view', $organization->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($organization->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($organization->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Cellphone') ?></th>
            <td><?= h($organization->cellphone) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($organization->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Formations') ?></h4>
        <?php if (!empty($organization->formations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Organization Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($organization->formations as $formations): ?>
            <tr>
                <td><?= h($formations->id) ?></td>
                <td><?= h($formations->organization_id) ?></td>
                <td><?= h($formations->event_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Formations', 'action' => 'view', $formations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Formations', 'action' => 'edit', $formations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Formations', 'action' => 'delete', $formations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Rescue Plans') ?></h4>
        <?php if (!empty($organization->rescue_plans)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Barrack Id') ?></th>
                <th><?= __('Public Headcount') ?></th>
                <th><?= __('Rescue Plan Activity Id') ?></th>
                <th><?= __('Rescue Plan Environment Id') ?></th>
                <th><?= __('Rescue Plan Delay Id') ?></th>
                <th><?= __('Public Ris') ?></th>
                <th><?= __('Rescue Plan Type Id') ?></th>
                <th><?= __('Rescue Plan Recommendation Id') ?></th>
                <th><?= __('Public Reinforcement') ?></th>
                <th><?= __('Public Total') ?></th>
                <th><?= __('Organization Id') ?></th>
                <th><?= __('Actors Headcount') ?></th>
                <th><?= __('Rescuers Total') ?></th>
                <th><?= __('Headcount Total') ?></th>
                <th><?= __('Actors Organization') ?></th>
                <th><?= __('General Organization') ?></th>
                <th><?= __('Transport Organization') ?></th>
                <th><?= __('Team Instructions') ?></th>
                <th><?= __('Report Assisted') ?></th>
                <th><?= __('Report Slight') ?></th>
                <th><?= __('Report Medicalized') ?></th>
                <th><?= __('Report Reinforcement') ?></th>
                <th><?= __('Report Evacuated') ?></th>
                <th><?= __('Report Bilan Notes') ?></th>
                <th><?= __('Meals Morning') ?></th>
                <th><?= __('Meals Lunch') ?></th>
                <th><?= __('Meals Dinner') ?></th>
                <th><?= __('Meals Unit Cost') ?></th>
                <th><?= __('Meals Charge') ?></th>
                <th><?= __('Meals Cost') ?></th>
                <th><?= __('Cost Kilometers Vps') ?></th>
                <th><?= __('Cost Kilometers Other') ?></th>
                <th><?= __('Discount Percentage') ?></th>
                <th><?= __('Discount Reason') ?></th>
                <th><?= __('Cost Percentage Adpc') ?></th>
                <th><?= __('Total Cost') ?></th>
                <th><?= __('Date') ?></th>
                <th><?= __('Operation Type Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($organization->rescue_plans as $rescuePlans): ?>
            <tr>
                <td><?= h($rescuePlans->id) ?></td>
                <td><?= h($rescuePlans->event_id) ?></td>
                <td><?= h($rescuePlans->barrack_id) ?></td>
                <td><?= h($rescuePlans->public_headcount) ?></td>
                <td><?= h($rescuePlans->rescue_plan_activity_id) ?></td>
                <td><?= h($rescuePlans->rescue_plan_environment_id) ?></td>
                <td><?= h($rescuePlans->rescue_plan_delay_id) ?></td>
                <td><?= h($rescuePlans->public_ris) ?></td>
                <td><?= h($rescuePlans->rescue_plan_type_id) ?></td>
                <td><?= h($rescuePlans->rescue_plan_recommendation_id) ?></td>
                <td><?= h($rescuePlans->public_reinforcement) ?></td>
                <td><?= h($rescuePlans->public_total) ?></td>
                <td><?= h($rescuePlans->organization_id) ?></td>
                <td><?= h($rescuePlans->actors_headcount) ?></td>
                <td><?= h($rescuePlans->rescuers_total) ?></td>
                <td><?= h($rescuePlans->headcount_total) ?></td>
                <td><?= h($rescuePlans->actors_organization) ?></td>
                <td><?= h($rescuePlans->general_organization) ?></td>
                <td><?= h($rescuePlans->transport_organization) ?></td>
                <td><?= h($rescuePlans->team_instructions) ?></td>
                <td><?= h($rescuePlans->report_assisted) ?></td>
                <td><?= h($rescuePlans->report_slight) ?></td>
                <td><?= h($rescuePlans->report_medicalized) ?></td>
                <td><?= h($rescuePlans->report_reinforcement) ?></td>
                <td><?= h($rescuePlans->report_evacuated) ?></td>
                <td><?= h($rescuePlans->report_bilan_notes) ?></td>
                <td><?= h($rescuePlans->meals_morning) ?></td>
                <td><?= h($rescuePlans->meals_lunch) ?></td>
                <td><?= h($rescuePlans->meals_dinner) ?></td>
                <td><?= h($rescuePlans->meals_unit_cost) ?></td>
                <td><?= h($rescuePlans->meals_charge) ?></td>
                <td><?= h($rescuePlans->meals_cost) ?></td>
                <td><?= h($rescuePlans->cost_kilometers_vps) ?></td>
                <td><?= h($rescuePlans->cost_kilometers_other) ?></td>
                <td><?= h($rescuePlans->discount_percentage) ?></td>
                <td><?= h($rescuePlans->discount_reason) ?></td>
                <td><?= h($rescuePlans->cost_percentage_adpc) ?></td>
                <td><?= h($rescuePlans->total_cost) ?></td>
                <td><?= h($rescuePlans->date) ?></td>
                <td><?= h($rescuePlans->operation_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RescuePlans', 'action' => 'view', $rescuePlans->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RescuePlans', 'action' => 'edit', $rescuePlans->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RescuePlans', 'action' => 'delete', $rescuePlans->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rescuePlans->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
