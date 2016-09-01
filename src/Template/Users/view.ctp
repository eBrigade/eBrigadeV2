<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Grades'), ['controller' => 'Grades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grade'), ['controller' => 'Grades', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Availabilities'), ['controller' => 'Availabilities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Availability'), ['controller' => 'Availabilities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Barrack Users'), ['controller' => 'BarrackUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Barrack User'), ['controller' => 'BarrackUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Borrowed Materials'), ['controller' => 'BorrowedMaterials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Borrowed Material'), ['controller' => 'BorrowedMaterials', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Borrowed Vehicles'), ['controller' => 'BorrowedVehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Borrowed Vehicle'), ['controller' => 'BorrowedVehicles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Event Teams'), ['controller' => 'EventTeams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Team'), ['controller' => 'EventTeams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Team Users'), ['controller' => 'TeamUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team User'), ['controller' => 'TeamUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Firstname') ?></th>
            <td><?= h($user->firstname) ?></td>
        </tr>
        <tr>
            <th><?= __('Lastname') ?></th>
            <td><?= h($user->lastname) ?></td>
        </tr>
        <tr>
            <th><?= __('Birthname') ?></th>
            <td><?= h($user->birthname) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Login') ?></th>
            <td><?= h($user->login) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($user->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Cellphone') ?></th>
            <td><?= h($user->cellphone) ?></td>
        </tr>
        <tr>
            <th><?= __('Zipcode') ?></th>
            <td><?= h($user->zipcode) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($user->city) ?></td>
        </tr>
        <tr>
            <th><?= __('Birthplace') ?></th>
            <td><?= h($user->birthplace) ?></td>
        </tr>
        <tr>
            <th><?= __('Skype') ?></th>
            <td><?= h($user->skype) ?></td>
        </tr>
        <tr>
            <th><?= __('Permission') ?></th>
            <td><?= $user->has('permission') ? $this->Html->link($user->permission->name, ['controller' => 'Permissions', 'action' => 'view', $user->permission->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Grade') ?></th>
            <td><?= $user->has('grade') ? $this->Html->link($user->grade->name, ['controller' => 'Grades', 'action' => 'view', $user->grade->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Birthday') ?></th>
            <td><?= h($user->birthday) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Connected') ?></th>
            <td><?= h($user->connected) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Active') ?></th>
            <td><?= $user->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($user->address)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Availabilities') ?></h4>
        <?php if (!empty($user->availabilities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Date') ?></th>
                <th><?= __('Time Slot') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->availabilities as $availabilities): ?>
            <tr>
                <td><?= h($availabilities->id) ?></td>
                <td><?= h($availabilities->date) ?></td>
                <td><?= h($availabilities->time_slot) ?></td>
                <td><?= h($availabilities->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Availabilities', 'action' => 'view', $availabilities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Availabilities', 'action' => 'edit', $availabilities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Availabilities', 'action' => 'delete', $availabilities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $availabilities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Barrack Users') ?></h4>
        <?php if (!empty($user->barrack_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('User Id') ?></th>
                <th><?= __('Barrack Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->barrack_users as $barrackUsers): ?>
            <tr>
                <td><?= h($barrackUsers->user_id) ?></td>
                <td><?= h($barrackUsers->barrack_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BarrackUsers', 'action' => 'view', $barrackUsers->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BarrackUsers', 'action' => 'edit', $barrackUsers->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BarrackUsers', 'action' => 'delete', $barrackUsers->], ['confirm' => __('Are you sure you want to delete # {0}?', $barrackUsers->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Borrowed Materials') ?></h4>
        <?php if (!empty($user->borrowed_materials)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Material Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Vehicle Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->borrowed_materials as $borrowedMaterials): ?>
            <tr>
                <td><?= h($borrowedMaterials->id) ?></td>
                <td><?= h($borrowedMaterials->material_id) ?></td>
                <td><?= h($borrowedMaterials->user_id) ?></td>
                <td><?= h($borrowedMaterials->event_id) ?></td>
                <td><?= h($borrowedMaterials->vehicle_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BorrowedMaterials', 'action' => 'view', $borrowedMaterials->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BorrowedMaterials', 'action' => 'edit', $borrowedMaterials->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BorrowedMaterials', 'action' => 'delete', $borrowedMaterials->id], ['confirm' => __('Are you sure you want to delete # {0}?', $borrowedMaterials->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Borrowed Vehicles') ?></h4>
        <?php if (!empty($user->borrowed_vehicles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Vehicle Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->borrowed_vehicles as $borrowedVehicles): ?>
            <tr>
                <td><?= h($borrowedVehicles->id) ?></td>
                <td><?= h($borrowedVehicles->vehicle_id) ?></td>
                <td><?= h($borrowedVehicles->user_id) ?></td>
                <td><?= h($borrowedVehicles->event_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BorrowedVehicles', 'action' => 'view', $borrowedVehicles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BorrowedVehicles', 'action' => 'edit', $borrowedVehicles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BorrowedVehicles', 'action' => 'delete', $borrowedVehicles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $borrowedVehicles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Event Teams') ?></h4>
        <?php if (!empty($user->event_teams)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Team Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Team Chief Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->event_teams as $eventTeams): ?>
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
        <h4><?= __('Related Orders') ?></h4>
        <?php if (!empty($user->orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Provider Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->orders as $orders): ?>
            <tr>
                <td><?= h($orders->id) ?></td>
                <td><?= h($orders->provider_id) ?></td>
                <td><?= h($orders->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Team Users') ?></h4>
        <?php if (!empty($user->team_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Team Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->team_users as $teamUsers): ?>
            <tr>
                <td><?= h($teamUsers->team_id) ?></td>
                <td><?= h($teamUsers->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TeamUsers', 'action' => 'view', $teamUsers->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TeamUsers', 'action' => 'edit', $teamUsers->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TeamUsers', 'action' => 'delete', $teamUsers->], ['confirm' => __('Are you sure you want to delete # {0}?', $teamUsers->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Vehicles') ?></h4>
        <?php if (!empty($user->vehicles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Matriculation') ?></th>
                <th><?= __('Number Kilometer') ?></th>
                <th><?= __('Snow') ?></th>
                <th><?= __('Air Conditionner') ?></th>
                <th><?= __('Type Vehicle Id') ?></th>
                <th><?= __('Model Vehicle Id') ?></th>
                <th><?= __('Bought') ?></th>
                <th><?= __('End Warranty') ?></th>
                <th><?= __('Next Revision') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->vehicles as $vehicles): ?>
            <tr>
                <td><?= h($vehicles->id) ?></td>
                <td><?= h($vehicles->matriculation) ?></td>
                <td><?= h($vehicles->number_kilometer) ?></td>
                <td><?= h($vehicles->snow) ?></td>
                <td><?= h($vehicles->air_conditionner) ?></td>
                <td><?= h($vehicles->type_vehicle_id) ?></td>
                <td><?= h($vehicles->model_vehicle_id) ?></td>
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
