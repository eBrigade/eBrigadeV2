<nav class="large-3 medium-4 columns" id="actions-sidebar">
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
                    <?= $event[0]['details'] ?>
                </li>
                <li class="list-group-item">
                    A ce jour il manque toujours 2 équipiers
                </li>
            </ul>
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Informations générales sur la mission de secours</li>
                <li class="list-group-item">
                    <?= $event[0]['title'] ?>
                </li>
                <li class="list-group-item">
                    <div class="row-fluid">
                        <b>Localisation</b><p>Une belle petite carte google de localisation ? <?= $cities[0]['city'] ?></p></div>

                    <div class="row-fluid">
                        <b>Date</b><p><?= $event[0]['event_start_date'] ?> à <?= $event[0]['event_end_date'] ?></p>
                    </div>

                    <div class="row-fluid">
                        <b>Horraire</b><p><?= $event[0]['horaires'] ?></p>
                    </div>

                    <div class="row-fluid">
                        <b>Consignes générales</b><p><?= $event[0]['instructions'] ?></p>
                    </div>

                    <div class="row-fluid">
                        <b>Consignes pour équipes public</b><p></p>
                    </div>
                    <div class="row-fluid">
                        <b>Consignes pour équipes acteurs</b><p></p>
                    </div>
                    <div class="row-fluid">
                        <b>Prix</b><p><?= $event[0]['price'] ?> €</p>
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
                <li class="list-group-item list-group-item-info">
                    <button type="submit" class="btn btn-info btn-sm" id="bt-aj-eq-for">Ajouter une équipe</button>
                    Détails de la mission
                </li>
                <?php foreach ($teamz as $team):?>
                <li class="list-group-item">

                    <div class="btn-group">

                        <button type="button" class="btn btn-info btn-xs">Modifier cette équipe</button>
                        <button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Modifier les informations de l'équipe</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Supprimer l'équipe et ses moyens</a></li>
                            <li><a href="#">Vider la liste des équipiers</a></li>
                            <li><a href="#">Vider la liste des véhicules et du matériel</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Dupliquer l'équipe et ses moyens</a></li>
                        </ul>
                    </div>
                    <div class="row-fluid">
                        <p><b>Nom de l'équipe : </b><?= $team->name ?></p>
                        <p><b>Horaires : </b>de 8h à 12h</p>
                        <p><b>Lieu de rendez-vous : </b>Caserne de Raon-aux-Bois</p>
                        <p><b>Positionnement : </b>début de la course</p>
                        <p><b>Mission principale : </b>Public et Acteurs</p>
                        <p><b>Consignes : </b>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p>
                    </div>
                    <div class="row-fluid clearfix">

                        <ul class="list-group col-xs-6 col-sm-6 col-md-6">
                            <li class="list-group-item list-group-item-info">
                                <button type="button" class="btn btn-info btn-xs">Inscrire du personnel</button>
                                <span class="badge badge-danger">0/4</span>
                            </li>
                            <?php foreach ($userz as $user):?>
                            <li class="list-group-item"><?= $user->firstname?></li>
                            <?php endforeach; ?>
                        </ul>

                        <ul class="list-group col-xs-3 col-sm-3 col-md-3">
                            <li class="list-group-item list-group-item-info">
                                <button type="button" class="btn btn-info btn-xs">Affecter du matériel</button>
                                <span class="badge badge-danger">2</span>
                            </li>
                            <li class="list-group-item">Champ d'ajout et bouton</li>
                            <li class="list-group-item">Nicolas</li>
                        </ul>

                        <ul class="list-group col-xs-3 col-sm-3 col-md-3">
                            <li class="list-group-item list-group-item-info">
                                <button type="button" class="btn btn-info btn-xs">Affecter des véhicules</button>
                                <span class="badge badge-danger">3</span>
                            </li>
                            <li class="list-group-item">VPSP 882 - AZ-852-FR</li>
                            <li class="list-group-item">Jean-Christophe</li>
                            <li class="list-group-item">Nicolas</li>
                        </ul>
                    </div>
                </li>
                    </ul>
                <?php endforeach; ?>
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Bilan de la mission</li>
                <li class="list-group-item">Un beau formulaire chiffres et textarea</li>
            </ul>
        </div>
    </div>
</div>
</body>