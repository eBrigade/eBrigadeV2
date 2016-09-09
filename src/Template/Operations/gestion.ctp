<div class="container-fluid clearfix">
    <div class="row">
        <div class="col-xs-6 col-md-4">
            <ul class="list-group">
                <li class="list-group-item">
                    <?= h($event->title) ?>
                    <?= h($event->event_start_date) ?>
                    <?= h($event->event_end_date) ?>
                </li>
                <li class="list-group-item list-group-item-danger">Détails importants de la mission</li>
                <li class="list-group-item">
                    <?= h($event->instructions) ?>
                </li>
                <li class="list-group-item">
                    A ce jour il manque toujours 2 équipiers
                </li>
            </ul>
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Informations générales sur la mission de secours</li>
                <li class="list-group-item">
                    Foire à la Choucroute de Strasbourg
                </li>
                <li class="list-group-item">
                    <div class="row-fluid">
                        <b>Localisation</b>
                        <p>Une belle petite carte google de localisation ?</p></div>

                    <div class="row-fluid">
                        <b>Consignes générales</b>
                        <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page
                            avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les
                            années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser
                            un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est
                            aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été
                            popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages
                            du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page
                            de texte, comme Aldus PageMaker.</p>
                    </div>

                    <div class="row-fluid">
                        <b>Consignes pour équipes public</b>
                        <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page
                            avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les
                            années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser
                            un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est
                            aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été
                            popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages
                            du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page
                            de texte, comme Aldus PageMaker.</p>
                    </div>
                    <div class="row-fluid">
                        <b>Consignes pour équipes acteurs</b>
                        <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page
                            avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les
                            années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser
                            un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est
                            aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été
                            popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages
                            du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page
                            de texte, comme Aldus PageMaker.</p>
                    </div>
                    <div class="row-fluid">
                        <b>Enfin bref, toutes les infos du formulaires qui sont utiles</b>
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

                    <button type="submit" class="btn btn-info btn-sm">Ajouter une équipe</button>
                    <button type="button" class="btn btn-info dropdown-toggle btn-xs"
                            data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <?php foreach ($teamsList as $teams): ?>
                            <li><?= $this->Html->link($teams->name, ['controller' => 'operations', 'action' => 'megaJoints', '?' => array('source' => $event->id, 'containerID' => $event->id, 'contentID' => $teams->id, 'action' => 'add', 'containerType' => 'Events', 'contentType' => 'Teams')]) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <p id="teamNumber"></p>
                    Détails de la mission
                </li>

                <?php
                $teamNumber = 0;
                if (!empty($event->teams)): ?>

                    <?php foreach ($event->teams as $teams): ?>
                        <?php $teamNumber++ ?>
                        <li class="list-group-item">

                            <div class="btn-group">


                                <button type="button" class="btn btn-info btn-xs">Modifier cette équipe</button>
                                <button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><?= $this->Html->link(__("Modifier les informations de l'équipe"), ['controller' => 'Teams', 'action' => 'edit', $teams->id]) ?></li>
                                    <li role="separator" class="divider"></li>
                                    <li><?= $this->Html->link(__("Retirer l'équipe de l'événement"), ['controller' => 'operations', 'action' => 'megaJoints', '?' => array('source' => $event->id, 'containerID' => $event->id, 'contentID' => $teams->id, 'action' => 'remove', 'containerType' => 'Events', 'contentType' => 'Teams')]) ?></li>
                                    <li><a href="#">Vider la liste des équipiers</a></li>
                                    <li><a href="#">Vider la liste des véhicules et du matériel</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Dupliquer l'équipe et ses moyens</a></li>
                                </ul>
                            </div>
                            <div class="row-fluid">
                                <p><b>ID de l'équipe : <?= h($teams->id) ?></b></p>
                                <p><b>Nom de l'équipe : </b><?= h($teams->name) ?></p>
                                <p><b>Horaires : </b>de 8h à 12h</p>
                                <p><b>Lieu de rendez-vous : </b>Caserne de Raon-aux-Bois</p>
                                <p><b>Positionnement : </b>début de la course</p>
                                <p><b>Mission principale : </b>Public et Acteurs</p>
                                <p><b>Consignes : </b><?= h($teams->description) ?>
                                </p>
                            </div>
                            <div class="row-fluid clearfix">

                                <ul class="list-group col-xs-4 col-sm-4 col-md-4">
                                    <li class="list-group-item list-group-item-info">
                                        <button type="button" class="btn btn-info btn-xs">Inscrire du personnel</button>
                                        <button type="button" class="btn btn-info dropdown-toggle btn-xs"
                                                data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <?php foreach ($userLists as $users): ?>
                                                <li><?= $this->Html->link($users->firstname . ' ' . $users->lastname, ['controller' => 'operations', 'action' => 'megaJoints', '?' => array('source' => $event->id, 'containerID' => $teams->id, 'contentID' => $users->id, 'action' => 'add', 'containerType' => 'Teams', 'contentType' => 'Users')]) ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <span class="badge badge-danger">3/4</span>
                                    </li>
                                    <li class="list-group-item list-group-item-info">

                                    <li class="list-group-item"></li>


                                    <?php if (!empty($teams->users)): ?>

                                        <?php foreach ($teams->users as $users): ?>
                                            <li class="list-group-item"><?= $this->Html->link($users->firstname . ' ' . $users->lastname, ['controller' => 'operations', 'action' => 'megaJoints', '?' => array('source' => $event->id, 'containerID' => $teams->id, 'contentID' => $users->id, 'action' => 'remove', 'containerType' => 'Teams', 'contentType' => 'Users')]) ?></li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>

                                <ul class="list-group col-xs-4 col-sm-4 col-md-4">
                                    <li class="list-group-item list-group-item-info">
                                        <button type="button" class="btn btn-info btn-xs">Affecter du matériel</button>
                                        <button type="button" class="btn btn-info dropdown-toggle btn-xs"
                                                data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <?php foreach ($materialsList as $material): ?>
                                                <li><?= $this->Html->link(' material ID : ' . $material->id, ['controller' => 'operations', 'action' => 'megaJoints', '?' => array('source' => $event->id, 'containerID' => $teams->id, 'contentID' => $material->id, 'action' => 'add', 'containerType' => 'Teams', 'contentType' => 'Materials')]) ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <span class="badge badge-danger">3</span>
                                    </li>

                                    <?php if (!empty($teams->materials)): ?>

                                        <?php foreach ($teams->materials as $materials): ?>
                                            <li class="list-group-item"><?= $this->Html->link(' material ID : ' . $materials->id, ['controller' => 'operations', 'action' => 'megaJoints', '?' => array('source' => $event->id, 'containerID' => $teams->id, 'contentID' => $materials->id, 'action' => 'remove', 'containerType' => 'Teams', 'contentType' => 'Materials')]) ?></li>
                                        <?php endforeach; ?>

                                    <?php endif; ?>
                                </ul>

                                <ul class="list-group col-xs-4 col-sm-4 col-md-4">
                                    <li class="list-group-item list-group-item-info">
                                        <button type="button" class="btn btn-info btn-xs">Affecter des véhicules
                                        </button>
                                        <button type="button" class="btn btn-info dropdown-toggle btn-xs"
                                                data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <?php foreach ($vehiclesList as $vehicle): ?>
                                                <li><?= $this->Html->link(' vehicle ID : ' . $vehicle->id, ['controller' => 'operations', 'action' => 'megaJoints', '?' => array('source' => $event->id, 'containerID' => $teams->id, 'contentID' => $vehicle->id, 'action' => 'add', 'containerType' => 'Teams', 'contentType' => 'Vehicles')]) ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <span class="badge badge-danger">2</span>
                                    </li>
                                    <li class="list-group-item">Champ d'ajout et bouton</li>
                                    <?php if (!empty($teams->vehicles)): ?>

                                        <?php foreach ($teams->vehicles as $vehicle): ?>
                                            <li class="list-group-item"><?= $this->Html->link(' vehicle ID : ' . $vehicle->id, ['controller' => 'operations', 'action' => 'megaJoints', '?' => array('source' => $event->id, 'containerID' => $teams->id, 'contentID' => $vehicle->id, 'action' => 'remove', 'containerType' => 'Teams', 'contentType' => 'Vehicles')]) ?></li>
                                        <?php endforeach; ?>

                                    <?php endif; ?>
                                </ul>
                            </div>

                        </li>
                    <?php endforeach; ?>

                <?php endif; ?>

            </ul>
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Bilan de la mission</li>
                <li class="list-group-item">Un beau formulaire chiffres et textarea</li>
            </ul>
        </div>
    </div>
</div>
<script>
    $('#teamNumber').html("Nombre d'équipes : " + <?= $teamNumber ?>);
</script>