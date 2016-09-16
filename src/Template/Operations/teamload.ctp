
<?php if (!empty($list->teams)): ?>
    <?php foreach ($list->teams as $teams): ?>

        <li class="list-group-item-success team-col-<?= $list->id?>-<?= $teams->id?>">
            <div class="row-fluid clearfix">
                <div class="col-xs-6 col-md-6">
                    <p><b>ID de l'équipe : <?= h($teams->id) ?></b></p>
                    <p><b>Nom de l'équipe : </b><?= h($teams->name) ?></p>
                    <p><b>Consignes : </b><?= h($teams->description) ?>
                    </p>
                </div>
                <div class="col-xs-6 col-md-6">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-xs">Modifier cette
                            équipe
                        </button>
                        <button type="button"
                                class="btn btn-info dropdown-toggle btn-xs"
                                data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><?= $this->Html->link(__("Modifier les informations de l'équipe"), ['controller' => 'Teams', 'action' => 'edit', $teams->id]) ?></li>
                            <li role="separator" class="divider"></li>
                            <li class="list-group-item action-btn"
                                id="<?= $list->id ?>-<?= $list->id ?>-<?= $teams->id ?>-remove-Events-Teams">
                                Retirer l'équipe de l'événement
                            </li>
                            <li><a href="#">Vider la liste des équipiers</a></li>
                            <li><a href="#">Vider la liste des véhicules et du
                                    matériel</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Dupliquer l'équipe et ses moyens</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </li>
        <li class="list-group-item team-col-<?= $list->id?>-<?= $teams->id?>">

            <div class="row-fluid clearfix">

                <ul class="list-group col-xs-4 col-sm-4 col-md-4">
                    <li class="list-group-item list-group-item-info">
                        <button type="button" class="btn btn-info btn-xs">Inscrire du
                            personnel
                        </button>
                        <button type="button"
                                class="btn btn-info dropdown-toggle btn-xs"
                                data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php foreach ($usersList as $users): ?>
                                <li class="list-group-item action-btn"
                                    id="<?= $list->id ?>-<?= $teams->id ?>-<?= $users->id ?>-add-Teams-Users">
                                    <?= $users->firstname . ' ' . $users->lastname ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <span class="badge badge-danger">3/4</span>
                    </li>


                    <ul class="list-group-item team"
                        id="<?= $list->id ?>-<?= $teams->id ?>-Teams-Users">
                        <?php if (!empty($teams->users)): ?>
                            <?php foreach ($teams->users as $users): ?>
                                <li class="list-group-item action-btn"
                                    id="<?= $list->id ?>-<?= $teams->id ?>-<?= $users->id ?>-remove-Teams-Users">
                                    <?= $users->firstname . ' ' . $users->lastname; ?>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>

                </ul>

                <ul class="list-group col-xs-4 col-sm-4 col-md-4">
                    <li class="list-group-item list-group-item-info">
                        <button type="button" class="btn btn-info btn-xs">Affecter du
                            matériel
                        </button>
                        <button type="button"
                                class="btn btn-info dropdown-toggle btn-xs"
                                data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php foreach ($materialsList as $material): ?>
                                <li class="list-group-item action-btn"
                                    id="<?= $list->id ?>-<?= $teams->id ?>-<?= $material->id ?>-add-Teams-Materials">
                                    <?= $material->name ?>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                        <span class="badge badge-danger">3</span>
                    </li>
                    <ul class="list-group-item team"
                        id="<?= $list->id ?>-<?= $teams->id ?>-Teams-Materials">
                        <?php if (!empty($teams->materials)): ?>
                            <?php foreach ($teams->materials as $materials): ?>
                                <li class="list-group-item action-btn"
                                    id="<?= $list->id ?>-<?= $teams->id ?>-<?= $materials->id ?>-remove-Teams-Materials">
                                    <?= $materials->name ?>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </ul>

                <ul class="list-group col-xs-4 col-sm-4 col-md-4">
                    <li class="list-group-item list-group-item-info">
                        <button type="button" class="btn btn-info btn-xs">Affecter des
                            véhicules
                        </button>
                        <button type="button"
                                class="btn btn-info dropdown-toggle btn-xs"
                                data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php foreach ($vehiclesList as $vehicle): ?>
                                <li class="list-group-item action-btn"
                                    id="<?= $list->id ?>-<?= $teams->id ?>-<?= $vehicle->id ?>-add-Teams-Vehicles">
                                    <?= $vehicle->vehicle_type->name ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <span class="badge badge-danger">2</span>
                    </li>
                    <ul class="list-group-item team"
                        id="<?= $list->id ?>-<?= $teams->id ?>-Teams-Vehicles">
                        <?php if (!empty($teams->vehicles)): ?>
                            <?php foreach ($teams->vehicles as $vehicles): ?>
                                <li class="list-group-item action-btn"
                                    id="<?= $list->id ?>-<?= $teams->id ?>-<?= $vehicles->id ?>-remove-Teams-Vehicles">
                                    <?= $vehicles->vehicle_type->name ?>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </ul>
            </div>

        </li>

    <?php endforeach; ?>

<?php endif; ?>