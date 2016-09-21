<?php
if (empty($list)): echo 'Pas d\'élément de ce type dans cette équipe'; ?>
<?php endif; ?>
<?php if (!empty($list)): ?>

<div class="table-responsive">
    <h3>Contenu de l'équipe <? $containerID?></h3>
    <table class="table table-striped">
        <thead>
        <tr id="paginator">
            <th class="actions"><?= __('Actions') ?></th>
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

        </tr>
        </thead>
        <tbody>

        <?php foreach ($list as $item): ?>
            <tr>
                <td class="actions">
                    <?= $this->Html->link($this->Html->icon('minus'), ['action' => 'remove', $item->id],
                        ['class' => 'btn btn-danger action-btn', 'escape' => false, 'id' => 'remove-' . $item->id]) ?>

                </td>
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

                <td><?php if (!empty($item->barracks[0]->name)): echo h($item->barracks[0]->name); endif;?></td>


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

<?php endif; ?>
