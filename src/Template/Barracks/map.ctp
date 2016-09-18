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
                <li><a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'filter']); ?>">Liste </a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'filter']); ?>">Carte</a></li>
            </ul>
        </div>
    </div>





</div>
<div class='col-md-10'>

    <div class="panel panel-primary">
        <div class="panel-heading"><?= __('Carte des Casernes') ?>
        </div>
        <div class="panel-body panel-color">


            <?= $this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyD5JoDyuQnaIzvNOAJJQAmAz2IZBedpxzg&sensor=true'); ?>

            <?php
                            $map_options = array(
                                'id' => 'gmap',
            'width' => '60vw',
            'height' => '90vh',
            'style' => '',
            'zoom' => 3,
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
            $marker_options = array(
            'showWindow' => true,
            'windowText' => '',
            'markerTitle' =>'',
            'draggableMarker' => false
            );

            ?>

            <!--<?= $this->GoogleMap->addMarker("gmap", 1, $barracks->city->city.", France", $marker_options); ?>-->


        </div>
    </div>
</div>



