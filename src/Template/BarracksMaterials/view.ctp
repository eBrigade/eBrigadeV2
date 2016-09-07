<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Barracks Material'), ['action' => 'edit', $barracksMaterial->barrack_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Barracks Material'), ['action' => 'delete', $barracksMaterial->barrack_id], ['confirm' => __('Are you sure you want to delete # {0}?', $barracksMaterial->barrack_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Barracks Materials'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Barracks Material'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="barracksMaterials view col-lg-9 col-md-8 columns content">
    <h3><?= h($barracksMaterial->barrack_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Barrack') ?></th>
            <td><?= $barracksMaterial->has('barrack') ? $this->Html->link($barracksMaterial->barrack->name, ['controller' => 'Barracks', 'action' => 'view', $barracksMaterial->barrack->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Material') ?></th>
            <td><?= $barracksMaterial->has('material') ? $this->Html->link($barracksMaterial->material->id, ['controller' => 'Materials', 'action' => 'view', $barracksMaterial->material->id]) : '' ?></td>
        </tr>
    </table>
</div>
