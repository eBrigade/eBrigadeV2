<nav class="large-3 medium-4 columns" id="actions-sidebar" xmlns="http://www.w3.org/1999/html">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formation'), ['action' => 'edit', $formation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formation'), ['action' => 'delete', $formation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<body>
<div class="container-fluid clearfix">
    <div class="row">
        <div class="col-xs-6 col-md-4">
            <ul class="list-group">
                <li class="list-group-item list-group-item-danger">Détails importants de la mission</li>
                <li class="list-group-item">
                    ????
                </li>
                <li class="list-group-item">
                    A ce jour il manque toujours 2 équipiers
                </li>
            </ul>
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Informations générales sur la mission de secours</li>
                <li class="list-group-item">
                    <?= $formation->title ?>
                </li>
                <li class="list-group-item">
                    <div class="row-fluid">
                        <b>Localisation</b>
                        <p>Une belle petite carte google de localisation ? <?= $formation->city_id ?></p></div>

                    <div class="row-fluid">
                        <b>Date</b>
                        <p><?= $formation->formation_start ?> à <?= $formation->formation_end ?></p>
                    </div>
                    <div class="row-fluid">
                        <b>Consignes générales</b>
                        <p><?= $formation->instruction ?></p>
                    </div>
                    <div class="row-fluid">
                        <b>Prix</b>
                        <p><?= $formation->price ?> €</p>
                    </div>
                </li>

            </ul>


            <ul class="list-group">
                <li class="list-group-item list-group-item-info">
                    <button type="submit" class="btn btn-info btn-sm">Ajouter un document</button>
                    Documents liés à la mission
                </li>
                <li class="list-group-item">
                    Lien vers les documents
                </li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-8">
            <ul class="list-group">
                <li class="list-group-item list-group-item-info haha">
                    <div class="my-modal-base">
                        <div class="my-modal-cont"></div>
                    </div>
                    <div class="btn btn-info btn-sm" id="bt-aj-eq-for">Ajouter une équipe</div>
                    Détails de la mission
                </li>
                <?php foreach ($formation->events as $event): ?>

                    <li class="list-group-item">
                        <div class="panel-body">
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-xs">Modifier cette équipe</button>
                                <button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="/Events/edit/<?= $event->id ?>">Modifier les informations de l'équipe</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Supprimer l'équipe et ses moyens</a></li>
                                    <li><a href="#">Vider la liste des équipiers</a></li>
                                    <li><a href="#">Vider la liste des véhicules et du matériel</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Dupliquer l'équipe et ses moyens</a></li>
                                </ul>
                            </div>

                            <div class="row-fluid">
                                <p><b>Nom de l'équipe : </b><?= $event->title ?></p>
                                <p><b>Horaires : </b><?= $event->horaires ?></p>
                                <p><b>Lieu de rendez-vous : </b><?= $event->details ?></p>
                                <p><b>Prix : </b><?= $event->price ?></p>
                                <p><b>Mission principale : </b>Public et Acteurs</p>
                                <p><b>Consignes : </b><?= $event->instructions ?></p>
                            </div>
                            <div class="row-fluid clearfix">
                                <ul class="list-group col-xs-6 col-sm-6 col-md-3">
                                    <?php foreach ($event->teams as $team): ?>
                                    <li class="list-group-item list-group-item-info">
                                        <button type="button" class="btn btn-info btn-xs" id="bt-aj-es-for" onclick="modula(<?= $team->id ?>)">Ajout Users</button>
                                        <span class="badge badge-danger">0/4</span>
                                    </li>
                                    <?php foreach ($team->users as $user): ?>
                                        <li class="list-group-item"><?= $user->firstname ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <ul class="list-group col-xs-3 col-sm-3 col-md-3">
                                    <li class="list-group-item list-group-item-info">
                                        <button type="button" class="btn btn-info btn-xs">Affecter du matériel</button>
                                        <span class="badge badge-danger">2</span>
                                    </li>
                                    <?php foreach ($team->materials as $material): ?>
                                        <li class="list-group-item"><?= $material->id ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <ul class="list-group col-xs-3 col-sm-3 col-md-3">
                                    <li class="list-group-item list-group-item-info">
                                        <button type="button" class="btn btn-info btn-xs">Affecter des véhicules
                                        </button>
                                        <span class="badge badge-danger">3</span>
                                    </li>
                                    <?php foreach ($team->vehicles as $vehicles): ?>
                                        <li class="list-group-item"><?= $vehicles->id ?></li>
                                    <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Bilan de la mission</li>
                <li class="list-group-item">Un beau formulaire chiffres et textarea</li>
            </ul>
        </div>
    </div>
</div>
<script>
    $('#bt-aj-eq-for').click(function () {
        var url = '<?= $this->Url->build(['controller' => 'Formations', 'action' => 'addevent', $formation->id]); ?>';
        $('.my-modal-cont').load(url, function (result) {
            $('#myModal').modal({show: true});
        });
    });

    function modula(id) {
        console.log(id);
        var url = '/Formations/adduserteam/'+id+'/4';
        $('.my-modal-cont').load(url, function (result) {
            $('#myModal2').modal({show: true});
        });
    }
</script>
</body>