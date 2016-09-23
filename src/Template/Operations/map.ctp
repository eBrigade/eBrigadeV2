<?= $this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyD5JoDyuQnaIzvNOAJJQAmAz2IZBedpxzg&sensor=true'); ?>

<div class="container-fluid clearfix">
    <?= $this->Html->link("Basculer en affichage opérationnel", array('controller' => 'Operations', 'action' => 'operationnel', $operation->id), array('class' => 'btn btn-info btn-xs')) ?>
    <?= $this->Html->link("Basculer en affichage de gestion", array('controller' => 'Operations', 'action' => 'gestion', $operation->id), array('class' => 'btn btn-info btn-xs')) ?>

    <div class="row">
        <div class="col-xs-6 col-md-4">
            <ul class="list-group">


                <?php if (!empty($operation->events)): ?>
                <?php foreach ($operation->events as $event): ?>

                <li class="list-group-item list-group-item-info">

                    <p><b>Nom de l'événement : </b><?= $event->title ?></p>
                    <p><b>de : </b><?= $event->event_start_date ?>
                        à <?= $event->event_end_date ?></p>
                    <p><b>instructions : </b><?= $event->instructions ?></p>
                    <p><b>Horaires : </b><?= $event->horaires ?></p>
                </li>
            </ul>
            <div class="row-fluid clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <ul class="list-group">


                        <?php if (!empty($event->teams)): ?>
                            <?php foreach ($event->teams as $team): ?>

                                <li class="list-group-item list-group-item-success">

                                    <p><b>Nom de l'équipe: </b><?= $team->name ?></p>
                                    <p><b>Description </b><?= $team->desciption ?></p>
                                    <p><b>position : </b><?= $team->position_adresse ?></p>
                                    <p><b>Indicatif radio : </b><?= $team->radio_indicatif ?></p>
                                    <p><b>Fréquence radio : </b><?= $team->radio_frequence ?></p>
                                    <p><b>Horaires : </b><?= $team->horaires ?></p>
                                    <p><b>Consignes : </b><?= $team->consignes ?></p>

                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </ul>

                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="col-xs-6 col-md-8" id="map">
            <div class="row-fluid">
                <b>Localisation des Equipes</b>
                <?= $this->Html->link($this->Html->icon('floppy-save'), ['action' => 'savemap'], ['class' => 'btn btn-primary', 'id' => 'savemap', 'escape' => false]) ?>

                <?php
                $map_options = array(
                    'id' => 'map_gen',
                    'width' => '800px',
                    'height' => '800px',
                    'style' => '',
                    'zoom' => 7,
                    'type' => 'HYBRID',
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
                    'draggableMarker' => true
                );

                ?>

                <form id="positions">
                    <?php if (!empty($operation->events)): ?>
                        <?php $eventNum = 0 ?>
                        <?php foreach ($operation->events as $event): ?>
                            <?php $eventNum++ ?>

                            <?php if (!empty($event->teams)): ?>
                                <?php $teamNum = 0 ?>
                                <?php foreach ($event->teams as $team): ?>
                                    <?php $teamNum++ ?>

                                    <?= $this->GoogleMap->addMarker("map_gen", $eventNum . $teamNum, array('latitude' => $team->latitude, 'longitude' => $team->longitude), $marker_options); ?>
                                    <input type="text" class="lat teamID-<?= $team->id ?>"
                                           id="latitude_<?= $eventNum . $teamNum ?>"/>
                                    <input type="text" class="long teamID-<?= $team->id ?>"
                                           id="longitude_<?= $eventNum . $teamNum ?>"/>

                                <?php endforeach; ?>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    //savemap button
    //todo: format de data supporté par POST (PHP ftw)
    $('#savemap').on('click', function (event) {
        event.preventDefault();

        function data(teamID, lat, long) {

            this.id = teamID;
            this.latitude = lat;
            this.longitude = long;
        }

        var i = 0;
        var datajax = [];
        $.each($('.lat'), function () {

            var teamID = $(this).attr('class').split('-');
            var lat = $(this).val();
            if (lat !== "") {
                i++;
                var id = $(this).attr('id').replace('latitude', 'longitude');
                var long = $("#" + id).val();

                datajax[i] = new data(teamID[1], lat, long);

                console.log(datajax);
            }

        });

        //ajax
        $.ajax({
            type: 'POST',
            data: datajax,
            url: '<?= $this->Url->build(["controller" => "Operations", "action" => "savemap"]); ?>'
        });

    })

</script>