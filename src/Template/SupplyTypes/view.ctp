<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Supply Type'), ['action' => 'edit', $supplyType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Supply Type'), ['action' => 'delete', $supplyType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplyType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Supply Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supply Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="supplyTypes view large-9 medium-8 columns content">
    <h3><?= h($supplyType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($supplyType->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($supplyType->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Measure Unit') ?></th>
            <td><?= h($supplyType->measure_unit) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($supplyType->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity Per Unit') ?></th>
            <td><?= $this->Number->format($supplyType->quantity_per_unit) ?></td>
        </tr>
    </table>
</div>
