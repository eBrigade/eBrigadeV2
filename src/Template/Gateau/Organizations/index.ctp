<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Organization'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="organizations index col-lg-9 col-md-8 columns content">
    <h3><?= __('Organizations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('adress') ?></th>
                <th><?= $this->Paginator->sort('city_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($organizations as $organization): ?>
            <tr>
                <td><?= $this->Number->format($organization->id) ?></td>
                <td><?= h($organization->title) ?></td>
                <td><?= h($organization->adress) ?></td>
                <td><?= $organization->has('city') ? $this->Html->link($organization->city->, ['controller' => 'Cities', 'action' => 'view', $organization->city->]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $organization->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $organization->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $organization->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organization->id)]) ?>
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
