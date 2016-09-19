<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="events view large-9 medium-8 columns content">
    <h3><?= h($event->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($event->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Instructions') ?></th>
            <td><?= h($event->instructions) ?></td>
        </tr>
        <tr>
            <th><?= __('Module') ?></th>
            <td><?= h($event->module) ?></td>
        </tr>
        <tr>
            <th><?= __('Operation') ?></th>
            <td><?= $event->has('operation') ? $this->Html->link($event->operation->id, ['controller' => 'Operations', 'action' => 'view', $event->operation->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($event->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($event->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($event->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Event Start Date') ?></th>
            <td><?= h($event->event_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Event End Date') ?></th>
            <td><?= h($event->event_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Public') ?></th>
            <td><?= $event->public ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Teams') ?></h4>
        <?php if (!empty($event->teams)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Position Adresse') ?></th>
                <th><?= __('Radio Indicatif') ?></th>
                <th><?= __('Radio Frequence') ?></th>
                <th><?= __('Latitude') ?></th>
                <th><?= __('Longitude') ?></th>
                <th><?= __('Horaires') ?></th>
                <th><?= __('Consignes') ?></th>
                <th><?= __('Prix') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->teams as $teams): ?>
            <tr>
                <td><?= h($teams->id) ?></td>
                <td><?= h($teams->name) ?></td>
                <td><?= h($teams->description) ?></td>
                <td><?= h($teams->position_adresse) ?></td>
                <td><?= h($teams->radio_indicatif) ?></td>
                <td><?= h($teams->radio_frequence) ?></td>
                <td><?= h($teams->latitude) ?></td>
                <td><?= h($teams->longitude) ?></td>
                <td><?= h($teams->horaires) ?></td>
                <td><?= h($teams->consignes) ?></td>
                <td><?= h($teams->prix) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Teams', 'action' => 'view', $teams->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Teams', 'action' => 'edit', $teams->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Teams', 'action' => 'delete', $teams->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teams->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Materials') ?></h4>
        <?php if (!empty($event->materials)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Material Type Id') ?></th>
                <th><?= __('Barrack Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->materials as $materials): ?>
            <tr>
                <td><?= h($materials->id) ?></td>
                <td><?= h($materials->name) ?></td>
                <td><?= h($materials->description) ?></td>
                <td><?= h($materials->material_type_id) ?></td>
                <td><?= h($materials->barrack_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Materials', 'action' => 'view', $materials->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Materials', 'action' => 'edit', $materials->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Materials', 'action' => 'delete', $materials->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materials->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Vehicles') ?></h4>
        <?php if (!empty($event->vehicles)): ?>
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
            <?php foreach ($event->vehicles as $vehicles): ?>
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
