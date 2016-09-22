<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="operations index large-9 medium-8 columns content">
    <h3><?= __('Operations') ?></h3>
    <table cellpadding="0" cellspacing="0"  class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('barrack_id') ?></th>
                <th><?= $this->Paginator->sort('date') ?></th>
                <th><?= $this->Paginator->sort('operation_type_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($operations as $operation): ?>
            <tr>
                <td><?= h($operation->title) ?></td>
                <td><?= $operation->has('barrack') ? $this->Html->link($operation->barrack->name, ['controller' => 'Barracks', 'action' => 'view', $operation->barrack->id]) : '' ?></td>
                <td><?= h($operation->date) ?></td>
                <td><?= $operation->has('operation_type') ? $this->Html->link($operation->operation_type->title, ['controller' => 'OperationTypes', 'action' => 'view', $operation->operation_type->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link($this->Html->icon('eye-open'), ['controller' => 'Gestion', 'action' => 'gestion', 'operations', $operation->id ], ['class'=>'btn btn-primary','escape'=>false]) ?>
                    <?= $this->Html->link($this->Html->icon('pencil'), ['action' => 'edit', $operation->id], ['class'=>'btn btn-info','escape'=>false]) ?>
                    <?= $this->Form->postLink($this->Html->icon('trash'), ['action' => 'delete', $operation->id], ['class'=>'btn btn-danger','escape'=>false], ['confirm' => __('Are you sure you want to delete # {0}?', $operation->id)]) ?>
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
