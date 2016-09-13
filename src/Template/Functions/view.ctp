<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Function'), ['action' => 'edit', $function->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Function'), ['action' => 'delete', $function->id], ['confirm' => __('Are you sure you want to delete # {0}?', $function->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Functions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Function'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="functions view large-9 medium-8 columns content">
    <h3><?= h($function->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($function->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($function->id) ?></td>
        </tr>
    </table>
</div>
