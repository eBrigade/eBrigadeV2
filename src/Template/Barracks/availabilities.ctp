<?php
    $available_users = [];
?>
<?php foreach ($barrack->users as $user): ?>
    <?php foreach($user->teams as $team)
    {
        foreach ($team->events as $event)
        {

        }
    }
    ?>
<?php endforeach;?>

<div class="row">
    <div class="col-sm-12 col-md-6 col-md-offset-3">
        <div class="text-center h1 ui-corner-all bg-primary">Caserne <?= $barrack->name ?></div>
        <?= $this->Form->create() ?>
        <?= $this->Form->input('date',[
            'type' => 'text',
            'id' => 'date',
            'value' => $date,
            'required' => false])
        ?>
        <?= $this->Form->end() ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                Disponibles
            </div>
            <div class="panel-body">
                <h4>Utilisateurs <span class="badge" id="badge-avail-users"></span></h4>
                <p id="available-users">

                </p>
                <hr>
                <h4>Matériel <span class="badge" id="badge-avail-materials"></span></h4>
                <p id="available-materials">

                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                Indisponibles
            </div>
            <div class="panel-body">
                <h4>Utilisateurs <span class="badge" id="badge-avail-users"></span></h4>
                <p id="available-users">

                </p>
                <hr>
                <h4>Matériel <span class="badge" id="badge-avail-materials"></span></h4>
                <p id="available-materials">

                </p>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('jquery-ui.js') ?>
<script>
    $(document).ready(function(){
        // au chargement
    });
    date('#date', '-0:+2', '+5');
    $('#date').on('change',function(){
        var date = $('#date').val();
        window.location = '/barracks/availabilities/<?= $id ?>/'+date;
    });
</script>