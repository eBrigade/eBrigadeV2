<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Providers Supply'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Supplies'), ['controller' => 'Supplies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supply'), ['controller' => 'Supplies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="providersSupplies index large-9 medium-8 columns content">
    <h3><?= __('Providers Supplies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('provider_id') ?></th>
                <th><?= $this->Paginator->sort('supply_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($providersSupplies as $providersSupply): ?>
            <tr>
                <td><?= $providersSupply->has('provider') ? $this->Html->link($providersSupply->provider->name, ['controller' => 'Providers', 'action' => 'view', $providersSupply->provider->id]) : '' ?></td>
                <td><?= $providersSupply->has('supply') ? $this->Html->link($providersSupply->supply->name, ['controller' => 'Supplies', 'action' => 'view', $providersSupply->supply->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $providersSupply->provider_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $providersSupply->provider_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $providersSupply->provider_id], ['confirm' => __('Are you sure you want to delete # {0}?', $providersSupply->provider_id)]) ?>
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
