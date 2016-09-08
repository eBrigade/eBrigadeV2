<div class="my-modal-base">
    <div class="my-modal-cont"></div>
</div>

<?= $this->Form->button(__(' Ajouter du matériel à cette caserne'),['id' => 'bt-del', 'class' => 'btn btn-primary',]) ?>
<br /><br />
<?= $this->Form->button(__(' Ajouter des utilisateurs à cette caserne'),['id' => 'bt-user', 'class' => 'btn btn-alert',]) ?>
<br /><br />
<?= $this->Form->button(__(' Ajouter des véhicules à cette caserne'),['id' => 'bt-vehi', 'class' => 'btn btn-success',]) ?>



<div class="barracks view large-9 medium-8 columns content">
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
            <td><?= $barrack->has('city') ? $this->Html->link($barrack->city->id, ['controller' => 'Cities', 'action' => 'view', $barrack->city->id]) : '' ?></td>
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
            <th><?= __('Ordre') ?></th>
            <td><?= h($barrack->ordre) ?></td>
        </tr>
        <tr>
            <th><?= __('Rib') ?></th>
            <td><?= h($barrack->rib) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($barrack->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Events') ?></h4>
        <?php if (!empty($barrack->events)): ?>
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
                <th><?= __('Event Type Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($barrack->events as $events): ?>
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
                <td><?= h($events->event_type_id) ?></td>
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
        <h4><?= __('Related Rescue Plans') ?></h4>
        <?php if (!empty($barrack->rescue_plans)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Barrack Id') ?></th>
                <th><?= __('Public Headcount') ?></th>
                <th><?= __('Rescue Plan Activity Id') ?></th>
                <th><?= __('Rescue Plan Environment Id') ?></th>
                <th><?= __('Rescue Plan Delay Id') ?></th>
                <th><?= __('Public Ris') ?></th>
                <th><?= __('Rescue Plan Type Id') ?></th>
                <th><?= __('Rescue Plan Recommendation Id') ?></th>
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
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($barrack->rescue_plans as $rescuePlans): ?>
            <tr>
                <td><?= h($rescuePlans->id) ?></td>
                <td><?= h($rescuePlans->event_id) ?></td>
                <td><?= h($rescuePlans->barrack_id) ?></td>
                <td><?= h($rescuePlans->public_headcount) ?></td>
                <td><?= h($rescuePlans->rescue_plan_activity_id) ?></td>
                <td><?= h($rescuePlans->rescue_plan_environment_id) ?></td>
                <td><?= h($rescuePlans->rescue_plan_delay_id) ?></td>
                <td><?= h($rescuePlans->public_ris) ?></td>
                <td><?= h($rescuePlans->rescue_plan_type_id) ?></td>
                <td><?= h($rescuePlans->rescue_plan_recommendation_id) ?></td>
                <td><?= h($rescuePlans->public_reinforcement) ?></td>
                <td><?= h($rescuePlans->public_total) ?></td>
                <td><?= h($rescuePlans->organization_id) ?></td>
                <td><?= h($rescuePlans->actors_headcount) ?></td>
                <td><?= h($rescuePlans->rescuers_total) ?></td>
                <td><?= h($rescuePlans->headcount_total) ?></td>
                <td><?= h($rescuePlans->actors_organization) ?></td>
                <td><?= h($rescuePlans->general_organization) ?></td>
                <td><?= h($rescuePlans->transport_organization) ?></td>
                <td><?= h($rescuePlans->team_instructions) ?></td>
                <td><?= h($rescuePlans->report_assisted) ?></td>
                <td><?= h($rescuePlans->report_slight) ?></td>
                <td><?= h($rescuePlans->report_medicalized) ?></td>
                <td><?= h($rescuePlans->report_reinforcement) ?></td>
                <td><?= h($rescuePlans->report_evacuated) ?></td>
                <td><?= h($rescuePlans->report_bilan_notes) ?></td>
                <td><?= h($rescuePlans->meals_morning) ?></td>
                <td><?= h($rescuePlans->meals_lunch) ?></td>
                <td><?= h($rescuePlans->meals_dinner) ?></td>
                <td><?= h($rescuePlans->meals_unit_cost) ?></td>
                <td><?= h($rescuePlans->meals_charge) ?></td>
                <td><?= h($rescuePlans->meals_cost) ?></td>
                <td><?= h($rescuePlans->cost_kilometers_vps) ?></td>
                <td><?= h($rescuePlans->cost_kilometers_other) ?></td>
                <td><?= h($rescuePlans->discount_percentage) ?></td>
                <td><?= h($rescuePlans->discount_reason) ?></td>
                <td><?= h($rescuePlans->cost_percentage_adpc) ?></td>
                <td><?= h($rescuePlans->total_cost) ?></td>
                <td><?= h($rescuePlans->date) ?></td>
                <td><?= h($rescuePlans->operation_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RescuePlans', 'action' => 'view', $rescuePlans->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RescuePlans', 'action' => 'edit', $rescuePlans->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RescuePlans', 'action' => 'delete', $rescuePlans->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rescuePlans->id)]) ?>
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
                <th><?= __('Material Type Id') ?></th>
                <th><?= __('Barrack Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($barrack->materials as $materials): ?>
            <tr>
                <td><?= h($materials->id) ?></td>
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
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($barrack->users)): ?>
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
                <th><?= __('City') ?></th>
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
            <?php foreach ($barrack->users as $users): ?>
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
                <td><?= h($users->city) ?></td>
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
    <div class="related">
        <h4><?= __('Related Vehicles') ?></h4>
        <?php if (!empty($barrack->vehicles)): ?>
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
            <?php foreach ($barrack->vehicles as $vehicles): ?>
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





<script>





$('#bt-del').click(function() {

//    $.ajax({
//        type: 'POST',
//        url: '<?= $this->Url->build(["controller" => "Messages","action" => "deleteAll"]); ?>',
//        data: {id: array},
//                success : function(data) {
//                    alert(data);
//                }
//    });

    var url = '<?= $this->Url->build(["controller" => "Materials","action" => "add", $barrack->id ]); ?>';
    $('.my-modal-cont').load(url,function(result){
        $('#myModal').modal({show:true});
    });
});

$('#bt-vehi').click(function() {
var url = '<?= $this->Url->build(["controller" => "Vehicles","action" => "add", $barrack->id ]); ?>';
$('.my-modal-cont').load(url,function(result){
    $('#myModal').modal({show:true});
});
});

$('#bt-user').click(function() {
    var url = '<?= $this->Url->build(["controller" => "Users","action" => "add", $barrack->id ]); ?>';
    $('.my-modal-cont').load(url,function(result){
        $('#myModal').modal({show:true});
    });
});
</script>

<?= $this->Html->script('jquery-ui.js')?>
