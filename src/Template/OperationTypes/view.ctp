<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Operation Type'), ['action' => 'edit', $operationType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Operation Type'), ['action' => 'delete', $operationType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operationType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Operation Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="operationTypes view col-lg-9 col-md-8 columns content">
    <h3><?= h($operationType->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($operationType->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($operationType->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Min') ?></th>
            <td><?= $this->Number->format($operationType->min) ?></td>
        </tr>
        <tr>
            <th><?= __('Max') ?></th>
            <td><?= $this->Number->format($operationType->max) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Operations') ?></h4>
        <?php if (!empty($operationType->operations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Barrack Id') ?></th>
                <th><?= __('Public Headcount') ?></th>
                <th><?= __('Operation Activity Id') ?></th>
                <th><?= __('Operation Environment Id') ?></th>
                <th><?= __('Operation Delay Id') ?></th>
                <th><?= __('Public Ris') ?></th>
                <th><?= __('Operation Type Id') ?></th>
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
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($operationType->operations as $operations): ?>
            <tr>
                <td><?= h($operations->id) ?></td>
                <td><?= h($operations->event_id) ?></td>
                <td><?= h($operations->barrack_id) ?></td>
                <td><?= h($operations->public_headcount) ?></td>
                <td><?= h($operations->operation_activity_id) ?></td>
                <td><?= h($operations->operation_environment_id) ?></td>
                <td><?= h($operations->operation_delay_id) ?></td>
                <td><?= h($operations->public_ris) ?></td>
                <td><?= h($operations->operation_type_id) ?></td>
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
