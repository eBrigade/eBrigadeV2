<div class="row">
    <div class="col-sm-12 col-md-8 col-md-offset-2">
        <h3><?= __('Material Types') ?></h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($materialTypes as $materialType): ?>
                <tr>
                    <td><?= $this->Number->format($materialType->id) ?></td>
                    <td><?= h($materialType->name) ?></td>
                    <td><?= h($materialType->description) ?></td>
                    <td class="actions">
                        <?= $this->Html->link($this->Html->icon('eye-open'),['action' => 'view', $materialType->id],['class'=>'btn btn-primary','escape'=>false]) ?>
                        <?= $this->Html->link($this->Html->icon('pencil'),['action' => 'edit', $materialType->id],['class'=>'btn btn-info','escape'=>false]) ?>
                        <?= $this->Form->postLink($this->Html->icon('trash'), ['action' => 'delete', $materialType->id],['class'=>'btn btn-danger','escape'=>false], ['confirm' => __('Are you sure you want to delete # {0}?', $materialType->id)]) ?>
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