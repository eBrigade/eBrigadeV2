<?php $c_mat = count($barrack->materials) ?>
<?php $c_user = count($barrack->users) ?>
<?php $c_veh = count($barrack->vehicles) ?>
<?php $c_eve = count($barrack->events) ?>

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
                    <div class="panel-heading">

                        <div class="col-md-3 col-lg-3 " align="center">
                            <img src="<?= $this->Url->image('pro-civ.png') ?>" class="img-circle img-responsive"> </div>
                        <h3>Caserne <?= h($barrack->name) ?> </h3>
                    </div>

<div id="barrack-map">
                    <?= $this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyD5JoDyuQnaIzvNOAJJQAmAz2IZBedpxzg&sensor=true'); ?>

                    <?php
                            $map_options = array(
                                'id' => 'gmap',
                    'width' => '400px',
                    'height' => '200px',
                    'style' => '',
                    'zoom' => 10,
                    'type' => 'ROADMAP',
                    'custom' => null,
                    'localize' => false,
                    'address' => $barrack->city->city ,
                    'marker' => true,
                    'markerTitle' => $barrack->city->city,
                    'markerIcon' => 'http://google-maps-icons.googlecode.com/files/home.png',
                    'markerShadow' => 'http://google-maps-icons.googlecode.com/files/shadow.png',
                    'infoWindow' => false,
                    'windowText' => 'My Position',
                    'draggableMarker' => false
                    );

                    echo $this->GoogleMap->map($map_options);
                    $marker_options = array(
                    'showWindow' => true,
                    'windowText' => $barrack->name,
                    'markerTitle' => $barrack->city->city,
                    'draggableMarker' => false
                    );

                    ?>

    <?= $this->GoogleMap->addMarker("gmap", 1, $barrack->city->city.", France", $marker_options); ?>
</div>








                </div>
                <div class="col-md-6">
                    <div class="panel-heading">

                        <table class="table tablebarrack">
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
                            <tr>
                                <td><strong> Ordre : </strong></td>
                                <td><?= h($barrack->ordre) ?></td>
                            </tr>
                            <tr>
                                <td><strong> R.I.B. : </strong></td>
                                <td><?= h($barrack->rib) ?></td>
                            </tr>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <!--_______________________________________________________________________________DETAIL EVENEMENTS-->
        <div class="panel panel-warning">
            <div class="panel-heading">Derniers événements
                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-plus"></i>'),['id' => 'bt-ev', 'class' =>
                'btn btn-warning pull-right btn-add',]) ?>
    </div>
            <div class="panel-body" id="tbl-event">
                <table class="table table-hover tbl-vehicule" width="100%" id="tbl-ev">
                    <thead>
                    <tr>
                        <th>Type</th>
                        <th>Intitulé</th>
                        <th>Lieu</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($barrack->operations as $event): ?>
                    <tr>
                        <td>Opération</td>
                        <td><?= $event->title ?></td>
                        <td><?= $event->city->city ?></td>
                        <td>le <?= $event->date ?></td>
                        <td>
                            <a href='<?= $this->Url->build(["controller" => "operations","action" => "view", $event->id ]); ?>'
                               class="btn btn-default   btn-sm "><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    <?php foreach ($barrack->formations as $formation): ?>
                    <?php if (!empty($formation)): ?>
                    <tr>
                        <td>Formation</td>
                        <td><?= $formation->title ?></td>
                        <td><?= $formation->city->city ?></td>
                        <td>du <?= $formation->formation_start->i18nFormat('dd/MM/yyyy') ?> au <?= $formation->formation_end->i18nFormat('dd/MM/yyyy') ?></td>
                        <td>
                            <a href='<?= $this->Url->build(["controller" => "formations","action" => "view", $formation->id ]); ?>'
                               class="btn btn-default btn-sm "><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            <div class="panel-footer text-center" id="footer-event"><i class="glyphicon glyphicon-chevron-down"></i> TOUT
                VOIR <i class="glyphicon glyphicon-chevron-down"></i></div>

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
                        <th></th>
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
                            <a href='<?= $this->Url->build(["controller" => "messages","action" => "send", 'membre', $user->id , 'prefix' => 'messagerie' ]); ?>'
                               class="btn btn-primary btn-sm   "><i class="fa fa-envelope" aria-hidden="true"></i> </a>
                            <a href='<?= $this->Url->build(["controller" => "users","action" => "view", $user->id ]); ?>'
                               class="btn btn-success btn-sm   "><i class="fa fa-user" aria-hidden="true"></i></a>
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
            <div class="panel-heading">Matériel <?= $this->Html->badge($c_barrack_mat, ['id' => 'bdg-mat']) ?>

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
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($barrack_mat as $matos)
                    echo "
                    <tr id=".$matos->material->id.">
                        <td id='stock'>".$matos->stock."</td>
                        <td>".$matos->material->material_type->name."</td>
                        <td>".$matos->material->name."</td>
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
<!--                <?= $this->Form->button(__(' <i class="glyphicon glyphicon-arrow-down"></i>'),['id' => 'bt-join-mat',
                'class' => 'btn btn-danger pull-right btn-add',]) ?>-->
            </div>
            <div class="panel-body tbl-usermaterial" id="tbl-usermaterial">
                <table cellpadding="0" cellspacing="0" class="table table-hover">
                    <thead>
                    <tr>
                        <th>Type</th>
                        <th>Intitulé</th>
                        <th>Emprunté par</th>
                        <th>Quantité</th>
         <!--               <th class="hidden-xs hidden-sm">Depuis le</th>
                        <th class="hidden-xs hidden-sm">Jusqu'au</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($user_mat as $material): ?>
                    <tr>
                        <td><?=$material->material->material_type->name?></td>
                        <td><?=$material->material->name?></td>
                        <td><?=$material->user->firstname.' '.$material->user->lastname ?></td>
                        <td><?=$material->stock ?></td>
                      <!--  <td class="hidden-xs hidden-sm">*
                        </td>
                        <td class="hidden-xs hidden-sm">*
                        </td>-->
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
                        <th class="hidden-sm hidden-xs">Eqp</th>
                        <th class="hidden-sm hidden-xs">Matricule</th>
                        <th class="hidden-sm hidden-xs">Km</th>
                        <th class="hidden-sm hidden-xs">Acquis le</th>
                        <th class="hidden-sm hidden-xs">Garantie</th>
                        <th class="hidden-sm hidden-xs">Revision</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($barrack->vehicles as $vehi): ?>
                    <tr id='<?= $vehi->id ?>'>
                        <td><img id='img-veh' src='<?= $this->Url->image($vehi->vehicle_type->picture) ?>'></td>
                        <td><?= $vehi->vehicle_type->type ?></td>
                        <td><?= $vehi->vehicle_type->name ?></td>
                        <td class='hidden-sm hidden-xs id=' opt
                        '>
                        <?= ($vehi->snow) ? "<span class='glyphicon glyphicon-asterisk' aria-hidden='true'
                                                   data-toggle='tooltip' title='Véhicule équipé de pneux hiver'></span>"
                        : "" ?>
                        <?= ($vehi->air_conditionner) ? "<span class='glyphicon glyphicon-random' aria-hidden='true'
                                                               data-toggle='tooltip'
                                                               title='Véhicule avec climatisation'></span>" : "" ?>
                        </td>
                        <td class='hidden-sm hidden-xs' id='mat'><?= $vehi->matriculation ?></td>
                        <td class='hidden-sm hidden-xs' id='klm'><?= $vehi->number_kilometer ?></td>
                        <td class='hidden-sm hidden-xs' id='buy'><?= $vehi->bought ?></td>
                        <td class='hidden-sm hidden-xs' id='end'><?= $vehi->end_warranty ?></td>
                        <td class='hidden-sm hidden-xs' id='rev'><?= $vehi->next_revision ?></td>
                    </tr>
                    <?php endforeach;  ?>

                    </tbody>
                </table>
            </div>
            <div class="panel-footer text-center" id="footer-vehi"><i class="glyphicon glyphicon-chevron-down"></i> TOUT
                VOIR <i class="glyphicon glyphicon-chevron-down"></i></div>

        </div>

    </div>
</div>

    <script>
        // collapse sur les tables
        expand('#footer-event', '#tbl-event', 'tbl-event');
        expand('#footer-user', '#tbl-user', 'tbl-user');
        expand('#footer-mat', '#tbl-material', 'tbl-material');
        expand('#footer-usmat', '#tbl-usermaterial', 'tbl-usermaterial');
        expand('#footer-vehi', '#tbl-vehicule', 'tbl-vehicule');


        $('[data-toggle="tooltip"]').tooltip();

        function initMap() {
            var myLatLng = {lat: -25.363, lng: 131.044};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: myLatLng
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!'
            });
        }
    </script>
