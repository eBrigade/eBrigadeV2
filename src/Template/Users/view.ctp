<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Availabilities'), ['controller' => 'Availabilities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Availability'), ['controller' => 'Availabilities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Materials'), ['controller' => 'UserMaterials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Material'), ['controller' => 'UserMaterials', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
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
            <th><?= __('Workphone') ?></th>
            <td><?= h($user->workphone) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($user->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Address Complement') ?></th>
            <td><?= h($user->address_complement) ?></td>
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
        <tr>
            <th><?= __('External') ?></th>
            <td><?= $user->external ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Availabilities') ?></h4>
        <?php if (!empty($user->availabilities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Result') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->availabilities as $availabilities): ?>
            <tr>
                <td><?= h($availabilities->id) ?></td>
                <td><?= h($availabilities->result) ?></td>
                <td><?= h($availabilities->user_id) ?></td>
                <td><?= h($availabilities->modified) ?></td>
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
        <h4><?= __('Related User Materials') ?></h4>
        <?php if (!empty($user->user_materials)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('User Id') ?></th>
                <th><?= __('Material Id') ?></th>
                <th><?= __('From Date') ?></th>
                <th><?= __('To Date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_materials as $userMaterials): ?>
            <tr>
                <td><?= h($userMaterials->user_id) ?></td>
                <td><?= h($userMaterials->material_id) ?></td>
                <td><?= h($userMaterials->from_date) ?></td>
                <td><?= h($userMaterials->to_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserMaterials', 'action' => 'view', $userMaterials->user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserMaterials', 'action' => 'edit', $userMaterials->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserMaterials', 'action' => 'delete', $userMaterials->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $userMaterials->user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Barracks') ?></h4>
        <?php if (!empty($user->barracks)): ?>
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
                <th><?= __('Ordre') ?></th>
                <th><?= __('Rib') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->barracks as $barracks): ?>
            <tr>
                <td><?= h($barracks->id) ?></td>
                <td><?= h($barracks->name) ?></td>
                <td><?= h($barracks->address) ?></td>
                <td><?= h($barracks->city_id) ?></td>
                <td><?= h($barracks->phone) ?></td>
                <td><?= h($barracks->fax) ?></td>
                <td><?= h($barracks->email) ?></td>
                <td><?= h($barracks->website_url) ?></td>
                <td><?= h($barracks->ordre) ?></td>
                <td><?= h($barracks->rib) ?></td>
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
        <h4><?= __('Related Teams') ?></h4>
        <?php if (!empty($user->teams)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->teams as $teams): ?>
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
        <?php if (!empty($user->vehicles)): ?>
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
            <?php foreach ($user->vehicles as $vehicles): ?>
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
