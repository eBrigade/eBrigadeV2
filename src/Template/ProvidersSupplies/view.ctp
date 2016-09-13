<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Providers Supply'), ['action' => 'edit', $providersSupply->provider_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Providers Supply'), ['action' => 'delete', $providersSupply->provider_id], ['confirm' => __('Are you sure you want to delete # {0}?', $providersSupply->provider_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Providers Supplies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Providers Supply'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Supplies'), ['controller' => 'Supplies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supply'), ['controller' => 'Supplies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="providersSupplies view large-9 medium-8 columns content">
    <h3><?= h($providersSupply->provider_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Provider') ?></th>
            <td><?= $providersSupply->has('provider') ? $this->Html->link($providersSupply->provider->name, ['controller' => 'Providers', 'action' => 'view', $providersSupply->provider->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Supply') ?></th>
            <td><?= $providersSupply->has('supply') ? $this->Html->link($providersSupply->supply->name, ['controller' => 'Supplies', 'action' => 'view', $providersSupply->supply->id]) : '' ?></td>
        </tr>
    </table>
</div>
