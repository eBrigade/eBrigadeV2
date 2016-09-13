<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit City'), ['action' => 'edit', $city->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete City'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Organizations'), ['controller' => 'Organizations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organization'), ['controller' => 'Organizations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cities view large-9 medium-8 columns content">
    <h3><?= h($city->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Dpt Id') ?></th>
            <td><?= h($city->dpt_id) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($city->city) ?></td>
        </tr>
        <tr>
            <th><?= __('Zipcode') ?></th>
            <td><?= h($city->zipcode) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($city->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Longitude') ?></th>
            <td><?= $this->Number->format($city->longitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Latitude') ?></th>
            <td><?= $this->Number->format($city->latitude) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Barracks') ?></h4>
        <?php if (!empty($city->barracks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Address Complement') ?></th>
                <th><?= __('City Id') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Fax') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Website Url') ?></th>
                <th><?= __('Ordre') ?></th>
                <th><?= __('Rib') ?></th>
                <th><?= __('Lft') ?></th>
                <th><?= __('Rght') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->barracks as $barracks): ?>
            <tr>
                <td><?= h($barracks->id) ?></td>
                <td><?= h($barracks->parent_id) ?></td>
                <td><?= h($barracks->name) ?></td>
                <td><?= h($barracks->address) ?></td>
                <td><?= h($barracks->address_complement) ?></td>
                <td><?= h($barracks->city_id) ?></td>
                <td><?= h($barracks->phone) ?></td>
                <td><?= h($barracks->fax) ?></td>
                <td><?= h($barracks->email) ?></td>
                <td><?= h($barracks->website_url) ?></td>
                <td><?= h($barracks->ordre) ?></td>
                <td><?= h($barracks->rib) ?></td>
                <td><?= h($barracks->lft) ?></td>
                <td><?= h($barracks->rght) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Barracks', 'action' => 'view', $barracks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Barracks', 'action' => 'edit', $barracks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Barracks', 'action' => 'delete', $barracks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $barracks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Events') ?></h4>
        <?php if (!empty($city->events)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('City Id') ?></th>
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
                <th><?= __('Details') ?></th>
                <th><?= __('Barrack Id') ?></th>
                <th><?= __('Event Start Date') ?></th>
                <th><?= __('Event End Date') ?></th>
                <th><?= __('Horaires') ?></th>
                <th><?= __('Public') ?></th>
                <th><?= __('Module') ?></th>
                <th><?= __('Module Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->events as $events): ?>
            <tr>
                <td><?= h($events->id) ?></td>
                <td><?= h($events->city_id) ?></td>
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
                <td><?= h($events->details) ?></td>
                <td><?= h($events->barrack_id) ?></td>
                <td><?= h($events->event_start_date) ?></td>
                <td><?= h($events->event_end_date) ?></td>
                <td><?= h($events->horaires) ?></td>
                <td><?= h($events->public) ?></td>
                <td><?= h($events->module) ?></td>
                <td><?= h($events->module_id) ?></td>
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
        <h4><?= __('Related Operations') ?></h4>
        <?php if (!empty($city->operations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Barrack Id') ?></th>
                <th><?= __('City Id') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Public Headcount') ?></th>
                <th><?= __('Operation Activity Id') ?></th>
                <th><?= __('Operation Environment Id') ?></th>
                <th><?= __('Operation Delay Id') ?></th>
                <th><?= __('Public Ris') ?></th>
                <th><?= __('Operation Recommendation Id') ?></th>
                <th><?= __('Public Reinforcement') ?></th>
                <th><?= __('Public Total') ?></th>
                <th><?= __('Organization Id') ?></th>
                <th><?= __('Actors Headcount') ?></th>
                <th><?= __('Rescuers Total') ?></th>
                <th><?= __('Headcount Total') ?></th>
                <th><?= __('Actors Organization') ?></th>
                <th><?= __('General Organization') ?></th>
                <th><?= __('Transport Organization') ?></th>
                <th><?= __('Team Instructions') ?></th>
                <th><?= __('Report Assisted') ?></th>
                <th><?= __('Report Slight') ?></th>
                <th><?= __('Report Medicalized') ?></th>
                <th><?= __('Report Reinforcement') ?></th>
                <th><?= __('Report Evacuated') ?></th>
                <th><?= __('Report Bilan Notes') ?></th>
                <th><?= __('Meals Morning') ?></th>
                <th><?= __('Meals Lunch') ?></th>
                <th><?= __('Meals Dinner') ?></th>
                <th><?= __('Meals Unit Cost') ?></th>
                <th><?= __('Meals Charge') ?></th>
                <th><?= __('Meals Cost') ?></th>
                <th><?= __('Cost Kilometers Vps') ?></th>
                <th><?= __('Cost Kilometers Other') ?></th>
                <th><?= __('Discount Percentage') ?></th>
                <th><?= __('Discount Reason') ?></th>
                <th><?= __('Cost Percentage Adpc') ?></th>
                <th><?= __('Total Cost') ?></th>
                <th><?= __('Date') ?></th>
                <th><?= __('Operation Type Id') ?></th>
                <th><?= __('Latitude') ?></th>
                <th><?= __('Longitude') ?></th>
                <th><?= __('Title') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->operations as $operations): ?>
            <tr>
                <td><?= h($operations->id) ?></td>
                <td><?= h($operations->barrack_id) ?></td>
                <td><?= h($operations->city_id) ?></td>
                <td><?= h($operations->address) ?></td>
                <td><?= h($operations->public_headcount) ?></td>
                <td><?= h($operations->operation_activity_id) ?></td>
                <td><?= h($operations->operation_environment_id) ?></td>
                <td><?= h($operations->operation_delay_id) ?></td>
                <td><?= h($operations->public_ris) ?></td>
                <td><?= h($operations->operation_recommendation_id) ?></td>
                <td><?= h($operations->public_reinforcement) ?></td>
                <td><?= h($operations->public_total) ?></td>
                <td><?= h($operations->organization_id) ?></td>
                <td><?= h($operations->actors_headcount) ?></td>
                <td><?= h($operations->rescuers_total) ?></td>
                <td><?= h($operations->headcount_total) ?></td>
                <td><?= h($operations->actors_organization) ?></td>
                <td><?= h($operations->general_organization) ?></td>
                <td><?= h($operations->transport_organization) ?></td>
                <td><?= h($operations->team_instructions) ?></td>
                <td><?= h($operations->report_assisted) ?></td>
                <td><?= h($operations->report_slight) ?></td>
                <td><?= h($operations->report_medicalized) ?></td>
                <td><?= h($operations->report_reinforcement) ?></td>
                <td><?= h($operations->report_evacuated) ?></td>
                <td><?= h($operations->report_bilan_notes) ?></td>
                <td><?= h($operations->meals_morning) ?></td>
                <td><?= h($operations->meals_lunch) ?></td>
                <td><?= h($operations->meals_dinner) ?></td>
                <td><?= h($operations->meals_unit_cost) ?></td>
                <td><?= h($operations->meals_charge) ?></td>
                <td><?= h($operations->meals_cost) ?></td>
                <td><?= h($operations->cost_kilometers_vps) ?></td>
                <td><?= h($operations->cost_kilometers_other) ?></td>
                <td><?= h($operations->discount_percentage) ?></td>
                <td><?= h($operations->discount_reason) ?></td>
                <td><?= h($operations->cost_percentage_adpc) ?></td>
                <td><?= h($operations->total_cost) ?></td>
                <td><?= h($operations->date) ?></td>
                <td><?= h($operations->operation_type_id) ?></td>
                <td><?= h($operations->latitude) ?></td>
                <td><?= h($operations->longitude) ?></td>
                <td><?= h($operations->title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Operations', 'action' => 'view', $operations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Operations', 'action' => 'edit', $operations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Operations', 'action' => 'delete', $operations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Organizations') ?></h4>
        <?php if (!empty($city->organizations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Address1') ?></th>
                <th><?= __('Address2') ?></th>
                <th><?= __('City Id') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Cellphone') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->organizations as $organizations): ?>
            <tr>
                <td><?= h($organizations->id) ?></td>
                <td><?= h($organizations->title) ?></td>
                <td><?= h($organizations->address1) ?></td>
                <td><?= h($organizations->address2) ?></td>
                <td><?= h($organizations->city_id) ?></td>
                <td><?= h($organizations->email) ?></td>
                <td><?= h($organizations->phone) ?></td>
                <td><?= h($organizations->cellphone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Organizations', 'action' => 'view', $organizations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Organizations', 'action' => 'edit', $organizations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Organizations', 'action' => 'delete', $organizations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organizations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($city->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Firstname') ?></th>
                <th><?= __('Lastname') ?></th>
                <th><?= __('Birthname') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Login') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Cellphone') ?></th>
                <th><?= __('Workphone') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Address Complement') ?></th>
                <th><?= __('Zipcode') ?></th>
                <th><?= __('City Id') ?></th>
                <th><?= __('Birthday') ?></th>
                <th><?= __('Birthplace') ?></th>
                <th><?= __('Skype') ?></th>
                <th><?= __('Is Active') ?></th>
                <th><?= __('External') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Connected') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->firstname) ?></td>
                <td><?= h($users->lastname) ?></td>
                <td><?= h($users->birthname) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->login) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->phone) ?></td>
                <td><?= h($users->cellphone) ?></td>
                <td><?= h($users->workphone) ?></td>
                <td><?= h($users->address) ?></td>
                <td><?= h($users->address_complement) ?></td>
                <td><?= h($users->zipcode) ?></td>
                <td><?= h($users->city_id) ?></td>
                <td><?= h($users->birthday) ?></td>
                <td><?= h($users->birthplace) ?></td>
                <td><?= h($users->skype) ?></td>
                <td><?= h($users->is_active) ?></td>
                <td><?= h($users->external) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td><?= h($users->connected) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
