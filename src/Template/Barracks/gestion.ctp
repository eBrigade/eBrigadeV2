<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Gestion de la caserne <?=  $barrack->name ?></div>
        </div>
    </div>
</div>


<!--_____________________________________________________________________________________MENU-->

<div class="row">
    <div class="col-lg-3 col-md-6" id="bt_user">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><span class="compteur"><?= count($barrack->users) ?></span><br>
                            <span class="sscompteur">Personnes</span></div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Voir en Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6" id="bt_event">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-calendar fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php $for = count($barrack->formations); $ope = count($barrack->operations) ?>
                        <div class="huge"><span class="compteur"><?= $for+$ope?></span><br>
                            <span class="sscompteur">Evénements</span></div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Voir en Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6" id="bt_vehi">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-car fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><span class="compteur"><?= count($barrack->vehicules) ?></span><br>
                            <span class="sscompteur">Véhicules</span></div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Voir en Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6" id="bt_mat">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-wrench fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><span class="compteur"><?= count($barrack->materials) ?></span><br>
                            <span class="sscompteur">Matériels</span></div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Voir en Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">


        <!--_____________________________________________________________________________________PERSONNEL-->


        <div class="panel panel-info " id="user">
            <div class="panel-heading">Personnel

                <a href='<?= $this->Url->build(["controller" => "users","action" => "view" ]); ?>'
                   class="btn btn-success pull-right btn-add marge"><i class="glyphicon glyphicon-plus"></i> Créer</a>
                <a href='<?= $this->Url->build(["controller" => "users","action" => "view"]); ?>'
                   class="btn btn-warning pull-right btn-add marge"><i class="glyphicon glyphicon-arrow-down"></i> Ajouter</a>
            </div>
                        <table class="table table-bordered table-hover" width="100%" id="tbl">
                            <thead>
                            <tr>
                                <!--<th></th>-->
                                 <th><?= $this->Paginator->sort('Users.firstname', ['label' => 'Nom']) ?></th>
                                <th>Prénom</th>
                                <th>Né le</th>
                                <th>Code postal</th>
                                <th>Ville</th>
                                <th>Adresse</th>
                                <th>Téléphone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user): ?>
                            <tr id="<?= $user->id ?>">
                                <!--<td style="text-align:center;"><?= $this->Form->checkbox('erase', ['value' => $user->id , 'id' => 'a_chkDelete','class' => 'text-centered']); ?></td>-->
                                <td><?=  $user->firstname ?></td>
                                <td><?=  $user->lastname ?></td>
                                <td><?= $user->birthday ?></td>
                                <td><?= $user->zipcode ?></td>
                                <td><?= $user->city->city ?></td>
                                <td><?=  $user->address ?></td>
                                <td><?= $user->phone ?></td>
                                    <!--<a href='<?= $this->Url->build(["controller" => "messages","action" => "send" ]); ?>'-->
                                       <!--class="btn btn-default btn-sm   "><i class="fa fa-envelope" aria-hidden="true"></i> </a>-->
                                    <!--<a href='<?= $this->Url->build(["controller" => "users","action" => "view", $user->id ]); ?>'-->
                                       <!--class="btn btn-default btn-sm   "><i class="fa fa-user" aria-hidden="true"></i></a>-->
                                <td style="text-align:center;">   <?= $this->Form->postLink(__('<i class="fa fa-times" aria-hidden="true"></i>'),
                                    ['controller' => 'users', 'action' => 'delete', $user->id],
                                    [
                                    'class' => 'btn btn-xs btn-danger ',
                                    'escape' => false,
                                    'data-original-title' => 'Supprimer cette caserne',
                                    'data-toggle' => 'tooltip',
                                    'confirm' => __('Etes-vous sûr de vouloir supprimer cet utilisateur ?')
                                    ]
                                    ) ?> </td>
                            </tr>
                            <?php endforeach;  ?>
                            </tbody>
                        </table>
            <ul class="pagination pagination-large pull-right">
                <?php
            echo $this->Paginator->prev(__('Prec'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('Suiv'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                ?>
            </ul>
        </div>

        <!--_____________________________________________________________________________________EVENEMENTS-->


        <div class="panel panel-warning hidden" id="event">
            <div class="panel-heading">Evenements
                <a href='<?= $this->Url->build(["controller" => "users","action" => "view" ]); ?>'
                   class="btn btn-danger pull-right btn-add marge"><i class="glyphicon glyphicon-remove"></i> </a>
                <a href='<?= $this->Url->build(["controller" => "users","action" => "view" ]); ?>'
                   class="btn btn-success pull-right btn-add marge"><i class="glyphicon glyphicon-plus"></i> Créer</a>

            </div>
            <table class="table table-bordered table-hover" width="100%" id="tbl">
                <thead>
                <tr>
                    <th>Type</th>
                    <th>Intitulé</th>
                    <th>Ville</th>
                    <th>Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($barrack->operations as $event): ?>
                <tr>
                    <td>Opération</td>
                    <td><?= $event->title ?></td>
                    <td> <?= $event->city->city ?> (<?= $event->city->zipcode ?>)</td>
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
                    <td><?= $formation->city->city ?> (<?= $event->city->zipcode ?>)</td>
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
            <ul class="pagination pagination-large pull-right">
                <?php
            echo $this->Paginator->prev(__('Prec'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('Suiv'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                ?>
            </ul>
        </div>

        <!--_____________________________________________________________________________________VEHICULES-->

        <div class="panel panel-danger hidden" id="vehi">
            <div class="panel-heading">Véhicules
                <a href='<?= $this->Url->build(["controller" => "users","action" => "view" ]); ?>'
                   class="btn btn-danger pull-right btn-add marge"><i class="glyphicon glyphicon-remove"></i> </a>
                <a href='<?= $this->Url->build(["controller" => "users","action" => "view" ]); ?>'
                   class="btn btn-success pull-right btn-add marge"><i class="glyphicon glyphicon-plus"></i> Créer</a>

            </div>
            <table class="table table-bordered table-hover" width="100%" id="tbl">
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
                    <th class="hidden-sm hidden-xs"></th>
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

                    <td class='hidden-sm hidden-xs' id='icon'>
                        <button id="btdel" class='glyphicon glyphicon-remove pull-right hidecross btn btn-danger btn-sm' aria-hidden='true'></button>
                        <button  id="btedit" class='glyphicon glyphicon-edit pull-right hideedit btn btn-warning btn-sm' aria-hidden='true'></button>
                    </td>
                </tr>
                <?php endforeach;  ?>

                </tbody>
            </table>
            <ul class="pagination pagination-large pull-right">
                <?php
            echo $this->Paginator->prev(__('Prec'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('Suiv'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                ?>
            </ul>
        </div>

        <!--_____________________________________________________________________________________MATERIEL-->
        <div class="row hidden"  id="mat">
        <div class="col-md-6">
        <div class="panel panel-success  ">
            <div class="panel-heading">Materiels
                <a href='<?= $this->Url->build(["controller" => "users","action" => "view" ]); ?>'
                   class="btn btn-danger pull-right btn-add marge"><i class="glyphicon glyphicon-remove"></i> </a>
                <a href='<?= $this->Url->build(["controller" => "users","action" => "view" ]); ?>'
                   class="btn btn-success pull-right btn-add marge"><i class="glyphicon glyphicon-plus"></i> Créer</a>
            </div>


            <table class="table table-bordered table-hover" width="100%" id="tbl">
                <thead>
                <tr>
                    <th>Type</th>
                    <th>Stock</th>
                    <th>Désignation</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($barrack_mat as $matos)
                    echo "
                    <tr id=".$matos->material->id.">
                <td>".$matos->material->material_type->name."</td>
                <td id='stock'>".$matos->stock."</td>
                <td>".$matos->material->name."</td>
                <td id='actionm'>
                    <button id='btdelm' class='glyphicon glyphicon-remove pull-right hidecrossm btn btn-danger btn-sm' aria-hidden='true'></button>
                    <button  id='bteditm' class='glyphicon glyphicon-edit pull-right hideeditm btn btn-warning btn-sm' aria-hidden='true'></button>

                </td>
                </tr>
                ";
                ?>
                </tbody>
            </table>
            <ul class="pagination pagination-large pull-right">
                <?php
            echo $this->Paginator->prev(__('Prec'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('Suiv'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                ?>
            </ul>
        </div>
    </div>



            <div class="col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">Materiels empruntés
                        <a href='<?= $this->Url->build(["controller" => "users","action" => "view" ]); ?>'
                           class="btn btn-danger pull-right btn-add marge"><i class="glyphicon glyphicon-remove"></i> </a>
                        <a href='<?= $this->Url->build(["controller" => "users","action" => "view" ]); ?>'
                           class="btn btn-success pull-right btn-add marge"><i class="glyphicon glyphicon-plus"></i> Créer</a>
                    </div>


                    <table class="table table-bordered table-hover" width="100%" id="tbl">
                        <thead>
                        <tr>
                            <th>Type</th>
                            <th>Qté</th>
                            <th>	Désignation</th>
                            <th>Emprunté par</th>
                            <!--               <th class="hidden-xs hidden-sm">Depuis le</th>
                                           <th class="hidden-xs hidden-sm">Jusqu'au</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($user_mat as $material): ?>
                        <tr>
                            <td><?=$material->material->material_type->name?></td>
                            <td><?=$material->stock ?></td>
                            <td><?=$material->material->name?></td>
                            <td><?=$material->user->firstname.' '.$material->user->lastname ?></td>

                            <!--  <td class="hidden-xs hidden-sm">*
                              </td>
                              <td class="hidden-xs hidden-sm">*
                              </td>-->
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <ul class="pagination pagination-large pull-right">
                        <?php
            echo $this->Paginator->prev(__('Prec'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                        echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                        echo $this->Paginator->next(__('Suiv'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                        ?>
                    </ul>
                </div>
            </div>


    </div>
    </div>
</div>

<script>
//    $('#tbl').find('input:checkbox[id$="a_chkDelete"]').click(function() {
//        var isChecked = $(this).prop("checked");
//        var $selectedRow = $(this).parent("td").parent("tr");
//
//        if (isChecked) $selectedRow.css({
//            "background-color": "#D4FFAA"
//        });
//        else $selectedRow.css({
//            "background-color": ''
//        });
//    });


    $( "#bt_user" ).click(function() {
        $('#user').removeClass('hidden');
        $('#event').addClass('hidden');
        $('#vehi').addClass('hidden');
        $('#mat').addClass('hidden');
    });
    $( "#bt_event" ).click(function() {
        $('#event').removeClass('hidden');
        $('#user').addClass('hidden');
        $('#vehi').addClass('hidden');
        $('#mat').addClass('hidden');
    });
    $( "#bt_vehi" ).click(function() {
        $('#vehi').removeClass('hidden');
        $('#user').addClass('hidden');
        $('#event').addClass('hidden');
        $('#mat').addClass('hidden');
    });
    $( "#bt_mat" ).click(function() {
        $('#mat').removeClass('hidden');
        $('#user').addClass('hidden');
        $('#event').addClass('hidden');
        $('#vehi').addClass('hidden');
    });
</script>
