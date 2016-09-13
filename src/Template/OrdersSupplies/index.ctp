<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Orders Supply'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Supplies'), ['controller' => 'Supplies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supply'), ['controller' => 'Supplies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ordersSupplies index large-9 medium-8 columns content">
    <h3><?= __('Orders Supplies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('order_id') ?></th>
                <th><?= $this->Paginator->sort('supply_id') ?></th>
                <th><?= $this->Paginator->sort('quantity') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ordersSupplies as $ordersSupply): ?>
            <tr>
                <td><?= $ordersSupply->has('order') ? $this->Html->link($ordersSupply->order->id, ['controller' => 'Orders', 'action' => 'view', $ordersSupply->order->id]) : '' ?></td>
                <td><?= $ordersSupply->has('supply') ? $this->Html->link($ordersSupply->supply->name, ['controller' => 'Supplies', 'action' => 'view', $ordersSupply->supply->id]) : '' ?></td>
                <td><?= $this->Number->format($ordersSupply->quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ordersSupply->order_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ordersSupply->order_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ordersSupply->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordersSupply->order_id)]) ?>
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
