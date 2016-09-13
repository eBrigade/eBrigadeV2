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
                    <li onclick="clickAction(<?= $event->id ?>, <?= $event->id?>, <?= $teams->id ?>, 'remove', 'Events', 'Teams')">Retirer l'équipe de l'événement</li>
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
                                <li class="list-group-item" onclick="clickAction(<?= $event->id ?>, <?= $teams->id?>, <?= $users->id ?>, 'add', 'Teams', 'Users')"><?= $users->firstname . ' ' . $users->lastname ?> </li>
                            <?php endforeach; ?>
                        </ul>
                        <span class="badge badge-danger">3/4</span>
                    </li>
                    <li class="list-group-item list-group-item-info">

                    <li class="list-group-item team"
                        id="<?= $event->id ?>-<?= $teams->id ?>-Teams-Users"></li>

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
                                <li class="list-group-item" onclick="clickAction(<?= $event->id ?>, <?= $teams->id?>, <?= $material->id ?>, 'add', 'Teams', 'Materials')">material ID : <?=$material->id ?></li>
                            <?php endforeach; ?>

                        </ul>
                        <span class="badge badge-danger">3</span>
                    </li>
                    <li class="list-group-item team"
                        id="<?= $event->id ?>-<?= $teams->id ?>-Teams-Materials"></li>
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
                                <li class="list-group-item" onclick="clickAction(<?= $event->id ?>, <?= $teams->id?>, <?= $vehicle->id ?>, 'add', 'Teams', 'Vehicles')">vehicle ID : <?=$vehicle->id ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <span class="badge badge-danger">2</span>
                    </li>
                    <li class="list-group-item team"
                        id="<?= $event->id ?>-<?= $teams->id ?>-Teams-Vehicles"></li>

                </ul>
            </div>

        </li>
    <?php endforeach; ?>

<?php endif; ?>