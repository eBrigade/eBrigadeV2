<div class="row">
    <div class="col-md-12">
        <div class="panel panel-danger">
            <div class="panel-heading">Gestion de la caserne <?=  $barrack->name ?></div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Personnel</div>


                        <table class="table table-hover table-striped" border="1px" width="100%" id="tbl-us">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Née le</th>
                                <th>Code postal</th>
                                <th>Ville</th>
                                <th>Adresse</th>
                                <th>Téléphone</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($barrack->users as $user): ?>
                            <tr id="<?= $user->id ?>">
                                <td><?=  $user->firstname ?></td>
                                <td><?=  $user->lastname ?></td>
                                <td><?= $user->birthday ?></td>
                                <td><?= $user->zipcode ?></td>
                                <td><?= $user->city->city ?></td>
                                <td><?=  $user->address ?></td>
                                <td><?= $user->phone ?><br><?= $user->cellphone ?><br><?= $user->workphone ?></td>
                                </td>
                                <td>
                                    <a href='<?= $this->Url->build(["controller" => "messages","action" => "send" ]); ?>'
                                       class="btn btn-default btn-sm   "><i class="fa fa-envelope" aria-hidden="true"></i> </a>
                                    <a href='<?= $this->Url->build(["controller" => "users","action" => "view", $user->id ]); ?>'
                                       class="btn btn-default btn-sm   "><i class="fa fa-user" aria-hidden="true"></i></a>
                               <?= $this->Form->postLink(__('<i class="fa fa-times" aria-hidden="true"></i>'),
                                    ['controller' => 'users', 'action' => 'delete', $user->id],
                                    [
                                    'class' => 'btn btn-sm btn-danger ',
                                    'escape' => false,
                                    'data-original-title' => 'Supprimer cette caserne',
                                    'data-toggle' => 'tooltip',
                                    'confirm' => __('Etes-vous sûr de vouloir supprimer cet utilisateur ?')
                                    ]
                                    ) ?>
                                </td>
                            </tr>

                            <?php endforeach;  ?>
                            </tbody>
                        </table>

        </div>
    </div>
</div>
