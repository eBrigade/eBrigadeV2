<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Gestion de la caserne <?=  $barrack->name ?></div>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-lg-3 col-md-6" id="bt_user">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">26</div>
                        <div>Personnes</div>
                    </div>
                </div>
            </div>
            <a href="#user">
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
                        <div class="huge">12</div>
                        <div>Evénements</div>
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
                        <div class="huge">124</div>
                        <div>Véhicules</div>
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
                        <div class="huge">13</div>
                        <div>Matériels</div>
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




        <div class="panel panel-primary hidden" id="user">
            <div class="panel-heading">Personnel
                <a href='<?= $this->Url->build(["controller" => "users","action" => "view" ]); ?>'
                   class="btn btn-danger pull-right btn-add marge"><i class="glyphicon glyphicon-remove"></i> </a>
                <a href='<?= $this->Url->build(["controller" => "users","action" => "view" ]); ?>'
                   class="btn btn-success pull-right btn-add marge"><i class="glyphicon glyphicon-plus"></i> Créer</a>
                <a href='<?= $this->Url->build(["controller" => "users","action" => "view"]); ?>'
                   class="btn btn-warning pull-right btn-add marge"><i class="glyphicon glyphicon-arrow-down"></i> Ajouter</a>
            </div>
                        <table class="table table-bordered table-hover" width="100%" id="tbl">
                            <thead>
                            <tr>
                                <th></th>
                                 <th><?= $this->Paginator->sort('Users.firstname', ['label' => 'Nom']) ?></th>
                                <th>Prénom</th>
                                <th>Née le</th>
                                <th>Code postal</th>
                                <th>Ville</th>
                                <th>Adresse</th>
                                <th>Téléphone</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user): ?>
                            <tr id="<?= $user->id ?>">
                                <td style="text-align:center;"><?= $this->Form->checkbox('erase', ['value' => $user->id , 'id' => 'a_chkDelete','class' => 'text-centered']); ?></td>
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
                     <!--          <?= $this->Form->postLink(__('<i class="fa fa-times" aria-hidden="true"></i>'),
                                    ['controller' => 'users', 'action' => 'delete', $user->id],
                                    [
                                    'class' => 'btn btn-sm btn-danger ',
                                    'escape' => false,
                                    'data-original-title' => 'Supprimer cette caserne',
                                    'data-toggle' => 'tooltip',
                                    'confirm' => __('Etes-vous sûr de vouloir supprimer cet utilisateur ?')
                                    ]
                                    ) ?>-->
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






    </div>
</div>

<script>
    $('#tbl').find('input:checkbox[id$="a_chkDelete"]').click(function() {
        var isChecked = $(this).prop("checked");
        var $selectedRow = $(this).parent("td").parent("tr");

        if (isChecked) $selectedRow.css({
            "background-color": "#D4FFAA"
        });
        else $selectedRow.css({
            "background-color": ''
        });
    });


    $( "#bt_user" ).click(function() {
        $('#user').removeClass('hidden');
    });
    $( "#bt_event" ).click(function() {
        $('#user').addClass('hidden');
    });
</script>
