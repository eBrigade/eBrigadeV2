<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bills'), ['controller' => 'Bills', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bill'), ['controller' => 'Bills', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Event Types'), ['controller' => 'EventTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Type'), ['controller' => 'EventTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rescue Plans'), ['controller' => 'RescuePlans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rescue Plan'), ['controller' => 'RescuePlans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="events view col-lg-9 col-md-8 columns content">
    <h3><?= h($event->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('City') ?></th>
            <td><?= $event->has('city') ? $this->Html->link($event->city->id, ['controller' => 'Cities', 'action' => 'view', $event->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Bill') ?></th>
            <td><?= $event->has('bill') ? $this->Html->link($event->bill->id, ['controller' => 'Bills', 'action' => 'view', $event->bill->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($event->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($event->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Canceled Detail') ?></th>
            <td><?= h($event->canceled_detail) ?></td>
        </tr>
        <tr>
            <th><?= __('Instructions') ?></th>
            <td><?= h($event->instructions) ?></td>
        </tr>
        <tr>
            <th><?= __('Details') ?></th>
            <td><?= h($event->details) ?></td>
        </tr>
        <tr>
            <th><?= __('Barrack') ?></th>
            <td><?= $event->has('barrack') ? $this->Html->link($event->barrack->name, ['controller' => 'Barracks', 'action' => 'view', $event->barrack->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Horaires') ?></th>
            <td><?= h($event->horaires) ?></td>
        </tr>
        <tr>
            <th><?= __('Event Type') ?></th>
            <td><?= $event->has('event_type') ? $this->Html->link($event->event_type->title, ['controller' => 'EventTypes', 'action' => 'view', $event->event_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($event->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Latitude') ?></th>
            <td><?= $this->Number->format($event->latitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Longitude') ?></th>
            <td><?= $this->Number->format($event->longitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->format($event->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($event->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($event->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Closed') ?></th>
            <td><?= h($event->closed) ?></td>
        </tr>
        <tr>
            <th><?= __('Event Start Date') ?></th>
            <td><?= h($event->event_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Event End Date') ?></th>
            <td><?= h($event->event_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Closed') ?></th>
            <td><?= $event->is_closed ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Canceled') ?></th>
            <td><?= $event->canceled ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Active') ?></th>
            <td><?= $event->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Public') ?></th>
            <td><?= $event->public ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Formations') ?></h4>
        <?php if (!empty($event->formations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Organization Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Formation Type Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->formations as $formations): ?>
            <tr>
                <td><?= h($formations->id) ?></td>
                <td><?= h($formations->organization_id) ?></td>
                <td><?= h($formations->event_id) ?></td>
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
        <h4><?= __('Related Rescue Plans') ?></h4>
        <?php if (!empty($event->rescue_plans)): ?>
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
            <?php foreach ($event->rescue_plans as $rescuePlans): ?>
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
    <div class="related">
        <h4><?= __('Related Materials') ?></h4>
        <?php if (!empty($event->materials)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Material Type Id') ?></th>
                <th><?= __('Barrack Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->materials as $materials): ?>
            <tr>
                <td><?= h($materials->id) ?></td>
                <td><?= h($materials->material_type_id) ?></td>
                <td><?= h($materials->barrack_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Materials', 'action' => 'view', $materials->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Materials', 'action' => 'edit', $materials->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Materials', 'action' => 'delete', $materials->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materials->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Teams') ?></h4>
        <?php if (!empty($event->teams)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->teams as $teams): ?>
            <tr>
                <td><?= h($teams->id) ?></td>
                <td><?= h($teams->name) ?></td>
                <td><?= h($teams->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Teams', 'action' => 'view', $teams->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Teams', 'action' => 'edit', $teams->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Teams', 'action' => 'delete', $teams->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teams->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Vehicles') ?></h4>
        <?php if (!empty($event->vehicles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Matriculation') ?></th>
                <th><?= __('Number Kilometer') ?></th>
                <th><?= __('Snow') ?></th>
                <th><?= __('Air Conditionner') ?></th>
                <th><?= __('Vehicle Type Id') ?></th>
                <th><?= __('Vehicle Model Id') ?></th>
                <th><?= __('Bought') ?></th>
                <th><?= __('End Warranty') ?></th>
                <th><?= __('Next Revision') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->vehicles as $vehicles): ?>
            <tr>
                <td><?= h($vehicles->id) ?></td>
                <td><?= h($vehicles->matriculation) ?></td>
                <td><?= h($vehicles->number_kilometer) ?></td>
                <td><?= h($vehicles->snow) ?></td>
                <td><?= h($vehicles->air_conditionner) ?></td>
                <td><?= h($vehicles->vehicle_type_id) ?></td>
                <td><?= h($vehicles->vehicle_model_id) ?></td>
                <td><?= h($vehicles->bought) ?></td>
                <td><?= h($vehicles->end_warranty) ?></td>
                <td><?= h($vehicles->next_revision) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vehicles', 'action' => 'view', $vehicles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Vehicles', 'action' => 'edit', $vehicles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vehicles', 'action' => 'delete', $vehicles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
