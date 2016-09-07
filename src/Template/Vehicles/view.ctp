<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehicle'), ['action' => 'edit', $vehicle->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehicle'), ['action' => 'delete', $vehicle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicle Types'), ['controller' => 'VehicleTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle Type'), ['controller' => 'VehicleTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicle Models'), ['controller' => 'VehicleModels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle Model'), ['controller' => 'VehicleModels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
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
            <th><?= __('Vehicle Type') ?></th>
            <td><?= $vehicle->has('vehicle_type') ? $this->Html->link($vehicle->vehicle_type->name, ['controller' => 'VehicleTypes', 'action' => 'view', $vehicle->vehicle_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Vehicle Model') ?></th>
            <td><?= $vehicle->has('vehicle_model') ? $this->Html->link($vehicle->vehicle_model->name, ['controller' => 'VehicleModels', 'action' => 'view', $vehicle->vehicle_model->id]) : '' ?></td>
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
        <h4><?= __('Related Barracks') ?></h4>
        <?php if (!empty($vehicle->barracks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('City Id') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Fax') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Website Url') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($vehicle->barracks as $barracks): ?>
            <tr>
                <td><?= h($barracks->id) ?></td>
                <td><?= h($barracks->name) ?></td>
                <td><?= h($barracks->address) ?></td>
                <td><?= h($barracks->city_id) ?></td>
                <td><?= h($barracks->phone) ?></td>
                <td><?= h($barracks->fax) ?></td>
                <td><?= h($barracks->email) ?></td>
                <td><?= h($barracks->website_url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Barracks', 'action' => 'view', $barracks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Barracks', 'action' => 'edit', $barracks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Barracks', 'action' => 'delete', $barracks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $barracks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Events') ?></h4>
        <?php if (!empty($vehicle->events)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('City Id') ?></th>
                <th><?= __('Bill Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Latitude') ?></th>
                <th><?= __('Longitude') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Is Closed') ?></th>
                <th><?= __('Closed') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Canceled') ?></th>
                <th><?= __('Canceled Detail') ?></th>
                <th><?= __('Is Active') ?></th>
                <th><?= __('Instructions') ?></th>
                <th><?= __('Details') ?></th>
                <th><?= __('Barrack Id') ?></th>
                <th><?= __('Event Start Date') ?></th>
                <th><?= __('Event End Date') ?></th>
                <th><?= __('Horaires') ?></th>
                <th><?= __('Public') ?></th>
                <th><?= __('Event Type Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($vehicle->events as $events): ?>
            <tr>
                <td><?= h($events->id) ?></td>
                <td><?= h($events->city_id) ?></td>
                <td><?= h($events->bill_id) ?></td>
                <td><?= h($events->title) ?></td>
                <td><?= h($events->address) ?></td>
                <td><?= h($events->latitude) ?></td>
                <td><?= h($events->longitude) ?></td>
                <td><?= h($events->created) ?></td>
                <td><?= h($events->modified) ?></td>
                <td><?= h($events->is_closed) ?></td>
                <td><?= h($events->closed) ?></td>
                <td><?= h($events->price) ?></td>
                <td><?= h($events->canceled) ?></td>
                <td><?= h($events->canceled_detail) ?></td>
                <td><?= h($events->is_active) ?></td>
                <td><?= h($events->instructions) ?></td>
                <td><?= h($events->details) ?></td>
                <td><?= h($events->barrack_id) ?></td>
                <td><?= h($events->event_start_date) ?></td>
                <td><?= h($events->event_end_date) ?></td>
                <td><?= h($events->horaires) ?></td>
                <td><?= h($events->public) ?></td>
                <td><?= h($events->event_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Events', 'action' => 'view', $events->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Events', 'action' => 'edit', $events->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Events', 'action' => 'delete', $events->id], ['confirm' => __('Are you sure you want to delete # {0}?', $events->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Teams') ?></h4>
        <?php if (!empty($vehicle->teams)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($vehicle->teams as $teams): ?>
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
                <th><?= __('Workphone') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Address Complement') ?></th>
                <th><?= __('Zipcode') ?></th>
                <th><?= __('City') ?></th>
                <th><?= __('Birthday') ?></th>
                <th><?= __('Birthplace') ?></th>
                <th><?= __('Skype') ?></th>
                <th><?= __('Is Active') ?></th>
                <th><?= __('External') ?></th>
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
                <td><?= h($users->workphone) ?></td>
                <td><?= h($users->address) ?></td>
                <td><?= h($users->address_complement) ?></td>
                <td><?= h($users->zipcode) ?></td>
                <td><?= h($users->city) ?></td>
                <td><?= h($users->birthday) ?></td>
                <td><?= h($users->birthplace) ?></td>
                <td><?= h($users->skype) ?></td>
                <td><?= h($users->is_active) ?></td>
                <td><?= h($users->external) ?></td>
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
