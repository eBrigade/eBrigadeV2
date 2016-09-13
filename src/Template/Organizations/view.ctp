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
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?> </li>
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
                <th><?= __('Diploma') ?></th>
                <th><?= __('Skills') ?></th>
                <th><?= __('Formation Type Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($organization->formations as $formations): ?>
            <tr>
                <td><?= h($formations->id) ?></td>
                <td><?= h($formations->organization_id) ?></td>
                <td><?= h($formations->event_id) ?></td>
                <td><?= h($formations->diploma) ?></td>
                <td><?= h($formations->skills) ?></td>
                <td><?= h($formations->formation_type_id) ?></td>
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
        <h4><?= __('Related Operations') ?></h4>
        <?php if (!empty($organization->operations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Barrack Id') ?></th>
                <th><?= __('City Id') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Public Headcount') ?></th>
                <th><?= __('Operation Activity Id') ?></th>
                <th><?= __('Operation Environment Id') ?></th>
                <th><?= __('Operation Delay Id') ?></th>
                <th><?= __('Public Ris') ?></th>
                <th><?= __('Operation Recommendation Id') ?></th>
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
                <th><?= __('Latitude') ?></th>
                <th><?= __('Longitude') ?></th>
                <th><?= __('Title') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($organization->operations as $operations): ?>
            <tr>
                <td><?= h($operations->id) ?></td>
                <td><?= h($operations->barrack_id) ?></td>
                <td><?= h($operations->city_id) ?></td>
                <td><?= h($operations->address) ?></td>
                <td><?= h($operations->public_headcount) ?></td>
                <td><?= h($operations->operation_activity_id) ?></td>
                <td><?= h($operations->operation_environment_id) ?></td>
                <td><?= h($operations->operation_delay_id) ?></td>
                <td><?= h($operations->public_ris) ?></td>
                <td><?= h($operations->operation_recommendation_id) ?></td>
                <td><?= h($operations->public_reinforcement) ?></td>
                <td><?= h($operations->public_total) ?></td>
                <td><?= h($operations->organization_id) ?></td>
                <td><?= h($operations->actors_headcount) ?></td>
                <td><?= h($operations->rescuers_total) ?></td>
                <td><?= h($operations->headcount_total) ?></td>
                <td><?= h($operations->actors_organization) ?></td>
                <td><?= h($operations->general_organization) ?></td>
                <td><?= h($operations->transport_organization) ?></td>
                <td><?= h($operations->team_instructions) ?></td>
                <td><?= h($operations->report_assisted) ?></td>
                <td><?= h($operations->report_slight) ?></td>
                <td><?= h($operations->report_medicalized) ?></td>
                <td><?= h($operations->report_reinforcement) ?></td>
                <td><?= h($operations->report_evacuated) ?></td>
                <td><?= h($operations->report_bilan_notes) ?></td>
                <td><?= h($operations->meals_morning) ?></td>
                <td><?= h($operations->meals_lunch) ?></td>
                <td><?= h($operations->meals_dinner) ?></td>
                <td><?= h($operations->meals_unit_cost) ?></td>
                <td><?= h($operations->meals_charge) ?></td>
                <td><?= h($operations->meals_cost) ?></td>
                <td><?= h($operations->cost_kilometers_vps) ?></td>
                <td><?= h($operations->cost_kilometers_other) ?></td>
                <td><?= h($operations->discount_percentage) ?></td>
                <td><?= h($operations->discount_reason) ?></td>
                <td><?= h($operations->cost_percentage_adpc) ?></td>
                <td><?= h($operations->total_cost) ?></td>
                <td><?= h($operations->date) ?></td>
                <td><?= h($operations->operation_type_id) ?></td>
                <td><?= h($operations->latitude) ?></td>
                <td><?= h($operations->longitude) ?></td>
                <td><?= h($operations->title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Operations', 'action' => 'view', $operations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Operations', 'action' => 'edit', $operations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Operations', 'action' => 'delete', $operations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
