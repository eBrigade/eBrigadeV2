<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Material Stock'), ['action' => 'edit', $materialStock->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Material Stock'), ['action' => 'delete', $materialStock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materialStock->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Material Stocks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material Stock'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="materialStocks view large-9 medium-8 columns content">
    <h3><?= h($materialStock->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Material') ?></th>
            <td><?= $materialStock->has('material') ? $this->Html->link($materialStock->material->name, ['controller' => 'Materials', 'action' => 'view', $materialStock->material->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Affectation') ?></th>
            <td><?= h($materialStock->affectation) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($materialStock->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Stock') ?></th>
            <td><?= $this->Number->format($materialStock->stock) ?></td>
        </tr>
        <tr>
            <th><?= __('Affectation Id') ?></th>
            <td><?= $this->Number->format($materialStock->affectation_id) ?></td>
        </tr>
    </table>
</div>
