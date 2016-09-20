<div class="row">
    <div class="col-sm-12 col-md-8 col-md-offset-2">
        <h3><?= __('Material Stocks') ?></h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('material_id') ?></th>
                <th><?= $this->Paginator->sort('stock') ?></th>
                <th><?= $this->Paginator->sort('affectation') ?></th>
                <th><?= $this->Paginator->sort('affectation_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($materialStocks as $materialStock): ?>
                <tr>
                    <td><?= $this->Number->format($materialStock->id) ?></td>
                    <td><?= $materialStock->has('material') ? $this->Html->link($materialStock->material->name, ['controller' => 'Materials', 'action' => 'view', $materialStock->material->id]) : '' ?></td>
                    <td><?= $this->Number->format($materialStock->stock) ?></td>
                    <td><?= h($materialStock->affectation) ?></td>
                    <td><?= $this->Number->format($materialStock->affectation_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link($this->Html->icon('eye-open'), ['action' => 'view', $materialStock->id],['class'=>'btn btn-primary','escape'=>false]) ?>
                        <?= $this->Html->link($this->Html->icon('pencil'), ['action' => 'edit', $materialStock->id],['class'=>'btn btn-info','escape'=>false]) ?>
                        <?= $this->Form->postLink($this->Html->icon('trash'), ['action' => 'delete', $materialStock->id],['class'=>'btn btn-danger','escape'=>false], ['confirm' => __('Are you sure you want to delete # {0}?', $materialStock->id)]) ?>
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