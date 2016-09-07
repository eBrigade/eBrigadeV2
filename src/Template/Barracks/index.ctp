<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rescue Plans'), ['controller' => 'RescuePlans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rescue Plan'), ['controller' => 'RescuePlans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="barracks index large-9 medium-8 columns content">
    <h3><?= __('Barracks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('address') ?></th>
                <th><?= $this->Paginator->sort('city_id') ?></th>
                <th><?= $this->Paginator->sort('phone') ?></th>
                <th><?= $this->Paginator->sort('fax') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('website_url') ?></th>
                <th><?= $this->Paginator->sort('ordre') ?></th>
                <th><?= $this->Paginator->sort('rib') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($barracks as $barrack): ?>
            <tr>
                <td><?= $this->Number->format($barrack->id) ?></td>
                <td><?= h($barrack->name) ?></td>
                <td><?= h($barrack->address) ?></td>
                <td><?= $barrack->has('city') ? $this->Html->link($barrack->city->id, ['controller' => 'Cities', 'action' => 'view', $barrack->city->id]) : '' ?></td>
                <td><?= h($barrack->phone) ?></td>
                <td><?= h($barrack->fax) ?></td>
                <td><?= h($barrack->email) ?></td>
                <td><?= h($barrack->website_url) ?></td>
                <td><?= h($barrack->ordre) ?></td>
                <td><?= h($barrack->rib) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $barrack->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $barrack->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $barrack->id], ['confirm' => __('Are you sure you want to delete # {0}?', $barrack->id)]) ?>
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
