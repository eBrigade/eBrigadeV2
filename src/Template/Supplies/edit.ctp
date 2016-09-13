<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $supply->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $supply->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Supplies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="supplies form large-9 medium-8 columns content">
    <?= $this->Form->create($supply) ?>
    <fieldset>
        <legend><?= __('Edit Supply') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('orders._ids', ['options' => $orders]);
            echo $this->Form->input('providers._ids', ['options' => $providers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
