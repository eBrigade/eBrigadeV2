<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Equipment Type'), ['action' => 'edit', $equipmentType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Equipment Type'), ['action' => 'delete', $equipmentType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipmentType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Equipment Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipment Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="equipmentTypes view large-9 medium-8 columns content">
    <h3><?= h($equipmentType->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($equipmentType->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($equipmentType->id) ?></td>
        </tr>
    </table>
</div>
