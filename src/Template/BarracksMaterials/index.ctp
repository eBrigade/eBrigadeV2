<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Barracks Material'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="barracksMaterials index large-9 medium-8 columns content">
    <h3><?= __('Barracks Materials') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('barrack_id') ?></th>
                <th><?= $this->Paginator->sort('material_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($barracksMaterials as $barracksMaterial): ?>
            <tr>
                <td><?= $barracksMaterial->has('barrack') ? $this->Html->link($barracksMaterial->barrack->name, ['controller' => 'Barracks', 'action' => 'view', $barracksMaterial->barrack->id]) : '' ?></td>
                <td><?= $barracksMaterial->has('material') ? $this->Html->link($barracksMaterial->material->name, ['controller' => 'Materials', 'action' => 'view', $barracksMaterial->material->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $barracksMaterial->barrack_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $barracksMaterial->barrack_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $barracksMaterial->barrack_id], ['confirm' => __('Are you sure you want to delete # {0}?', $barracksMaterial->barrack_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
