<div class="my-modal-base">
    <div class="my-modal-cont"></div>
</div>

<?= $this->Form->button(__(' Créer du matériel'),['id' => 'bt-del', 'class' => 'btn btn-primary',]) ?> &nbsp;
<?= $this->Form->button(__('Lier du matériel'),['id' => 'bt-join-mat', 'class' => 'btn btn-primary',]) ?>
<br /><br />
<?= $this->Form->button(__(' Créer des utilisateurs'),['id' => 'bt-user', 'class' => 'btn btn-alert',]) ?>&nbsp;
<?= $this->Form->button(__(' Lier des utilisateurs'),['id' => 'bt-join-user', 'class' => 'btn btn-alert',]) ?>
<br /><br />
<?= $this->Form->button(__(' Créer des véhicules'),['id' => 'bt-vehi', 'class' => 'btn btn-success',]) ?>&nbsp;
<?= $this->Form->button(__(' Lier des véhicules'),['id' => 'bt-join-vehi', 'class' => 'btn btn-success',]) ?>


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
                <th><?= __('Email') ?></th>
                <th><?= __('Login') ?></th>
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
                <th><?= __('Connected') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($barrack->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->firstname) ?></td>
                <td><?= h($users->lastname) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->login) ?></td>
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
