
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
                <!--Ici ce charge la table vehicule-->
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
                <!--Ici ce charge la table utilisateur-->
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
                            <!--Ici ce charge la table matériel-->
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
            </div>
        </div>


    </div><!--colonne droite-->

</div>  <!--row global-->


<script>
    // charge les différentes vues
    var id = '<?= $barrack->id ?>';
    $('#tbl-user').load('/Barracks/view/' + id + '/user');
    $('#tbl-vehi').load('/Barracks/view/' + id + '/vehicle');
    $('#tbl-material').load('/Barracks/view/' + id + '/material');
    $('#tbl-user-material').load('/Materials/rented/'+id);


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
