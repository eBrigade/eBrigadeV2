<?= $this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyD5JoDyuQnaIzvNOAJJQAmAz2IZBedpxzg&sensor=true'); ?>

<div class="container-fluid clearfix">
    <?= $this->Html->link("Basculer en affichage de gestion", array('controller' => 'Operations','action'=> 'gestion', $operation->id), array( 'class' => 'btn btn-info btn-xs')) ?>

    <div class="row">
        <div class="col-xs-6 col-md-4">
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
            </ul>
            <div class="row-fluid clearfix">
                <div class="col-xs-12 col-sm-6 col-md-8">
                    <p><b>Lieu de rendez-vous : </b>google map</p>
                    <p><b>Instructions : </b><?= $event->instructions ?></p>
                    <p><b>Détails : </b><?= $event->details ?></p>
                    <p><b>instructions : </b><?= $event->instructions ?></p>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="col-xs-6 col-md-8" id="map">
            <div class="row-fluid">
                <b>Localisation des Equipes</b>
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

                <?php if (!empty($operation->events)): ?>
                    <?php $num = 0 ?>
                    <?php foreach ($operation->events as $event): ?>
                        <?php $num++ ?>
                        <?= $this->GoogleMap->addMarker("map_gen", $num, array('latitude' => $event->latitude, 'longitude' => $event->longitude), $marker_options); ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>