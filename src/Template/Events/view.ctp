<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Creators'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Creator'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bills'), ['controller' => 'Bills', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bill'), ['controller' => 'Bills', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Event Equipments'), ['controller' => 'EventEquipments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Equipment'), ['controller' => 'EventEquipments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Event Teams'), ['controller' => 'EventTeams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Team'), ['controller' => 'EventTeams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Event Vehicles'), ['controller' => 'EventVehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Vehicle'), ['controller' => 'EventVehicles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="events view large-9 medium-8 columns content">
    <h3><?= h($event->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('City') ?></th>
            <td><?= $event->has('city') ? $this->Html->link($event->city->id, ['controller' => 'Cities', 'action' => 'view', $event->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Creator') ?></th>
            <td><?= $event->has('creator') ? $this->Html->link($event->creator->id, ['controller' => 'Users', 'action' => 'view', $event->creator->id]) : '' ?></td>
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
            <th><?= __('Responsible Id') ?></th>
            <td><?= h($event->responsible_id) ?></td>
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
        <h4><?= __('Related Event Equipments') ?></h4>
        <?php if (!empty($event->event_equipments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Equipment Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->event_equipments as $eventEquipments): ?>
            <tr>
                <td><?= h($eventEquipments->event_id) ?></td>
                <td><?= h($eventEquipments->equipment_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EventEquipments', 'action' => 'view', $eventEquipments->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EventEquipments', 'action' => 'edit', $eventEquipments->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EventEquipments', 'action' => 'delete', $eventEquipments->], ['confirm' => __('Are you sure you want to delete # {0}?', $eventEquipments->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Event Teams') ?></h4>
        <?php if (!empty($event->event_teams)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Team Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Team Chief Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->event_teams as $eventTeams): ?>
            <tr>
                <td><?= h($eventTeams->team_id) ?></td>
                <td><?= h($eventTeams->user_id) ?></td>
                <td><?= h($eventTeams->event_id) ?></td>
                <td><?= h($eventTeams->team_chief_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EventTeams', 'action' => 'view', $eventTeams->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EventTeams', 'action' => 'edit', $eventTeams->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EventTeams', 'action' => 'delete', $eventTeams->], ['confirm' => __('Are you sure you want to delete # {0}?', $eventTeams->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Event Vehicles') ?></h4>
        <?php if (!empty($event->event_vehicles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Vehicle Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->event_vehicles as $eventVehicles): ?>
            <tr>
                <td><?= h($eventVehicles->event_id) ?></td>
                <td><?= h($eventVehicles->vehicle_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EventVehicles', 'action' => 'view', $eventVehicles->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EventVehicles', 'action' => 'edit', $eventVehicles->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EventVehicles', 'action' => 'delete', $eventVehicles->], ['confirm' => __('Are you sure you want to delete # {0}?', $eventVehicles->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Formations') ?></h4>
        <?php if (!empty($event->formations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Organization Id') ?></th>
                <th><?= __('Teacher Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->formations as $formations): ?>
            <tr>
                <td><?= h($formations->id) ?></td>
                <td><?= h($formations->organization_id) ?></td>
                <td><?= h($formations->teacher_id) ?></td>
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
        <h4><?= __('Related Operations') ?></h4>
        <?php if (!empty($event->operations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Event Id') ?></th>
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
            <?php foreach ($event->operations as $operations): ?>
            <tr>
                <td><?= h($operations->id) ?></td>
                <td><?= h($operations->event_id) ?></td>
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
