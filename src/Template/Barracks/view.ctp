<?php $c_mat = count($barrack->materials) ?>
<?php $c_user = count($barrack->users) ?>
<?php $c_veh = count($barrack->vehicles) ?>
<div class="my-modal-base">
    <div class="my-modal-cont"></div>
</div>


<!--_______________________________________________________________________________DETAIL CASERNE-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">A propos</div>
            <div class="panel-body">
                <div class="col-md-6">
                    <div class="panel-heading"><h3>Caserne <?= h($barrack->name) ?> </h3></div>
                    <table class="table">
                        <tr>
                            <td><strong> Ville : </strong></td>
                            <td><?= h($barrack->city->city) ?></td>
                        </tr>
                        <tr>
                            <td><strong> Adresse : </strong></td>
                            <td><?= h($barrack->address) ?><br/>
                                <?= h($barrack->address_complement) ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong> Télephone : </strong></td>
                            <td><?= h($barrack->phone) ?><br>
                            <?= h($barrack->fax) ?></td>
                        </tr>
                        <tr>
                            <td><strong> Email : </strong></td>
                            <td><?= h($barrack->email) ?></td>
                        </tr>
                        <tr>
                            <td><strong> Site web : </strong></td>
                            <td><?= h($barrack->website_url) ?></td>
                        </tr>

                        <!--<br/>-->
                        <!--Ville : <?= h($barrack->city->city) ?> <br/>-->
                        <!--Téléphone : <?= h($barrack->phone) ?> <br/>-->
                        <!--Fax : <?= h($barrack->fax) ?> <br/>-->
                        <!--Email : <?= h($barrack->email) ?> <br/>-->
                        <!--Site web : <?= h($barrack->website_url) ?> <br/>-->
                        <!--Ordre : <?= h($barrack->ordre) ?> <br/>-->
                        <!--R.I.B. : <?= h($barrack->rib) ?>-->
                    </table>
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
    <div class="col-md-6"> <!--colonne gauche-->
        <!--_______________________________________________________________________________DETAIL PERSONNEL-->
        <div class="panel panel-info">
            <div class="panel-heading">Personnel <?= $this->Html->badge($c_user, ['id' => 'bdg-user']) ?>
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-plus"></i>'),['id' => 'bt-user', 'class' =>
                'btn btn-info pull-right btn-add',]) ?>

            </div>
            <div class="panel-body tbl-user" id="tbl-user">

                <table class="table table-hover" width="100%" id="tbl-us">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($barrack->users as $user): ?>
                    <tr id="<?= $user->id ?>">
                        <td><?=  $user->firstname ?><br><?=  $user->lastname ?></td>
                        <td><?= $user->zipcode ?> <?= $user->city->city ?><br><?=  $user->address ?></td>
                        <td><?= $user->phone ?><br><?= $user->cellphone ?><br><?= $user->workphone ?></td>
                        </td>
                        <td>
                            <a href='<?= $this->Url->build(["controller" => "messages","action" => "send" ]); ?>'
                               class="btn btn-default   "><i class="fa fa-envelope" aria-hidden="true"></i> </a>
                            <a href='<?= $this->Url->build(["controller" => "users","action" => "view", $user->id ]); ?>'
                               class="btn btn-default   "><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                    </tr>

                    <?php endforeach;  ?>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer text-center" id="footer-user"><i class="glyphicon glyphicon-chevron-down"></i> TOUT
                VOIR <i class="glyphicon glyphicon-chevron-down"></i></div>
        </div>
    </div> <!--colonne gauche-->


    <div class="col-md-6"> <!--colonne droite-->


        <div class="panel panel-success">
            <div class="panel-heading">Matériel <?= $this->Html->badge($c_mat, ['id' => 'bdg-mat']) ?>

                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-plus"></i>'),['id' => 'bt-del', 'class' =>
                'btn btn-success pull-right btn-add',]) ?>

            </div>
            <div class="panel-body tbl-material" id="tbl-material">
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
            <div class="panel-footer text-center" id="footer-mat"><i class="glyphicon glyphicon-chevron-down"></i> TOUT
                VOIR <i class="glyphicon glyphicon-chevron-down"></i></div>

        </div>
        <!--_______________________________________________________________________________DETAIL MAT EMPRUNT-->
        <div class="panel panel-danger">
            <div class="panel-heading">Matériel emprunté <?= $this->Html->badge($c_user_mat, ['id' => 'bdg-rent']) ?>
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-plus"></i>'),['id' => 'bt-del', 'class' =>
                'btn btn-danger pull-right btn-add marge',]) ?>
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-arrow-down"></i>'),['id' => 'bt-join-mat',
                'class' => 'btn btn-danger pull-right btn-add',]) ?>
            </div>
            <div class="panel-body tbl-usermaterial" id="tbl-usermaterial">
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
                    <?php foreach ($user_mat as $material): ?>
                    <tr>
                        <td><?=$material->material->material_type->name?></td>
                        <td><?=$material->user->firstname.' '.$material->user->lastname?></td>
                        <td><?= ($material->quantity != null) ? $material->quantity : '-/-' ?>
                        <td class="hidden-xs hidden-sm"><?= ($material->from_date != null) ? $material->from_date :
                            'Inconnu' ?>
                        </td>
                        <td class="hidden-xs hidden-sm"><?= ($material->from_to != null) ? $material->from_to :
                            'Inconnu' ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer text-center" id="footer-usmat"><i class="glyphicon glyphicon-chevron-down"></i>
                TOUT VOIR <i class="glyphicon glyphicon-chevron-down"></i></div>

        </div>


    </div><!--colonne droite-->
</div>

<div class="row">
    <div class="col-md-12">
        <!--_______________________________________________________________________________DETAIL VEHICULE-->
        <div class="panel panel-warning">
            <div class="panel-heading">Véhicule <?= $this->Html->badge($c_veh, ['id' => 'bdg-veh']) ?>
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-plus"></i>'),['id' => 'bt-vehi', 'class' =>
                'btn btn-warning pull-right btn-add',]) ?>

            </div>
            <div class="panel-body" id="tbl-vehi">
                <table class="table table-hover tbl-vehicule" width="100%" id="tbl-vehicule">
                    <thead>
                    <tr>
                        <th></th>
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
                        <td class='hidden-sm hidden-xs id=' opt
                        '>
                        <?= ($vehi->snow) ? "<span class='glyphicon glyphicon-asterisk' aria-hidden='true'
                                                   data-toggle='tooltip' title='Véhicule équipé de pneux hiver'></span>"
                        : "" ?>
                        <?= ($vehi->air_conditionner) ? "<span class='glyphicon glyphicon-random' aria-hidden='true'
                                                               data-toggle='tooltip'
                                                               title='Véhicule avec climatisation'></span>" : "" ?>
                        </td>
                        <td class='hidden-sm hidden-xs' id='icon'>
                            <span class='glyphicon glyphicon-remove red pull-right hidecross' aria-hidden='true'></span>
                            <span class='glyphicon glyphicon-edit  pull-right hideedit' aria-hidden='true'></span>
                        </td>
                    </tr>
                    <?php endforeach;  ?>

                    </tbody>
                </table>
            </div>
            <div class="panel-footer text-center" id="footer-vehi"><i class="glyphicon glyphicon-chevron-down"></i> TOUT
                VOIR <i class="glyphicon glyphicon-chevron-down"></i></div>

        </div>

    </div>


    <script>

        // boutons ouvre les formulaires en modal
        var vehicles = '<?= $this->Url->build(["controller" => "Vehicles","action" => "add", $barrack->id ]); ?>';
        modal('#bt-vehi', vehicles);

        // collapse sur les tables
        expand('#footer-user', '#tbl-user', 'tbl-user');
        expand('#footer-mat', '#tbl-material', 'tbl-material');
        expand('#footer-usmat', '#tbl-usermaterial', 'tbl-usermaterial');
        expand('#footer-vehi', '#tbl-vehicule', 'tbl-vehicule');

        function expand(div, footer, classe) {
            $(div).click(function () {
                $(footer).toggleClass(classe);
                if ($(footer).hasClass(classe)) {
                    $(div).html('<i class="glyphicon glyphicon-chevron-down"></i> TOUT VOIR  <i class="glyphicon glyphicon-chevron-down"></i>');
                }
                else {
                    $(div).html('<i class="glyphicon glyphicon-chevron-up"></i> REDUIRE  <i class="glyphicon glyphicon-chevron-up"></i>');
                }
            });
        }
    </script>

    <?= $this->Html->script('jquery-ui.js')?>
    <!--// charge les différentes compteurs-->
    <!--//    var c_rent = '<?= $c_rent ?>';-->
    <!--//    $("#bdg-rent").text(c_rent);-->
    <!--//    var c_mat = '<?= $c_mat ?>';-->
    <!--//    $("#bdg-mat").text(c_mat);-->
    <!--//    var c_user = '<?= $c_user ?>';-->
    <!--//    $("#bdg-user").text(c_user);-->
    <!--//    var c_veh = '<?= $c_veh ?>';-->
    <!--//    $("#bdg-veh").text(c_veh);-->