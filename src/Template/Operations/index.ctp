<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['action' => 'add']) ?></li>
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
<div class="operations index large-9 medium-8 columns content">
    <h3><?= __('Operations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('event_id') ?></th>
                <th><?= $this->Paginator->sort('barrack_id') ?></th>
                <th><?= $this->Paginator->sort('city_id') ?></th>
                <th><?= $this->Paginator->sort('address') ?></th>
                <th><?= $this->Paginator->sort('public_headcount') ?></th>
                <th><?= $this->Paginator->sort('operation_activity_id') ?></th>
                <th><?= $this->Paginator->sort('operation_environment_id') ?></th>
                <th><?= $this->Paginator->sort('operation_delay_id') ?></th>
                <th><?= $this->Paginator->sort('public_ris') ?></th>
                <th><?= $this->Paginator->sort('operation_recommendation_id') ?></th>
                <th><?= $this->Paginator->sort('public_reinforcement') ?></th>
                <th><?= $this->Paginator->sort('public_total') ?></th>
                <th><?= $this->Paginator->sort('organization_id') ?></th>
                <th><?= $this->Paginator->sort('actors_headcount') ?></th>
                <th><?= $this->Paginator->sort('rescuers_total') ?></th>
                <th><?= $this->Paginator->sort('headcount_total') ?></th>
                <th><?= $this->Paginator->sort('report_assisted') ?></th>
                <th><?= $this->Paginator->sort('report_slight') ?></th>
                <th><?= $this->Paginator->sort('report_medicalized') ?></th>
                <th><?= $this->Paginator->sort('report_reinforcement') ?></th>
                <th><?= $this->Paginator->sort('report_evacuated') ?></th>
                <th><?= $this->Paginator->sort('meals_morning') ?></th>
                <th><?= $this->Paginator->sort('meals_lunch') ?></th>
                <th><?= $this->Paginator->sort('meals_dinner') ?></th>
                <th><?= $this->Paginator->sort('meals_unit_cost') ?></th>
                <th><?= $this->Paginator->sort('meals_charge') ?></th>
                <th><?= $this->Paginator->sort('meals_cost') ?></th>
                <th><?= $this->Paginator->sort('cost_kilometers_vps') ?></th>
                <th><?= $this->Paginator->sort('cost_kilometers_other') ?></th>
                <th><?= $this->Paginator->sort('discount_percentage') ?></th>
                <th><?= $this->Paginator->sort('cost_percentage_adpc') ?></th>
                <th><?= $this->Paginator->sort('total_cost') ?></th>
                <th><?= $this->Paginator->sort('date') ?></th>
                <th><?= $this->Paginator->sort('operation_type_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($operations as $operation): ?>
            <tr>
                <td><?= $this->Number->format($operation->id) ?></td>
                <td><?= $operation->has('event') ? $this->Html->link($operation->event->title, ['controller' => 'Events', 'action' => 'view', $operation->event->id]) : '' ?></td>
                <td><?= $operation->has('barrack') ? $this->Html->link($operation->barrack->name, ['controller' => 'Barracks', 'action' => 'view', $operation->barrack->id]) : '' ?></td>
                <td><?= $operation->has('city') ? $this->Html->link($operation->city->id, ['controller' => 'Cities', 'action' => 'view', $operation->city->id]) : '' ?></td>
                <td><?= h($operation->address) ?></td>
                <td><?= $this->Number->format($operation->public_headcount) ?></td>
                <td><?= $operation->has('operation_activity') ? $this->Html->link($operation->operation_activity->title, ['controller' => 'OperationActivities', 'action' => 'view', $operation->operation_activity->id]) : '' ?></td>
                <td><?= $operation->has('operation_environment') ? $this->Html->link($operation->operation_environment->title, ['controller' => 'OperationEnvironments', 'action' => 'view', $operation->operation_environment->id]) : '' ?></td>
                <td><?= $operation->has('operation_delay') ? $this->Html->link($operation->operation_delay->title, ['controller' => 'OperationDelays', 'action' => 'view', $operation->operation_delay->id]) : '' ?></td>
                <td><?= $this->Number->format($operation->public_ris) ?></td>
                <td><?= $operation->has('operation_recommendation') ? $this->Html->link($operation->operation_recommendation->title, ['controller' => 'OperationRecommendations', 'action' => 'view', $operation->operation_recommendation->id]) : '' ?></td>
                <td><?= h($operation->public_reinforcement) ?></td>
                <td><?= $this->Number->format($operation->public_total) ?></td>
                <td><?= $operation->has('organization') ? $this->Html->link($operation->organization->title, ['controller' => 'Organizations', 'action' => 'view', $operation->organization->id]) : '' ?></td>
                <td><?= $this->Number->format($operation->actors_headcount) ?></td>
                <td><?= $this->Number->format($operation->rescuers_total) ?></td>
                <td><?= $this->Number->format($operation->headcount_total) ?></td>
                <td><?= $this->Number->format($operation->report_assisted) ?></td>
                <td><?= $this->Number->format($operation->report_slight) ?></td>
                <td><?= $this->Number->format($operation->report_medicalized) ?></td>
                <td><?= $this->Number->format($operation->report_reinforcement) ?></td>
                <td><?= $this->Number->format($operation->report_evacuated) ?></td>
                <td><?= $this->Number->format($operation->meals_morning) ?></td>
                <td><?= $this->Number->format($operation->meals_lunch) ?></td>
                <td><?= $this->Number->format($operation->meals_dinner) ?></td>
                <td><?= $this->Number->format($operation->meals_unit_cost) ?></td>
                <td><?= $this->Number->format($operation->meals_charge) ?></td>
                <td><?= $this->Number->format($operation->meals_cost) ?></td>
                <td><?= $this->Number->format($operation->cost_kilometers_vps) ?></td>
                <td><?= $this->Number->format($operation->cost_kilometers_other) ?></td>
                <td><?= $this->Number->format($operation->discount_percentage) ?></td>
                <td><?= $this->Number->format($operation->cost_percentage_adpc) ?></td>
                <td><?= $this->Number->format($operation->total_cost) ?></td>
                <td><?= h($operation->date) ?></td>
                <td><?= $operation->has('operation_type') ? $this->Html->link($operation->operation_type->title, ['controller' => 'OperationTypes', 'action' => 'view', $operation->operation_type->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $operation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $operation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $operation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operation->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
