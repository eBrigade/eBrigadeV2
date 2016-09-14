<?= $this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyD5JoDyuQnaIzvNOAJJQAmAz2IZBedpxzg&sensor=true'); ?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Operation'), ['action' => 'edit', $operation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Operation'), ['action' => 'delete', $operation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operation->id)]) ?> </li>
    </ul>
</nav>

<div class="container-fluid clearfix">
    <div class="row">
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0"
                 aria-valuemax="100" style="width: 40%">
                <span class="sr-only">40% Complete (success)</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-md-4">
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
                <li class="list-group-item list-group-item-info">Informations générales sur la mission de secours</li>
                <li class="list-group-item">
                    <?= $operation->title?>
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
        <div class="col-xs-12 col-sm-6 col-md-8">
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">
                    <button type="submit" class="btn btn-info btn-sm">Ajouter une équipe</button>
                    Détails de la mission
                </li>

                </li>
                <li class="list-group-item">

                    <div class="btn-group">

                        <button type="button" class="btn btn-info btn-xs">Modifier cette équipe</button>
                        <button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
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
                        <p><b>Nom de l'équipe : </b>Equipe ALPHA 001</p>
                        <p><b>Horaires : </b>de 8h à 12h</p>
                        <p><b>Lieu de rendez-vous : </b>Caserne de Raon-aux-Bois</p>
                        <p><b>Positionnement : </b>début de la course</p>
                        <p><b>Mission principale : </b>Public et Acteurs</p>
                        <p><b>Consignes : </b>Le Lorem Ipsum est simplement du faux texte employé dans la composition et
                            la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie
                            depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte
                            pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq
                            siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en
                            soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset
                            contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des
                            applications de mise en page de texte, comme Aldus PageMaker.</p>
                    </div>
                    <div class="row-fluid clearfix">

                        <ul class="list-group col-xs-6 col-sm-6 col-md-6">
                            <li class="list-group-item list-group-item-info">
                                <button type="button" class="btn btn-info btn-xs">Inscrire du personnel</button>
                                <span class="badge badge-danger">3/4</span>
                            </li>
                            <li class="list-group-item">Champ d'ajout et bouton</li>
                            <li class="list-group-item">Jean-Christophe</li>
                            <li class="list-group-item">Nicolas</li>
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
                <li class="list-group-item">

                    <div class="btn-group">

                        <button type="button" class="btn btn-info btn-xs">Modifier cette équipe</button>
                        <button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
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
                        <p><b>Nom de l'équipe : </b>Equipe ALPHA 001</p>
                        <p><b>Horaires : </b>de 8h à 12h</p>
                        <p><b>Lieu de rendez-vous : </b>Caserne de Raon-aux-Bois</p>
                        <p><b>Positionnement : </b>début de la course</p>
                        <p><b>Mission principale : </b>Public et Acteurs</p>
                        <p><b>Consignes : </b>Le Lorem Ipsum est simplement du faux texte employé dans la composition et
                            la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie
                            depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte
                            pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq
                            siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en
                            soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset
                            contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des
                            applications de mise en page de texte, comme Aldus PageMaker.</p>
                    </div>
                    <div class="row-fluid clearfix">

                        <ul class="list-group col-xs-6 col-sm-6 col-md-6">
                            <li class="list-group-item list-group-item-info">
                                <button type="button" class="btn btn-info btn-xs">Inscrire du personnel</button>
                                <span class="badge badge-danger">3/4</span>
                            </li>
                            <li class="list-group-item">Champ d'ajout et bouton</li>
                            <li class="list-group-item">Jean-Christophe</li>
                            <li class="list-group-item">Nicolas</li>
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
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Bilan de la mission</li>
                <li class="list-group-item">Un beau formulaire chiffres et textarea</li>
            </ul>
        </div>
    </div>
</div>