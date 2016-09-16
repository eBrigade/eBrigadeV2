<div class="row">
    <div class="col-sm-12 col-md-8 col-md-offset-2">
        <?= $this->Html->link('Editer le stock',['controller' => 'MaterialStocks','action' => 'index']) ?>
        <div class="table-responsive">
            <h3><?= __('Materials') ?></h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('material_type_id') ?></th>
                    <th><?= $this->Paginator->sort('barrack_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($materials as $material): ?>
                    <tr>
                        <td><?= $this->Number->format($material->id) ?></td>
                        <td><?= h($material->name) ?></td>
                        <td><?= $material->has('material_type') ? $this->Html->link($material->material_type->name, ['controller' => 'MaterialTypes', 'action' => 'view', $material->material_type->id]) : '' ?></td>
                        <td><?= $this->Number->format($material->barrack_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link($this->Html->icon('eye-open'), ['action' => 'view', $material->id],['escape' => false,'class' => 'btn btn-info']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $material->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $material->id], ['confirm' => __('Are you sure you want to delete # {0}?', $material->id)]) ?>
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
    </div>
</div>

