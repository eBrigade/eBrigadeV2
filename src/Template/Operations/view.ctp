<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Operation'), ['action' => 'edit', $operation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Operation'), ['action' => 'delete', $operation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Operations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Operation Activities'), ['controller' => 'OperationActivities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation Activity'), ['controller' => 'OperationActivities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Operation Environments'), ['controller' => 'OperationEnvironments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation Environment'), ['controller' => 'OperationEnvironments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Operation Delays'), ['controller' => 'OperationDelays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation Delay'), ['controller' => 'OperationDelays', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Operation Recommendations'), ['controller' => 'OperationRecommendations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation Recommendation'), ['controller' => 'OperationRecommendations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Organizations'), ['controller' => 'Organizations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organization'), ['controller' => 'Organizations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Operation Types'), ['controller' => 'OperationTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation Type'), ['controller' => 'OperationTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="operations view large-9 medium-8 columns content">
    <h3><?= h($operation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Event') ?></th>
            <td><?= $operation->has('event') ? $this->Html->link($operation->event->title, ['controller' => 'Events', 'action' => 'view', $operation->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Barrack') ?></th>
            <td><?= $operation->has('barrack') ? $this->Html->link($operation->barrack->name, ['controller' => 'Barracks', 'action' => 'view', $operation->barrack->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= $operation->has('city') ? $this->Html->link($operation->city->id, ['controller' => 'Cities', 'action' => 'view', $operation->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($operation->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Operation Activity') ?></th>
            <td><?= $operation->has('operation_activity') ? $this->Html->link($operation->operation_activity->title, ['controller' => 'OperationActivities', 'action' => 'view', $operation->operation_activity->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Operation Environment') ?></th>
            <td><?= $operation->has('operation_environment') ? $this->Html->link($operation->operation_environment->title, ['controller' => 'OperationEnvironments', 'action' => 'view', $operation->operation_environment->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Operation Delay') ?></th>
            <td><?= $operation->has('operation_delay') ? $this->Html->link($operation->operation_delay->title, ['controller' => 'OperationDelays', 'action' => 'view', $operation->operation_delay->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Operation Recommendation') ?></th>
            <td><?= $operation->has('operation_recommendation') ? $this->Html->link($operation->operation_recommendation->title, ['controller' => 'OperationRecommendations', 'action' => 'view', $operation->operation_recommendation->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Public Reinforcement') ?></th>
            <td><?= h($operation->public_reinforcement) ?></td>
        </tr>
        <tr>
            <th><?= __('Organization') ?></th>
            <td><?= $operation->has('organization') ? $this->Html->link($operation->organization->title, ['controller' => 'Organizations', 'action' => 'view', $operation->organization->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Operation Type') ?></th>
            <td><?= $operation->has('operation_type') ? $this->Html->link($operation->operation_type->title, ['controller' => 'OperationTypes', 'action' => 'view', $operation->operation_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($operation->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Public Headcount') ?></th>
            <td><?= $this->Number->format($operation->public_headcount) ?></td>
        </tr>
        <tr>
            <th><?= __('Public Ris') ?></th>
            <td><?= $this->Number->format($operation->public_ris) ?></td>
        </tr>
        <tr>
            <th><?= __('Public Total') ?></th>
            <td><?= $this->Number->format($operation->public_total) ?></td>
        </tr>
        <tr>
            <th><?= __('Actors Headcount') ?></th>
            <td><?= $this->Number->format($operation->actors_headcount) ?></td>
        </tr>
        <tr>
            <th><?= __('Rescuers Total') ?></th>
            <td><?= $this->Number->format($operation->rescuers_total) ?></td>
        </tr>
        <tr>
            <th><?= __('Headcount Total') ?></th>
            <td><?= $this->Number->format($operation->headcount_total) ?></td>
        </tr>
        <tr>
            <th><?= __('Report Assisted') ?></th>
            <td><?= $this->Number->format($operation->report_assisted) ?></td>
        </tr>
        <tr>
            <th><?= __('Report Slight') ?></th>
            <td><?= $this->Number->format($operation->report_slight) ?></td>
        </tr>
        <tr>
            <th><?= __('Report Medicalized') ?></th>
            <td><?= $this->Number->format($operation->report_medicalized) ?></td>
        </tr>
        <tr>
            <th><?= __('Report Reinforcement') ?></th>
            <td><?= $this->Number->format($operation->report_reinforcement) ?></td>
        </tr>
        <tr>
            <th><?= __('Report Evacuated') ?></th>
            <td><?= $this->Number->format($operation->report_evacuated) ?></td>
        </tr>
        <tr>
            <th><?= __('Meals Morning') ?></th>
            <td><?= $this->Number->format($operation->meals_morning) ?></td>
        </tr>
        <tr>
            <th><?= __('Meals Lunch') ?></th>
            <td><?= $this->Number->format($operation->meals_lunch) ?></td>
        </tr>
        <tr>
            <th><?= __('Meals Dinner') ?></th>
            <td><?= $this->Number->format($operation->meals_dinner) ?></td>
        </tr>
        <tr>
            <th><?= __('Meals Unit Cost') ?></th>
            <td><?= $this->Number->format($operation->meals_unit_cost) ?></td>
        </tr>
        <tr>
            <th><?= __('Meals Charge') ?></th>
            <td><?= $this->Number->format($operation->meals_charge) ?></td>
        </tr>
        <tr>
            <th><?= __('Meals Cost') ?></th>
            <td><?= $this->Number->format($operation->meals_cost) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Kilometers Vps') ?></th>
            <td><?= $this->Number->format($operation->cost_kilometers_vps) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Kilometers Other') ?></th>
            <td><?= $this->Number->format($operation->cost_kilometers_other) ?></td>
        </tr>
        <tr>
            <th><?= __('Discount Percentage') ?></th>
            <td><?= $this->Number->format($operation->discount_percentage) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Percentage Adpc') ?></th>
            <td><?= $this->Number->format($operation->cost_percentage_adpc) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Cost') ?></th>
            <td><?= $this->Number->format($operation->total_cost) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($operation->date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Actors Organization') ?></h4>
        <?= $this->Text->autoParagraph(h($operation->actors_organization)); ?>
    </div>
    <div class="row">
        <h4><?= __('General Organization') ?></h4>
        <?= $this->Text->autoParagraph(h($operation->general_organization)); ?>
    </div>
    <div class="row">
        <h4><?= __('Transport Organization') ?></h4>
        <?= $this->Text->autoParagraph(h($operation->transport_organization)); ?>
    </div>
    <div class="row">
        <h4><?= __('Team Instructions') ?></h4>
        <?= $this->Text->autoParagraph(h($operation->team_instructions)); ?>
    </div>
    <div class="row">
        <h4><?= __('Report Bilan Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($operation->report_bilan_notes)); ?>
    </div>
    <div class="row">
        <h4><?= __('Discount Reason') ?></h4>
        <?= $this->Text->autoParagraph(h($operation->discount_reason)); ?>
    </div>
</div>
