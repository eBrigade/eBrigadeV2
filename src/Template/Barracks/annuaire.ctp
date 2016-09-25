<?php $cell = $this->cell('Barrack') ?>
<?= $cell ?>


<div class='col-md-9'>
    <?php foreach ($barracks as $barrack): ?>
    <div class="col-md-6" >
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?= h($barrack->name) ?></h3>

                <?= $this->Form->postLink(__('<i class="glyphicon glyphicon-remove"></i>'),
                ['controller' => 'barracks', 'action' => 'delete', $barrack->id],
                [
                'class' => 'btn btn-sm btn-danger pull-right mgblist upmarge',
                'escape' => false,
                'data-original-title' => 'Supprimer cette caserne',
                'data-toggle' => 'tooltip',
                'confirm' => __('Etes-vous sûr de vouloir supprimer cette caserne')
                ]
                ) ?>

                <a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'edit', $barrack->id]); ?>" data-original-title="Editer cette caserne" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning pull-right upmarge"><i class="glyphicon glyphicon-edit"></i></a>

            </div>
            <div class="panel-body">
                <div class="row">

                    <div class=" col-md-12 col-lg-12 ">
                        <table class="table table-user-information">
                            <tbody>
                            <tr>
                                <td width="35%">Ville :</td>
                                <td><?= $barrack->city->city.' ('.$barrack->city->zipcode.')' ?></td>
                            </tr>
                            <tr>
                                <td>Adresse :</td>
                                <td><?= h($barrack->address) ?><br>
                                    <?= h($barrack->address_complement) ?  : '<br>' ?>
                                </td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td><?= h($barrack->email) ?></td>
                            </tr>
                            <td>Téléphone</td>
                            <td><?= h($barrack->phone) ?><br><br><?= h($barrack->fax) ?>
                                <?= ($barrack->fax) ? '(fax)' : '<br>' ?>
                            </td>

                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'view', $barrack->id]); ?>" class="btn btn-primary btn-sm " data-original-title="Voir la fiche détaillée" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open"></i> DETAILS</a>
                <a href="<?= $this->Url->build(['controller' => 'messages','action' => 'send']); ?>" class="btn btn-primary  btn-sm" data-original-title="Envoyer un message privé" data-toggle="tooltip"><i class="glyphicon glyphicon-envelope"></i> MP</a>
                <?php
            if (!empty($barrack->website_url)){
                echo '<a href="http://'.$barrack->website_url .'" target="_blank" class="btn btn-primary  btn-sm pull-right" data-original-title="Visitez le site" data-toggle="tooltip"><i class="glyphicon glyphicon-link"></i> SITE WEB</a>' ;
                } ?>
            </div>

        </div>
    </div>
    <?php endforeach; ?>



    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>



    <script>
            $('[data-toggle="tooltip"]').tooltip();
    </script>
