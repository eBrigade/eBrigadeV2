<?php
$c_mat = count($barrack->materials)
?>

<div class="my-modal-base">
    <div class="my-modal-cont"></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Caserne <?= h($barrack->name) ?></div>
            <div class="panel-body">
                <div class="col-md-6">
                    <div class="panel-heading">Informations</div>
                    Adresse : <?= h($barrack->address) ?> <br/>
                    Ville : <?= h($barrack->city->city) ?> <br/>
                    Téléphone : <?= h($barrack->phone) ?> <br/>
                    Fax : <?= h($barrack->fax) ?> <br/>
                    Email : <?= h($barrack->email) ?> <br/>
                    Site web : <?= h($barrack->website_url) ?> <br/>
                    Ordre : <?= h($barrack->ordre) ?> <br/>
                    R.I.B. : <?= h($barrack->rib) ?>
                </div>
                <div class="col-md-6">
                    <div class="panel-heading">Statistiques, images ou autres ...a voir!</div>
                    truc : <br/>
                    machin : <br/>
                    chose :
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-5"> <!--colonne gauche-->

        <div class="panel panel-success">
            <div class="panel-heading">Matériels dans la caserne <?= $this->Html->badge($c_mat, ['id' => 'bdg-mat']) ?>

                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-plus"></i>'),['id' => 'bt-del', 'class' =>
                'btn btn-success pull-right btn-add',]) ?>
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-arrow-down"></i>'),['id' => 'bt-join-mat',
                'class' => 'btn btn-success pull-right btn-add',]) ?>
            </div>
            <div class="panel-body">
                <table class="table table-hover" width="100%" id="tbl">
                    <thead>
                    <tr>
                        <th>Qté</th>
                        <th>Désignation</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($barrack->materials as $matos)
                    echo "
                    <tr id=".$matos->id.">
                        <td>".$matos->stock."</td>
                        <td>".$matos->material_type->name."</td>
                        <td><span class='glyphicon glyphicon-remove red pull-right hidecross' aria-hidden='true'></span>
                        </td>
                    </tr>
                    ";
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">Véhicules <?= $this->Html->badge(count($barrack->vehicles)) ?>
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-plus"></i>'),['id' => 'bt-vehi', 'class' =>
                'btn btn-warning pull-right btn-add',]) ?>
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-arrow-down"></i>'),['id' => 'bt-join-vehi',
                'class' => 'btn btn-warning pull-right btn-add',]) ?>
            </div>
            <div class="panel-body">
                <?php foreach ($barrack->vehicles as $veh)
                echo $veh->vehicle_type->name."<br/>";
                ?>
            </div>
        </div>

    </div> <!--colonne gauche-->


    <div class="col-md-7"> <!--colonne droite-->

        <div class="panel panel-danger">
            <div class="panel-heading">Matériels empruntés
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-plus"></i>'),['id' => 'bt-del', 'class' =>
                'btn btn-danger pull-right btn-add',]) ?>
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-arrow-down"></i>'),['id' => 'bt-join-mat',
                'class' => 'btn btn-danger pull-right btn-add',]) ?>
            </div>
            <div class="panel-body">
                <table class="table table-hover" width="100%" id="">
                    <thead>
                    <tr>
                        <th>a voir</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>a voir</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading">Personnels <?= $this->Html->badge(count($barrack->users)) ?>
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-plus"></i>'),['id' => 'bt-user', 'class' =>
                'btn btn-info pull-right btn-add',]) ?>
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-arrow-down"></i>'),['id' => 'bt-join-user',
                'class' => 'btn btn-info pull-right btn-add',]) ?>
            </div>
            <div class="panel-body">
                <?php foreach ($barrack->users as $user)
                echo $user->firstname.' '.$user->lastname."<br/>";
                ?>
            </div>
        </div>
    </div><!--colonne droite-->


</div>  <!--row global-->


<script>
    // boutons ouvre les formulaires en modal
    $('#bt-del').click(function () {
        var url = '<?= $this->Url->build(["controller" => "Materials","action" => "add", $barrack->id ]); ?>';
        $('.my-modal-cont').load(url, function (result) {
            $('#myModal').modal({show: true});
        });
    });

    $('#bt-vehi').click(function () {
        var url = '<?= $this->Url->build(["controller" => "Vehicles","action" => "add", $barrack->id ]); ?>';
        $('.my-modal-cont').load(url, function (result) {
            $('#myModal').modal({show: true});
        });
    });

    $('#bt-user').click(function () {
        var url = '<?= $this->Url->build(["controller" => "Users","action" => "add", $barrack->id ]); ?>';
        $('.my-modal-cont').load(url, function (result) {
            $('#myModal').modal({show: true});
        });
    });

    $('#bt-join-mat').click(function () {
        var url = '<?= $this->Url->build(["controller" => "UserMaterials","action" => "add", $barrack->id ]); ?>';
        $('.my-modal-cont').load(url, function (result) {
            $('#myModal').modal({show: true});
        });
    });

    // boutons pour supprimer des liaisons entre la caserne
    var c_mat = '<?= $c_mat ?>';
    $('.hidecross').click(function () {
        c_mat--;
        $("#bdg-mat").text(c_mat);
        var array = [];
        array.push($(this).closest('tr').attr('id'));
        $(this).parents('tr').first().remove();
        $.ajax({
            type: 'POST',
            url: '<?= $this->Url->build(["controller" => "Materials","action" => "deleteliaison"]); ?>',
            data: {id: array},
        });
//        $( "#tbl" ).prepend( "Ce matériel a bien été supprimé de la caserne" );
    });

</script>

<?= $this->Html->script('jquery-ui.js')?>
