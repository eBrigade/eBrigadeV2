<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Supply'), ['action' => 'edit', $supply->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Supply'), ['action' => 'delete', $supply->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supply->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Supplies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supply'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="supplies view large-9 medium-8 columns content">
    <h3><?= h($supply->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($supply->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($supply->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Orders') ?></h4>
        <?php if (!empty($supply->orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Provider Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($supply->orders as $orders): ?>
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
        <h4><?= __('Related Providers') ?></h4>
        <?php if (!empty($supply->providers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Zipcode') ?></th>
                <th><?= __('City') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Descritpion') ?></th>
                <th><?= __('Website') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($supply->providers as $providers): ?>
            <tr>
                <td><?= h($providers->id) ?></td>
                <td><?= h($providers->name) ?></td>
                <td><?= h($providers->address) ?></td>
                <td><?= h($providers->zipcode) ?></td>
                <td><?= h($providers->city) ?></td>
                <td><?= h($providers->phone) ?></td>
                <td><?= h($providers->email) ?></td>
                <td><?= h($providers->descritpion) ?></td>
                <td><?= h($providers->website) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Providers', 'action' => 'view', $providers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Providers', 'action' => 'edit', $providers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Providers', 'action' => 'delete', $providers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $providers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
