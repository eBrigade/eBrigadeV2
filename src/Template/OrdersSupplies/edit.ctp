<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ordersSupply->order_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ordersSupply->order_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Orders Supplies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Supplies'), ['controller' => 'Supplies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supply'), ['controller' => 'Supplies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ordersSupplies form large-9 medium-8 columns content">
    <?= $this->Form->create($ordersSupply) ?>
    <fieldset>
        <legend><?= __('Edit Orders Supply') ?></legend>
        <?php
            echo $this->Form->input('quantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
