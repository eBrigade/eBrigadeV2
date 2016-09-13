<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehicle Type'), ['action' => 'edit', $vehicleType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehicle Type'), ['action' => 'delete', $vehicleType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicleType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehicle Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehicleTypes view large-9 medium-8 columns content">
    <h3><?= h($vehicleType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($vehicleType->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($vehicleType->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($vehicleType->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Picture') ?></th>
            <td><?= h($vehicleType->picture) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehicleType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Vehicles') ?></h4>
        <?php if (!empty($vehicleType->vehicles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Matriculation') ?></th>
                <th><?= __('Number Kilometer') ?></th>
                <th><?= __('Snow') ?></th>
                <th><?= __('Air Conditionner') ?></th>
                <th><?= __('Vehicle Type Id') ?></th>
                <th><?= __('Vehicle Model Id') ?></th>
                <th><?= __('Bought') ?></th>
                <th><?= __('End Warranty') ?></th>
                <th><?= __('Next Revision') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($vehicleType->vehicles as $vehicles): ?>
            <tr>
                <td><?= h($vehicles->id) ?></td>
                <td><?= h($vehicles->matriculation) ?></td>
                <td><?= h($vehicles->number_kilometer) ?></td>
                <td><?= h($vehicles->snow) ?></td>
                <td><?= h($vehicles->air_conditionner) ?></td>
                <td><?= h($vehicles->vehicle_type_id) ?></td>
                <td><?= h($vehicles->vehicle_model_id) ?></td>
                <td><?= h($vehicles->bought) ?></td>
                <td><?= h($vehicles->end_warranty) ?></td>
                <td><?= h($vehicles->next_revision) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vehicles', 'action' => 'view', $vehicles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Vehicles', 'action' => 'edit', $vehicles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vehicles', 'action' => 'delete', $vehicles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
