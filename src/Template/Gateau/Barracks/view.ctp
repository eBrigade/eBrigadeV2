<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Barrack'), ['action' => 'edit', $barrack->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Barrack'), ['action' => 'delete', $barrack->id], ['confirm' => __('Are you sure you want to delete # {0}?', $barrack->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Barracks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Barrack'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Barrack Users'), ['controller' => 'BarrackUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Barrack User'), ['controller' => 'BarrackUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="barracks view col-lg-9 col-md-8 columns content">
    <h3><?= h($barrack->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($barrack->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($barrack->address) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= $barrack->has('city') ? $this->Html->link($barrack->city->, ['controller' => 'Cities', 'action' => 'view', $barrack->city->]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($barrack->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Fax') ?></th>
            <td><?= h($barrack->fax) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($barrack->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Website Url') ?></th>
            <td><?= h($barrack->website_url) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($barrack->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Barrack Users') ?></h4>
        <?php if (!empty($barrack->barrack_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('User Id') ?></th>
                <th><?= __('Barrack Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($barrack->barrack_users as $barrackUsers): ?>
            <tr>
                <td><?= h($barrackUsers->user_id) ?></td>
                <td><?= h($barrackUsers->barrack_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BarrackUsers', 'action' => 'view', $barrackUsers->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BarrackUsers', 'action' => 'edit', $barrackUsers->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BarrackUsers', 'action' => 'delete', $barrackUsers->], ['confirm' => __('Are you sure you want to delete # {0}?', $barrackUsers->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Events') ?></h4>
        <?php if (!empty($barrack->events)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('City Id') ?></th>
                <th><?= __('Creator Id') ?></th>
                <th><?= __('Bill Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Latitude') ?></th>
                <th><?= __('Longitude') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Is Closed') ?></th>
                <th><?= __('Closed') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Canceled') ?></th>
                <th><?= __('Canceled Detail') ?></th>
                <th><?= __('Is Active') ?></th>
                <th><?= __('Instructions') ?></th>
                <th><?= __('Responsible Id') ?></th>
                <th><?= __('Details') ?></th>
                <th><?= __('Barrack Id') ?></th>
                <th><?= __('Event Start Date') ?></th>
                <th><?= __('Event End Date') ?></th>
                <th><?= __('Horaires') ?></th>
                <th><?= __('Public') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($barrack->events as $events): ?>
            <tr>
                <td><?= h($events->id) ?></td>
                <td><?= h($events->city_id) ?></td>
                <td><?= h($events->creator_id) ?></td>
                <td><?= h($events->bill_id) ?></td>
                <td><?= h($events->title) ?></td>
                <td><?= h($events->address) ?></td>
                <td><?= h($events->latitude) ?></td>
                <td><?= h($events->longitude) ?></td>
                <td><?= h($events->created) ?></td>
                <td><?= h($events->modified) ?></td>
                <td><?= h($events->is_closed) ?></td>
                <td><?= h($events->closed) ?></td>
                <td><?= h($events->price) ?></td>
                <td><?= h($events->canceled) ?></td>
                <td><?= h($events->canceled_detail) ?></td>
                <td><?= h($events->is_active) ?></td>
                <td><?= h($events->instructions) ?></td>
                <td><?= h($events->responsible_id) ?></td>
                <td><?= h($events->details) ?></td>
                <td><?= h($events->barrack_id) ?></td>
                <td><?= h($events->event_start_date) ?></td>
                <td><?= h($events->event_end_date) ?></td>
                <td><?= h($events->horaires) ?></td>
                <td><?= h($events->public) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Events', 'action' => 'view', $events->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Events', 'action' => 'edit', $events->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Events', 'action' => 'delete', $events->id], ['confirm' => __('Are you sure you want to delete # {0}?', $events->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Materials') ?></h4>
        <?php if (!empty($barrack->materials)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('List Material Id') ?></th>
                <th><?= __('Type Material Id') ?></th>
                <th><?= __('Barrack Id') ?></th>
                <th><?= __('Stock') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($barrack->materials as $materials): ?>
            <tr>
                <td><?= h($materials->id) ?></td>
                <td><?= h($materials->list_material_id) ?></td>
                <td><?= h($materials->type_material_id) ?></td>
                <td><?= h($materials->barrack_id) ?></td>
                <td><?= h($materials->stock) ?></td>
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
</div>
