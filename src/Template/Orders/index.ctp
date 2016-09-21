<div class="row">
    <div class="col-sm-12 col-md-8 col-md-offset-2">
        <div class="table-responsive">
            <h3><?= __('Orders') ?></h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('material_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= $this->Number->format($order->id) ?></td>
                        <td><?= $order->has('material') ? $this->Html->link($order->material->name, ['controller' => 'Materials', 'action' => 'view', $order->material->id]) : '' ?></td>
                        <td><?= $this->Number->format($order->quantity) ?></td>
                        <td class="actions">
                            <?= $this->Html->link($this->Html->icon('eye-open'), ['action' => 'view', $order->id],['class' => 'btn btn-primary','escape'=>false]) ?>
                            <?= $this->Html->link($this->Html->icon('pencil'), ['action' => 'edit', $order->id],['class' => 'btn btn-success','escape'=>false]) ?>
                            <?= $this->Form->postLink($this->Html->icon('trash'), ['action' => 'delete', $order->id],['class' => 'btn btn-danger','escape'=>false],['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
                            <?= $this->Form->postLink($this->Html->icon('check'), ['action' => 'confirm', $order->material_id],['class' => 'btn btn-warning','escape'=>false],['confirm' => __('Are you sure you want to order # {0}?', $order->id)]) ?>
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