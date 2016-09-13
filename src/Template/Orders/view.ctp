<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Supplies'), ['controller' => 'Supplies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supply'), ['controller' => 'Supplies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orders view large-9 medium-8 columns content">
    <h3><?= h($order->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Provider') ?></th>
            <td><?= $order->has('provider') ? $this->Html->link($order->provider->name, ['controller' => 'Providers', 'action' => 'view', $order->provider->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $order->has('user') ? $this->Html->link($order->user->id, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($order->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Supplies') ?></h4>
        <?php if (!empty($order->supplies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->supplies as $supplies): ?>
            <tr>
                <td><?= h($supplies->id) ?></td>
                <td><?= h($supplies->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Supplies', 'action' => 'view', $supplies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Supplies', 'action' => 'edit', $supplies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Supplies', 'action' => 'delete', $supplies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
