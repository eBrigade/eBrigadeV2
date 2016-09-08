<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Ajouter un utilisateur</h3>
            </div>
            <div class="modal-body">

                <!--<nav class="large-3 medium-4 columns" id="actions-sidebar">-->
    <!--<ul class="side-nav">-->
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <!--<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('List Availabilities'), ['controller' => 'Availabilities', 'action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('New Availability'), ['controller' => 'Availabilities', 'action' => 'add']) ?></li>-->
        <!--<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>-->
        <!--<li><?= $this->Html->link(__('List User Materials'), ['controller' => 'UserMaterials', 'action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('New User Material'), ['controller' => 'UserMaterials', 'action' => 'add']) ?></li>-->
        <!--<li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>-->
        <!--<li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>-->
        <!--<li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>-->
    <!--</ul>-->
<!--</nav>-->
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <?php
            echo $this->Form->input('firstname');
            echo $this->Form->input('lastname');
            echo $this->Form->input('birthname');
            echo $this->Form->input('email');
            echo $this->Form->input('login');
            echo $this->Form->input('password');
            echo $this->Form->input('phone');
            echo $this->Form->input('cellphone');
            echo $this->Form->input('workphone');
            echo $this->Form->input('address');
            echo $this->Form->input('address_complement');
            echo $this->Form->input('zipcode');
            echo $this->Form->input('city');
        echo $this->Form->input('birthday', array(
        'label' => (__('Date of Birth')),
        'type' => 'text',
        'required' => false,
        'class' => 'form-control date'
        ));
            echo $this->Form->input('birthplace');
            echo $this->Form->input('skype');
            echo $this->Form->input('is_active');
            echo $this->Form->input('external');
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


<?= $this->Html->css('themes/pepper-grinder/jquery-ui.css') ?>
<script>

    $(function() {
        $( "#birthday").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            yearRange:"-100:+50"
        });

    });
</script>