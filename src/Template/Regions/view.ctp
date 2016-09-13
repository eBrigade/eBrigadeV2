<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Region'), ['action' => 'edit', $region->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Region'), ['action' => 'delete', $region->id], ['confirm' => __('Are you sure you want to delete # {0}?', $region->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="regions view large-9 medium-8 columns content">
    <h3><?= h($region->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Region') ?></th>
            <td><?= h($region->region) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($region->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Departments') ?></h4>
        <?php if (!empty($region->departments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Dpt') ?></th>
                <th><?= __('Region Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($region->departments as $departments): ?>
            <tr>
                <td><?= h($departments->id) ?></td>
                <td><?= h($departments->dpt) ?></td>
                <td><?= h($departments->region_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Departments', 'action' => 'view', $departments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Departments', 'action' => 'edit', $departments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Departments', 'action' => 'delete', $departments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $departments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
