<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Barrack Type'), ['action' => 'edit', $barrackType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Barrack Type'), ['action' => 'delete', $barrackType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $barrackType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Barrack Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Barrack Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="barrackTypes view col-lg-9 col-md-8 columns content">
    <h3><?= h($barrackType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($barrackType->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($barrackType->id) ?></td>
        </tr>
    </table>
</div>
