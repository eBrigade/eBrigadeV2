<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehicle'), ['action' => 'edit', $vehicle->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehicle'), ['action' => 'delete', $vehicle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Model Vehicles'), ['controller' => 'ModelVehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Model Vehicle'), ['controller' => 'ModelVehicles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Event Vehicles'), ['controller' => 'EventVehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Vehicle'), ['controller' => 'EventVehicles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehicles view large-9 medium-8 columns content">
    <h3><?= h($vehicle->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Matriculation') ?></th>
            <td><?= h($vehicle->matriculation) ?></td>
        </tr>
        <tr>
            <th><?= __('Model Vehicle') ?></th>
            <td><?= $vehicle->has('model_vehicle') ? $this->Html->link($vehicle->model_vehicle->name, ['controller' => 'ModelVehicles', 'action' => 'view', $vehicle->model_vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehicle->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Number Kilometer') ?></th>
            <td><?= $this->Number->format($vehicle->number_kilometer) ?></td>
        </tr>
        <tr>
            <th><?= __('Type Vehicle Id') ?></th>
            <td><?= $this->Number->format($vehicle->type_vehicle_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Bought') ?></th>
            <td><?= h($vehicle->bought) ?></td>
        </tr>
        <tr>
            <th><?= __('End Warranty') ?></th>
            <td><?= h($vehicle->end_warranty) ?></td>
        </tr>
        <tr>
            <th><?= __('Next Revision') ?></th>
            <td><?= h($vehicle->next_revision) ?></td>
        </tr>
        <tr>
            <th><?= __('Snow') ?></th>
            <td><?= $vehicle->snow ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Air Conditionner') ?></th>
            <td><?= $vehicle->air_conditionner ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Event Vehicles') ?></h4>
        <?php if (!empty($vehicle->event_vehicles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Vehicle Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($vehicle->event_vehicles as $eventVehicles): ?>
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
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($vehicle->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Firstname') ?></th>
                <th><?= __('Lastname') ?></th>
                <th><?= __('Birthname') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Login') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Cellphone') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Zipcode') ?></th>
                <th><?= __('City') ?></th>
                <th><?= __('Birthday') ?></th>
                <th><?= __('Birthplace') ?></th>
                <th><?= __('Skype') ?></th>
                <th><?= __('Is Active') ?></th>
                <th><?= __('Permission Id') ?></th>
                <th><?= __('Grade Id') ?></th>
                <th><?= __('Role Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Connected') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($vehicle->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->firstname) ?></td>
                <td><?= h($users->lastname) ?></td>
                <td><?= h($users->birthname) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->login) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->phone) ?></td>
                <td><?= h($users->cellphone) ?></td>
                <td><?= h($users->address) ?></td>
                <td><?= h($users->zipcode) ?></td>
                <td><?= h($users->city) ?></td>
                <td><?= h($users->birthday) ?></td>
                <td><?= h($users->birthplace) ?></td>
                <td><?= h($users->skype) ?></td>
                <td><?= h($users->is_active) ?></td>
                <td><?= h($users->permission_id) ?></td>
                <td><?= h($users->grade_id) ?></td>
                <td><?= h($users->role_id) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td><?= h($users->connected) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
