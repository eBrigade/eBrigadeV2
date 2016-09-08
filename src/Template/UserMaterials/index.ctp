<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Material'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userMaterials index large-9 medium-8 columns content">
    <h3><?= __('User Materials') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('material_id') ?></th>
                <th><?= $this->Paginator->sort('from_date') ?></th>
                <th><?= $this->Paginator->sort('to_date') ?></th>
                <th><?= $this->Paginator->sort('quantity') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userMaterials as $userMaterial): ?>
            <tr>
                <td><?= $userMaterial->has('user') ? $this->Html->link($userMaterial->user->id, ['controller' => 'Users', 'action' => 'view', $userMaterial->user->id]) : '' ?></td>
                <td><?= $userMaterial->has('material') ? $this->Html->link($userMaterial->material->id, ['controller' => 'Materials', 'action' => 'view', $userMaterial->material->id]) : '' ?></td>
                <td><?= h($userMaterial->from_date) ?></td>
                <td><?= h($userMaterial->to_date) ?></td>
                <td><?= $this->Number->format($userMaterial->quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userMaterial->user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userMaterial->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userMaterial->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $userMaterial->user_id)]) ?>
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
