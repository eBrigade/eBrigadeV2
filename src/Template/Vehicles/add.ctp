<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Ajouter du matériel</h3>
            </div>
            <div class="modal-body">

<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">-->
    <!--<ul class="side-nav">-->
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <!--<li><?= $this->Html->link(__('List Vehicles'), ['action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('List Vehicle Types'), ['controller' => 'VehicleTypes', 'action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('New Vehicle Type'), ['controller' => 'VehicleTypes', 'action' => 'add']) ?></li>-->
        <!--<li><?= $this->Html->link(__('List Vehicle Models'), ['controller' => 'VehicleModels', 'action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('New Vehicle Model'), ['controller' => 'VehicleModels', 'action' => 'add']) ?></li>-->
        <!--<li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>-->
        <!--<li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>-->
        <!--<li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>-->
        <!--<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>-->
    <!--</ul>-->
<!--</nav>-->
<div class="vehicles form large-9 medium-8 columns content">
    <?= $this->Form->create($vehicle) ?>
    <fieldset>

        <?php
            echo $this->Form->input('matriculation');
            echo $this->Form->input('number_kilometer');
            echo $this->Form->input('snow');
            echo $this->Form->input('air_conditionner');
            echo $this->Form->input('vehicle_type_id', ['options' => $vehicleTypes, 'empty' => true]);
            echo $this->Form->input('vehicle_model_id', ['options' => $vehicleModels, 'empty' => true]);
            echo $this->Form->input('bought', ['empty' => true]);
            echo $this->Form->input('end_warranty', ['empty' => true]);
            echo $this->Form->input('next_revision', ['empty' => true]);
            echo $this->Form->input('barracks._ids', ['options' => $barracks]);
            echo $this->Form->input('events._ids', ['options' => $events]);
            echo $this->Form->input('teams._ids', ['options' => $teams]);
            echo $this->Form->input('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>



</div>
<div class="modal-footer">
    <button class="btn" data-dismiss="modal">Annuler</button>
</div>
</div>
</div>
</div>
<script>
    $('#type').on('change',function () {
        $.ajax({
            type: 'POST',
            url: '<?= $this->Url->build(["controller" => "Materials","action" => "addajax"]); ?>',
            data:"cat="+$("#type").val(),
            success:function(data){
                $('#form').html(data)
            }
        });
    })
</script>
