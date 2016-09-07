<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Availabilities'), ['controller' => 'Availabilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Availability'), ['controller' => 'Availabilities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Materials'), ['controller' => 'UserMaterials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Material'), ['controller' => 'UserMaterials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('firstname') ?></th>
                <th><?= $this->Paginator->sort('lastname') ?></th>
                <th><?= $this->Paginator->sort('birthname') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('login') ?></th>
                <th><?= $this->Paginator->sort('password') ?></th>
                <th><?= $this->Paginator->sort('phone') ?></th>
                <th><?= $this->Paginator->sort('cellphone') ?></th>
                <th><?= $this->Paginator->sort('workphone') ?></th>
                <th><?= $this->Paginator->sort('address') ?></th>
                <th><?= $this->Paginator->sort('address_complement') ?></th>
                <th><?= $this->Paginator->sort('zipcode') ?></th>
                <th><?= $this->Paginator->sort('city') ?></th>
                <th><?= $this->Paginator->sort('birthday') ?></th>
                <th><?= $this->Paginator->sort('birthplace') ?></th>
                <th><?= $this->Paginator->sort('skype') ?></th>
                <th><?= $this->Paginator->sort('is_active') ?></th>
                <th><?= $this->Paginator->sort('external') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('connected') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->firstname) ?></td>
                <td><?= h($user->lastname) ?></td>
                <td><?= h($user->birthname) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->login) ?></td>
                <td><?= h($user->password) ?></td>
                <td><?= h($user->phone) ?></td>
                <td><?= h($user->cellphone) ?></td>
                <td><?= h($user->workphone) ?></td>
                <td><?= h($user->address) ?></td>
                <td><?= h($user->address_complement) ?></td>
                <td><?= h($user->zipcode) ?></td>
                <td><?= h($user->city) ?></td>
                <td><?= h($user->birthday) ?></td>
                <td><?= h($user->birthplace) ?></td>
                <td><?= h($user->skype) ?></td>
                <td><?= h($user->is_active) ?></td>
                <td><?= h($user->external) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td><?= h($user->connected) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
