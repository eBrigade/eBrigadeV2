<div class="table-responsive">
    <h3>Filtrer les <? $contentType ?></h3>
    <table class="table table-striped">
        <thead>
        <tr id="paginator">

            <th><?= $this->Paginator->sort('id') ?></th>
            <?php if ($contentType == 'Users'): ?>
                <th><?= $this->Paginator->sort('firstname') ?></th>
                <th><?= $this->Paginator->sort('lastname') ?></th>
            <?php endif; ?>
            <?php if ($contentType == 'Materials'): ?>
                <th><?= $this->Paginator->sort('name') ?></th>
            <?php endif; ?>
            <?php if ($contentType == 'Vehicles'): ?>
                <th><?= $this->Paginator->sort('vehicle_types.name') ?></th>
            <?php endif; ?>
            <th><?= $this->Paginator->sort('barracks.name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($list as $item): ?>
            <tr>

                <td><?= $this->Number->format($item->id) ?></td>
                <?php if ($contentType == 'Users'): ?>
                    <td><?= h($item->firstname) ?></td>
                    <td><?= h($item->lastname) ?></td>
                <?php endif; ?>
                <?php if ($contentType == 'Materials'): ?>
                    <td><?= h($item->name) ?></td>
                <?php endif; ?>
                <?php if ($contentType == 'Vehicles'): ?>
                    <td><?= h($item->vehicle_type->name) ?></td>
                <?php endif; ?>

                <td><?php if (!empty($item->barracks[0]->name)): echo h($item->barracks[0]->name); endif; ?></td>
                <td class="actions">
                    <?= $this->Html->link($this->Html->icon('plus'), ['action' => 'remove', $item->id],
                        ['class' => 'btn btn-success action-btn', 'escape'=>false, 'id' => 'add-' . $item->id]) ?>

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
