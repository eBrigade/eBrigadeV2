<?= $this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyD5JoDyuQnaIzvNOAJJQAmAz2IZBedpxzg&sensor=true'); ?>


    <div class="container-fluid clearfix">
        <?= $this->Html->link("Basculer en affichage tactique", array('controller' => 'Operations', 'action' => 'map', $operation->id), array('class' => 'btn btn-info btn-xs')) ?>

        <div class="row">
            <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                     aria-valuemin="0"
                     aria-valuemax="100" style="width: 40%">
                    <span class="sr-only">40% Complete (success)</span>
                </div>
            </div>
        </div>
        <button type="button" id="infobar-btn" class="btn btn-info btn-xs">afficher/masquer infos de l'opération
        </button>
        <div class="row">

            <div class="col-xs-6 col-md-4" id="infobar">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-danger">Détails importants de la mission</li>
                    <li class="list-group-item">
                        Opération n°<?= h($operation->id) ?> débutant le <?= h($operation->date) ?>
                    </li>
                    <li class="list-group-item">
                        Adresse : <?= h($operation->address) ?><br>
                        Ville
                        : <?= $operation->city->city ?>
                    </li>
                    <li class="list-group-item">
                        A ce jour il manque toujours 2 équipiers
                    </li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-info">Informations générales sur la mission de
                        secours
                    </li>
                    <li class="list-group-item">
                        <?= $operation->title ?>
                    <li class="list-group-item">
                        <div class="row-fluid">
                            <b>Localisation</b>
                            <?php
                            $map_options = array(
                                'id' => 'map_canvas',
                                'width' => '300px',
                                'height' => '300px',
                                'style' => '',
                                'zoom' => 7,
                                'type' => 'ROADMAP',
                                'custom' => null,
                                'localize' => false,
                                'latitude' => $operation->latitude,
                                'longitude' => $operation->longitude,
                                'address' => '1 Infinite Loop, Cupertino',
                                'marker' => true,
                                'markerTitle' => 'This is my position',
                                'markerIcon' => 'http://google-maps-icons.googlecode.com/files/home.png',
                                'markerShadow' => 'http://google-maps-icons.googlecode.com/files/shadow.png',
                                'infoWindow' => true,
                                'windowText' => 'My Position',
                                'draggableMarker' => false
                            );

                            echo $this->GoogleMap->map($map_options);
                            $marker_options = array(
                                'showWindow' => true,
                                'windowText' => $operation->title,
                                'markerTitle' => 'Title',
                                'draggableMarker' => false
                            );

                            ?>

                            <?= $this->GoogleMap->addMarker("map_canvas", 1, array('latitude' => $operation->latitude, 'longitude' => $operation->longitude), $marker_options); ?>

                        </div>

                        <div class="row-fluid">
                            <b>Organisation générale</b>
                            <p><?= $this->Text->autoParagraph(h($operation->general_organization)); ?></p>
                        </div>

                        <div class="row-fluid">
                            <b>Consignes pour équipes publics</b>
                            <p><?= $this->Text->autoParagraph(h($operation->team_instructions)); ?></p>
                        </div>
                        <div class="row-fluid">
                            <b>Consignes pour équipes acteurs</b>
                            <p><?= $this->Text->autoParagraph(h($operation->actors_organization)); ?></p>
                        </div>
                        <div class="row-fluid">
                            <b>Organisation du transport</b>
                            <p><?= $this->Text->autoParagraph(h($operation->transport_organization)); ?></p>
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
            <div class="col-xs-12 col-sm-6 col-md-8" id="event-gestion">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="event-modal-base">
                            <div class="event-modal-cont"></div>
                        </div>
                        <div class="team-modal-base">
                            <div class="team-modal-cont"></div>
                        </div>
                        <button id="btn-event-ope" class="btn btn-info btn-sm">Ajouter un événement
                        </button>
                        <button id="btn-team-create" class="btn btn-info btn-sm">Créer une équipe
                        </button>

                    </li>

                    <ul class="list-group">

                        <?php $teamNumber = 0 ?>
                        <?php if (!empty($operation->events)): ?>
                            <?php foreach ($operation->events as $event): ?>
                                <?php $teamNumber++ ?>

                                <li class="list-group-item list-group-item-info">

                                    <p><b>Nom de l'événement : </b><?= $event->title ?></p>
                                    <p><b>de : </b><?= $event->event_start_date ?>
                                        à <?= $event->event_end_date ?></p>
                                    <p><b>Horaires : </b><?= $event->horaires ?></p>
                                </li>
                                <div class="row-fluid clearfix">
                                    <div class="col-xs-6 col-md-6">
                                        <p><b>Détails : </b><?= $event->details ?></p>
                                        <p><b>instructions : </b><?= $event->instructions ?></p>

                                        <div class="btn-group">

                                            <button type="button" class="btn btn-info dropdown-toggle btn-xs"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                Modifier cet événement
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><?= $this->Html->link('Modifier les informations de l\'événement', ['controller' => 'Events', 'action' => 'view', $event->id]) ?> </a></li>
                                                <li role="separator" class="divider"></li>
                                                <li>
                                                    <?= $this->Form->postlink('Supprimer l\'événement et ses moyens', ['controller' => 'Events', 'action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </a></li>
                                                <li><a href="#">*todo*Vider la liste des équipes</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="#">*todo*Dupliquer l'événement et ses moyens</a></li>
                                            </ul>
                                        </div>
                                        <br>
                                        <br>
                                        <button type="button" class="btn btn-info dropdown-toggle btn-xs"
                                                data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Ajouter une équipe existante
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>

                                        </button>
                                        <ul class="dropdown-menu">
                                            <?php foreach ($teamsList as $teams): ?>
                                                <li class="list-group-item action-btn"
                                                    id="<?= $event->id ?>-<?= $event->id ?>-<?= $teams->id ?>-add-Events-Teams">
                                                    <?= $teams->name ?>
                                                </li>
                                            <?php endforeach; ?>

                                        </ul>

                                    </div>
                                    <div class="col-xs-6 col-md-6">
                                        <p><b>Lieu de rendez-vous : </b></p>
                                        <?php
                                        $map_options = array(
                                            'id' => 'map_canvas' . $teamNumber,
                                            'width' => '300px',
                                            'height' => '150px',
                                            'style' => '',
                                            'zoom' => 12,
                                            'type' => 'ROADMAP',
                                            'custom' => null,
                                            'localize' => false,
                                            'latitude' => $event->latitude,
                                            'longitude' => $event->longitude,
                                            'address' => '1 Infinite Loop, Cupertino',
                                            'marker' => true,
                                            'markerTitle' => 'This is my position',
                                            'markerIcon' => 'http://google-maps-icons.googlecode.com/files/home.png',
                                            'markerShadow' => 'http://google-maps-icons.googlecode.com/files/shadow.png',
                                            'infoWindow' => true,
                                            'windowText' => 'My Position',
                                            'draggableMarker' => false
                                        );

                                        echo $this->GoogleMap->map($map_options);
                                        $marker_options = array(
                                            'showWindow' => true,
                                            'windowText' => $event->title,
                                            'markerTitle' => $event->title,
                                            'draggableMarker' => false
                                        );

                                        ?>


                                        <?= $this->GoogleMap->addMarker("map_canvas" . $teamNumber, $teamNumber, array('latitude' => $event->latitude, 'longitude' => $event->longitude), $marker_options); ?>
                                    </div>
                                </div>

                                <ul class="list-group-item team"
                                    id="<?= $event->id ?>-<?= $event->id ?>-Events-Teams">
                                    <?php if (!empty($event->teams)): ?>
                                        <?php foreach ($event->teams as $teams): ?>

                                            <li class="list-group-item-success team-col-<?= $event->id ?>-<?= $teams->id ?>">
                                                <div class="row-fluid clearfix">
                                                    <div class="col-xs-6 col-md-6">
                                                        <p><b>ID de l'équipe : <?= h($teams->id) ?></b></p>
                                                        <p><b>Nom de l'équipe : </b><?= h($teams->name) ?></p>
                                                        <p><b>Consignes : </b><?= h($teams->description) ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-xs-6 col-md-6">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info btn-xs">Modifier
                                                                cette
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
                                                                <li class="action-btn"
                                                                    id="<?= $event->id ?>-<?= $event->id ?>-<?= $teams->id ?>-remove-Events-Teams">
                                                                    <a href="#">Retirer l'équipe de l'événement</a>
                                                                </li>
                                                                <li><?= $this->Form->postlink('Supprimer l\'équipe et ses moyens', ['controller' => 'Teams', 'action' => 'delete', $teams->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teams->id)]) ?> </a></li>


                                                                <li><a href="#">*todo*Vider la liste des équipiers</a></li>
                                                                <li><a href="#">*todo*Vider la liste des véhicules et du
                                                                        matériel</a></li>
                                                                <li role="separator" class="divider"></li>
                                                                <li><a href="#">*todo*Dupliquer l'équipe et ses moyens</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="list-group-item team-col-<?= $event->id ?>-<?= $teams->id ?>">

                                                <div class="row-fluid clearfix">

                                                    <ul class="list-group col-xs-4 col-sm-4 col-md-4">
                                                        <li class="list-group-item list-group-item-info">
                                                            <button type="button" class="btn btn-info btn-xs">Inscrire
                                                                du
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
                                                                        id="<?= $event->id ?>-<?= $teams->id ?>-<?= $users->id ?>-add-Teams-Users">
                                                                        <?= $users->firstname . ' ' . $users->lastname ?>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                            <span class="badge badge-danger">3/4</span>
                                                        </li>


                                                        <ul class="list-group-item team"
                                                            id="<?= $event->id ?>-<?= $teams->id ?>-Teams-Users">
                                                            <?php if (!empty($teams->users)): ?>
                                                                <?php foreach ($teams->users as $users): ?>
                                                                    <li class="list-group-item action-btn"
                                                                        id="<?= $event->id ?>-<?= $teams->id ?>-<?= $users->id ?>-remove-Teams-Users">
                                                                        <?= $users->firstname . ' ' . $users->lastname; ?>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </ul>

                                                    </ul>

                                                    <ul class="list-group col-xs-4 col-sm-4 col-md-4">
                                                        <li class="list-group-item list-group-item-info">
                                                            <button type="button" class="btn btn-info btn-xs">Affecter
                                                                du
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
                                                                        id="<?= $event->id ?>-<?= $teams->id ?>-<?= $material->id ?>-add-Teams-Materials">
                                                                        <?= $material->name ?>
                                                                    </li>
                                                                <?php endforeach; ?>

                                                            </ul>
                                                            <span class="badge badge-danger">3</span>
                                                        </li>
                                                        <ul class="list-group-item team"
                                                            id="<?= $event->id ?>-<?= $teams->id ?>-Teams-Materials">
                                                            <?php if (!empty($teams->materials)): ?>
                                                                <?php foreach ($teams->materials as $materials): ?>
                                                                    <li class="list-group-item action-btn"
                                                                        id="<?= $event->id ?>-<?= $teams->id ?>-<?= $materials->id ?>-remove-Teams-Materials">
                                                                        <?= $materials->name ?>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </ul>

                                                    <ul class="list-group col-xs-4 col-sm-4 col-md-4">
                                                        <li class="list-group-item list-group-item-info">
                                                            <button type="button" class="btn btn-info btn-xs">Affecter
                                                                des
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
                                                                        id="<?= $event->id ?>-<?= $teams->id ?>-<?= $vehicle->id ?>-add-Teams-Vehicles">
                                                                        <?= $vehicle->vehicle_type->name ?>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                            <span class="badge badge-danger">2</span>
                                                        </li>
                                                        <ul class="list-group-item team"
                                                            id="<?= $event->id ?>-<?= $teams->id ?>-Teams-Vehicles">
                                                            <?php if (!empty($teams->vehicles)): ?>
                                                                <?php foreach ($teams->vehicles as $vehicles): ?>
                                                                    <li class="list-group-item action-btn"
                                                                        id="<?= $event->id ?>-<?= $teams->id ?>-<?= $vehicles->id ?>-remove-Teams-Vehicles">
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
                                </ul>
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

        //left-side panel toggle
        $('#infobar-btn').on('click', function () {
            $('#event-gestion').toggleClass('col-md-8 col-md-12');
            $('#infobar').toggle(500, function () {

            });
        });

        //team add modal
        $('#btn-team-create').click(function () {
            var url = '<?= $this->Url->build(['controller' => 'Operations', 'action' => 'addteam']); ?>';
            $('.event-modal-cont').load(url, function (result) {
                $('#teamModal').modal({show: true});
            });
        });

        //event add modal
        $('#btn-event-ope').click(function () {
            var url = '<?= $this->Url->build(['controller' => 'Operations', 'action' => 'addevent', $operation->id]); ?>';
            $('.event-modal-cont').load(url, function (result) {
                $('#eventModal').modal({show: true});
            });
        });


    </script>
    <script>

        //manages ajax requests to server for add/remove on teams, users, materials and vehicles
        //and updates dynamically lists
        //todo: add team case, may necessitate a controller function and .ctp with ajax load.
        function actionButton() {

            //event on button
            $(document).on('click', '.action-btn', function () {

                //item is clicked object
                var item = $(this);

                //Object constructor for ajax request and also used for list updates
                function datax(source, containerID, contentID, action, containerType, contentType) {
                    this.source = source;
                    this.containerID = containerID;
                    this.contentID = contentID;
                    this.action = action;
                    this.containerType = containerType;
                    this.contentType = contentType;
                }

                //gets data from clicked element's id
                var data = $(this).attr('id').split('-');

                //populates datajax object
                var datajax = new datax(data[0], data[1], data[2], data[3], data[4], data[5]);

                //updates lists when item is removed
                if (datajax.action == 'remove') {
                    if (datajax.contentType == 'Teams') {
                        $('.team-col-' + datajax.containerID + '-' + datajax.contentID).remove();
                    }
                    item.remove();
                }

                //generates the id of where to add elements in case of add
                var listpos = datajax.source + "-" + datajax.containerID + "-" + datajax.containerType + "-" + datajax.contentType;


                //makes a clone of the clicked item, changes 'add' to 'remove' and appends it to the item list
                if (datajax.action == 'add') {

                    if (datajax.containerType == 'Events') {

                    } else {
                        var cloneID = datajax.source + '-' + datajax.containerID + '-' + datajax.contentID + '-remove-'
                            + datajax.containerType + '-' + datajax.contentType;

                        if ($('#' + cloneID).length) {
                            //empty case to avoid useless remove and clone
                        } else {
                            var clone = item.clone();
                            clone.attr('id', cloneID);
                            $('#' + listpos).append(clone);

                            //refreshes event listener so that newly cloned items are clickable (removable)
                        }
                    }

                }

                //ajax
                var request = $.ajax({
                    type: 'POST',
                    data: datajax,
                    url: '<?= $this->Url->build(["controller" => "Operations", "action" => "ajoints"]); ?>'
                });
                //todo: double check actions if success or not in db to validate or not changes
                request.done(function () {
                    if (datajax.containerType == "Events") {
                        refreshlist(datajax.source, datajax.containerID, datajax.containerType, datajax.contentType);

                    } /*else {
                        refreshlist(source, containerID, containerType, contentType);
                    }*/
                });
            });
        }
        actionButton();

        //loads every list (obsolete but may be used for db check after item add/remove)
        function loadlist() {
            var teams = $('.team');

            function datalist(source, containerID, containerType, contentType) {
                this.source = source;
                this.containerID = containerID;
                this.containerType = containerType;
                this.contentType = contentType;
            }

            $.each(teams, function () {
                var data = $(this).attr('id').split('-');
                var datajax = new datalist(data[0], data[1], data[2], data[3]);

                $(this).load('/Operations/loadlist/', datajax);
            });

        }

        //refreshes changed list
        function refreshlist(source, containerID, containerType, contentType) {
            var datalist = {
                source: source,
                containerID: containerID,
                containerType: containerType,
                contentType: contentType
            };
            var id = source + '-' + containerID + '-' + containerType + '-' + contentType;
            $('#' + id + '').load('/Operations/loadlist/', datalist);

        }
    </script>


<?= $this->Html->script('jquery-ui.js') ?>