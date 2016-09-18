<?= $this->Html->css('tree.css') ?>
<?= $this->Html->script('tree.js')?>
<div class='col-md-2'>

    <div class="sidebar-nav linkout">
        <div class="navbar navbar-default" role="navigation">
            <ul class="nav nav-pills nav-stacked">
                <li class="active" ><a href="javascript:;"> Afficher par
                </a>
                </li>
                <li><a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'index']); ?>">Arborescence</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'annuaire']); ?>">Liste </a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'carte']); ?>">Carte</a></li>
            </ul>
        </div>
    </div>


</div>
<div class='col-md-10'>

    <div class="panel panel-default">
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


