<?php $c_rent = count($materials) ?>
<?php $c_mat = count($barrack->materials) ?>
<?php $c_user = count($barrack->users) ?>
<?php $c_veh = count($barrack->vehicles) ?>
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

        <div class="panel panel-warning">
            <div class="panel-heading">Véhicules <?= $this->Html->badge('', ['id' => 'bdg-veh']) ?>
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-plus"></i>'),['id' => 'bt-vehi', 'class' =>
                'btn btn-warning pull-right btn-add',]) ?>
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-arrow-down"></i>'),['id' => 'bt-join-vehi',
                'class' => 'btn btn-warning pull-right btn-add',]) ?>
            </div>
            <div class="panel-body" id="tbl-vehi">
                <table class="table table-hover" width="100%" id="tbl-vehicule">
                    <thead>
                    <tr>
                        <th> </th>
                        <th>Type</th>
                        <th>Désignation</th>
                        <th class="hidden-sm hidden-xs">Matricule</th>
                        <th class="hidden-sm hidden-xs">Km</th>
                        <th class="hidden-sm hidden-xs">Acquis le</th>
                        <th class="hidden-sm hidden-xs">Garantie</th>
                        <th class="hidden-sm hidden-xs">Revision</th>
                        <th class="hidden-sm hidden-xs">Eqp</th>
                        <th class="hidden-sm hidden-xs"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($barrack->vehicles as $vehi): ?>
                    <tr id='<?= $vehi->id ?>'>
                        <td><img id='img-veh' src='<?= $this->Url->image($vehi->vehicle_type->picture) ?>'></td>
                        <td><?= $vehi->vehicle_type->type ?></td>
                        <td><?= $vehi->vehicle_type->name ?></td>
                        <td class='hidden-sm hidden-xs' id='mat'><?= $vehi->matriculation ?></td>
                        <td class='hidden-sm hidden-xs' id='klm'><?= $vehi->number_kilometer ?></td>
                        <td class='hidden-sm hidden-xs' id='buy'><?= $vehi->bought ?></td>
                        <td class='hidden-sm hidden-xs' id='end'><?= $vehi->end_warranty ?></td>
                        <td class='hidden-sm hidden-xs' id='rev'><?= $vehi->next_revision ?></td>
                        <td class='hidden-sm hidden-xs id='opt'>
                        <?= ($vehi->snow) ? "<span class='glyphicon glyphicon-asterisk' aria-hidden='true' data-toggle='tooltip' title='Véhicule équipé de pneux hiver'></span>" : "" ?>
                        <?= ($vehi->air_conditionner) ? "<span class='glyphicon glyphicon-random' aria-hidden='true' data-toggle='tooltip' title='Véhicule avec climatisation'></span>" : "" ?>
                        </td>
                        <td class='hidden-sm hidden-xs' id= 'icon'>
                            <span class='glyphicon glyphicon-remove red pull-right hidecross' aria-hidden='true'></span>
                            <span class='glyphicon glyphicon-edit  pull-right hideedit' aria-hidden='true'></span>
                        </td>
                    </tr>
                    <?php endforeach;  ?>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading">Personnels <?= $this->Html->badge('', ['id' => 'bdg-user']) ?>
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-plus"></i>'),['id' => 'bt-user', 'class' =>
                'btn btn-info pull-right btn-add',]) ?>
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-arrow-down"></i>'),['id' => 'bt-join-user',
                'class' => 'btn btn-info pull-right btn-add',]) ?>
            </div>
            <div class="panel-body" id="tbl-user">
                <table class="table table-hover" width="100%" id="tbl-vehicule">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Cp</th>
                        <th>Ville</th>
                        <th>Téléphone</th>
                        <th>Actif</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($barrack->users as $user): ?>
                    <tr id="<?= $user->id ?>">
                        <td><?=  $user->firstname ?></td>
                        <td><?= $user->lastname ?></td>
                        <td><?= $user->zipcode ?></td>
                        <td><?= $user->city->city ?></td>
                        <td><?= $user->workphone ?></td>
                        <td><?= ($user->is_active) ? 'Oui' : 'Non' ?>
                        </td>
                        <td class='hidden-sm hidden-xs' id= 'icon'>
                            <span class='glyphicon glyphicon-remove red pull-right hidecross' aria-hidden='true'></span>
                        </td>
                    </tr>

                    <?php endforeach;  ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


<div class="row">
    <div class="col-md-5"> <!--colonne gauche-->

        <div class="panel panel-success">
            <div class="panel-heading">Matériels dans la caserne <?= $this->Html->badge('', ['id' => 'bdg-mat']) ?>

                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-plus"></i>'),['id' => 'bt-del', 'class' =>
                'btn btn-success pull-right btn-add',]) ?>
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-arrow-down"></i>'),['id' => 'bt-join-mat',
                'class' => 'btn btn-success pull-right btn-add',]) ?>
            </div>
            <div class="panel-body"  id="tbl-material">
                <table class="table table-hover" width="100%" id="tbl-mat">
                    <thead>
                    <tr>
                        <th>Stock</th>
                        <th>Type</th>
                        <th>Désignation</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($barrack->materials as $matos)
                    echo "
                    <tr id=".$matos->id.">
                        <td class='stock'>".$matos->stock."</td>
                        <td>".$matos->material_type->type."</td>
                        <td>".$matos->material_type->name."</td>
                        <td>
                            <span class='glyphicon glyphicon-remove red pull-right hidecross' aria-hidden='true'></span>
                            <span class='glyphicon glyphicon-edit  pull-right hideedit' aria-hidden='true'></span>
                        </td>
                    </tr>
                    ";
                    ?>
                    </tbody>
                </table>

            </div>
        </div>


    </div> <!--colonne gauche-->


    <div class="col-md-7"> <!--colonne droite-->

        <div class="panel panel-danger">
            <div class="panel-heading">Matériels empruntés <?= $this->Html->badge('', ['id' => 'bdg-rent']) ?>
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-plus"></i>'),['id' => 'bt-del', 'class' =>
                'btn btn-danger pull-right btn-add',]) ?>
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-arrow-down"></i>'),['id' => 'bt-join-mat',
                'class' => 'btn btn-danger pull-right btn-add',]) ?>
            </div>
            <div class="panel-body" id="tbl-user-material">
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Matériel</th>
                        <th>Emprunté par</th>
                        <th>Quantité</th>
                        <th class="hidden-xs hidden-sm">Depuis le</th>
                        <th class="hidden-xs hidden-sm">Jusqu'au</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($materials as $material): ?>

                    <?php foreach($material->user_materials as $user_material)
                    {
                    ?>
                    <tr>
                        <td><?= $material->material_type->name ?></td>
                        <td><?= ($user_material->user->firstname != null && $user_material->user->lastname != null) ? $user_material->user->firstname . ' ' . $user_material->user->lastname : 'Nope' ?></td>
                        <td><?= ($user_material->quantity != null) ? $user_material->quantity : '-/-' ?></td>
                        <td class="hidden-xs hidden-sm"><?= ($user_material->from_date != null) ? $user_material->from_date : 'Inconnu' ?></td>
                        <td class="hidden-xs hidden-sm"><?= ($user_material->from_to != null) ? $user_material->from_to : 'Inconnu' ?></td>
                    </tr>
                    <?php
                    }
                ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="paginator text-center">
                    <ul class="pagination">
                        <?= $this->Paginator->prev($this->Html->icon('chevron-left'),['escape' => false]) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next($this->Html->icon('chevron-right'),['escape' => false]) ?>
                    </ul>
                </div>
            </div>
        </div>


    </div><!--colonne droite-->

</div>  <!--row global-->


<script>
    // charge les différentes compteurs
    var c_rent = '<?= $c_rent ?>';
    $("#bdg-rent").text(c_rent);
    var c_mat = '<?= $c_mat ?>';
    $("#bdg-mat").text(c_mat);
    var c_user = '<?= $c_user ?>';
    $("#bdg-user").text(c_user);
    var c_veh = '<?= $c_veh ?>';
    $("#bdg-veh").text(c_veh);

    // boutons ouvre les formulaires en modal
    var Materials = '<?= $this->Url->build(["controller" => "Materials","action" => "add", $barrack->id ]); ?>';
    var Users = '<?= $this->Url->build(["controller" => "Users","action" => "add", $barrack->id ]); ?>';
    var UserMaterials = '<?= $this->Url->build(["controller" => "UserMaterials","action" => "add", $barrack->id ]); ?>';
    var vehicles = '<?= $this->Url->build(["controller" => "Vehicles","action" => "add", $barrack->id ]); ?>';

    modal('#bt-del',Materials);
    modal('#bt-user',Users);
    modal('#bt-join-mat',UserMaterials);
    modal('#bt-vehi',vehicles);
</script>

<?= $this->Html->script('jquery-ui.js')?>
