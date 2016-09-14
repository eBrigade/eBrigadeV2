<?= $this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyD5JoDyuQnaIzvNOAJJQAmAz2IZBedpxzg&sensor=true'); ?>

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
                            'markerTitle' => 'Title',
                            'draggableMarker' => true
                        );

                        ?>


                        <?= $this->GoogleMap->addMarker("map_canvas", 1, array('latitude' => $event->latitude, 'longitude' => $event->longitude), $marker_options); ?>
                        <input type="text" id="latitude_1"/>
                        <input type="text" id="longitude_1"/>

                    </div>

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
                            <li class="list-group-item" onclick="clickAction(<?= $event->id ?>, <?= $event->id?>, <?= $teams->id ?>, 'add', 'Events', 'Teams')"><?= $teams->name ?> </li>
                        <?php endforeach; ?>

                    </ul>
                    <p id="teamNumber"></p>
                    Détails de la mission
                </li>
                <li class="teamlist" id="<?= $event->id ?>"></li>

            </ul>
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Bilan de la mission</li>
                <li class="list-group-item">Un beau formulaire chiffres et textarea</li>
            </ul>
        </div>
    </div>
</div>
<div id="log"></div>

<!--<script>
    $('#teamNumber').html("Nombre d'équipes : " + <?/*= $teamNumber */?>);
</script>-->


<script>
    
    function loadteams() {
        var teamlist = $('.teamlist');
        var data = parseInt(teamlist.attr('id'));
        var datajax = {eventID: data};

        teamlist.load('/Opera/loadteams/', datajax, function () {
            loadlist()
        });
    }
    loadteams();
    
    //loads every list
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

            $(this).load('/Opera/loadlist/', datajax);
        });

    }
    loadlist()


    //refreshes changed list
    function refreshlist(source, containerID, containerType, contentType) {
        var datalist = {
            source: source,
            containerID: containerID,
            containerType: containerType,
            contentType: contentType
        };
        var id = source + '-' + containerID + '-' + containerType + '-' + contentType;
        $('#'+id+'').load('/Opera/loadlist/', datalist);

    }


    //ajax query to add and remove content.
    //todo : add filters to 'add lists'
    function clickAction(source, containerID, contentID, action, containerType, contentType) {

        //populates data var for ajax
        var datax = {
            source: source,
            containerID: containerID,
            contentID: contentID,
            action: action,
            containerType: containerType,
            contentType: contentType
        };

        //ajax
        var request = $.ajax({
            type: 'POST',
            data: datax,
            url: '<?= $this->Url->build(["controller" => "Opera", "action" => "ajoints"]); ?>'
        });
        //reload list at callback
        request.done(function () {
            if (contentType == "Teams") {
                loadteams();
            } else {
                refreshlist(source, containerID, containerType, contentType);
            }
        });

        //for debug purpose
        /*request.done(function( msg ) {
         $( "#log" ).html( msg );
         });

         request.fail(function( jqXHR, textStatus ) {
         alert( "Request failed: " + textStatus );
         });*/
    }
</script>
