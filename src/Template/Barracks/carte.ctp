<?= $this->Html->css('tree.css') ?>
<?= $this->Html->script('tree.js')?>


<?php $cell = $this->cell('Barrack') ?>
<?= $cell ?>



<div class='col-md-9'>

    <div class="panel panel-primary">
        <div class="panel-heading"><?= __('Carte des Casernes') ?>
        </div>


        <div class="map-responsive">
            <?= $this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyD5JoDyuQnaIzvNOAJJQAmAz2IZBedpxzg&sensor=true'); ?>

            <?php
                            $map_options = array(
                                'id' => 'gmap',
            'width' => '100%',
            'height' => '550px',
            'style' => '',
            'zoom' => 6,
            'type' => 'ROADMAP',
            'custom' => null,
            'localize' => false,
            'address' => 'France' ,
            'marker' => true,
            'markerTitle' => '',
            'markerIcon' => 'http://google-maps-icons.googlecode.com/files/home.png',
            'markerShadow' => 'http://google-maps-icons.googlecode.com/files/shadow.png',
            'infoWindow' => false,
            'windowText' => 'My Position',
            'draggableMarker' => false
            );
            echo $this->GoogleMap->map($map_options);
            ?>


            <?php  foreach ($barracks as $bar): ?>
            <?= $this->GoogleMap->addMarker("gmap", 1, array("latitude" => $bar->city->latitude, "longitude" => $bar->city->longitude),
            array(
            "showWindow" => true,
            "windowText" => $this->Html->link( $bar->name,['controller' => 'Barracks', 'action' => 'view', $bar->id]),
            "markerTitle" => $bar->name." à ".$bar->city->city,
            "draggableMarker" => false
            )); ?>
            <?php endforeach ?>
        </div>

    </div>
</div>


