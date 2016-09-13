<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Orders Supply'), ['action' => 'edit', $ordersSupply->order_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Orders Supply'), ['action' => 'delete', $ordersSupply->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordersSupply->order_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orders Supplies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orders Supply'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Supplies'), ['controller' => 'Supplies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supply'), ['controller' => 'Supplies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ordersSupplies view large-9 medium-8 columns content">
    <h3><?= h($ordersSupply->order_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Order') ?></th>
            <td><?= $ordersSupply->has('order') ? $this->Html->link($ordersSupply->order->id, ['controller' => 'Orders', 'action' => 'view', $ordersSupply->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Supply') ?></th>
            <td><?= $ordersSupply->has('supply') ? $this->Html->link($ordersSupply->supply->name, ['controller' => 'Supplies', 'action' => 'view', $ordersSupply->supply->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($ordersSupply->quantity) ?></td>
        </tr>
    </table>
</div>
