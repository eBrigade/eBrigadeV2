<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Material'), ['action' => 'edit', $material->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Material'), ['action' => 'delete', $material->id], ['confirm' => __('Are you sure you want to delete # {0}?', $material->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Material Types'), ['controller' => 'MaterialTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material Type'), ['controller' => 'MaterialTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Borrowed Materials'), ['controller' => 'BorrowedMaterials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Borrowed Material'), ['controller' => 'BorrowedMaterials', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="materials view col-lg-9 col-md-8 columns content">
    <h3><?= h($material->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Material Type') ?></th>
            <td><?= $material->has('material_type') ? $this->Html->link($material->material_type->name, ['controller' => 'MaterialTypes', 'action' => 'view', $material->material_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Barrack') ?></th>
            <td><?= $material->has('barrack') ? $this->Html->link($material->barrack->name, ['controller' => 'Barracks', 'action' => 'view', $material->barrack->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($material->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Borrowed Materials') ?></h4>
        <?php if (!empty($material->borrowed_materials)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Material Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Vehicle Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($material->borrowed_materials as $borrowedMaterials): ?>
            <tr>
                <td><?= h($borrowedMaterials->id) ?></td>
                <td><?= h($borrowedMaterials->material_id) ?></td>
                <td><?= h($borrowedMaterials->user_id) ?></td>
                <td><?= h($borrowedMaterials->event_id) ?></td>
                <td><?= h($borrowedMaterials->vehicle_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BorrowedMaterials', 'action' => 'view', $borrowedMaterials->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BorrowedMaterials', 'action' => 'edit', $borrowedMaterials->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BorrowedMaterials', 'action' => 'delete', $borrowedMaterials->id], ['confirm' => __('Are you sure you want to delete # {0}?', $borrowedMaterials->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
