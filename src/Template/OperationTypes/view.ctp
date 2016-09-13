<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Operation Type'), ['action' => 'edit', $operationType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Operation Type'), ['action' => 'delete', $operationType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operationType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Operation Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="operationTypes view large-9 medium-8 columns content">
    <h3><?= h($operationType->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($operationType->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($operationType->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Min') ?></th>
            <td><?= $this->Number->format($operationType->min) ?></td>
        </tr>
        <tr>
            <th><?= __('Max') ?></th>
            <td><?= $this->Number->format($operationType->max) ?></td>
        </tr>
    </table>
</div>
