<?= $this->Html->link("Basculer en affichage tactique", array('controller' => 'Operations', 'action' => 'map', $operation->id), array('class' => 'btn btn-info btn-xs')) ?>
<?= $this->Html->link("Basculer en affichage opérationnel", array('controller' => 'Operations', 'action' => 'operationnel', $operation->id), array('class' => 'btn btn-info btn-xs')) ?>

<form>
    <label for="content">Type d'éléments à gérer</label>
    <select class="form-control" name="content-type" id="content-type">
        <option value="" disabled selected>Choisir dans la liste</option>
        <option value="Users">Equipiers</option>
        <option value="Materials">Materials</option>
        <option value="Vehicles">Véhicules</option>
    </select>
</form>
<div class="container">
    <div class="row">
        <h2>Gestion de <?= $operation->title ?></h2>
    </div>
    <div class="row">
        <div class="col-xs-6 col-md-6">
            <h3>Eléments disponibles</h3>
            <form id="filter">


            </form>
            <div id="filter-list">
            </div>
        </div>
        <div class="col-xs-6 col-md-6">
            <h3>Eléments déployés</h3>
            <form id="elements">
                <div class="form-group">
                    <label for="event">Evénement</label>
                    <select class="form-control" name="event" id="event">
                        <option value="" disabled selected>sélection de l'événement</option>
                        <?php if (!empty($operation->events)): ?>
                            <?php foreach ($operation->events as $event): ?>
                                <option value="<?= $event->id ?>">id :<?= $event->id ?> - nom : <?= $event->title ?> -
                                    début : <?= $event->event_start_date ?> , fin
                                    : <?= $event->event_end_date ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group" id="team">
                </div>
                <button type="submit" class="btn btn-default">Valider les choix</button>
            </form>
            <ul id="content-list">
            </ul>
        </div>
    </div>
</div>


<script>

    //sets filter on contentType choice
    $('#content-type').on('change', function (e) {
        var datafilter = {
            contentType: this.value
        };
        var filter = $('#filter');
        filter.empty();
        $('#filter-list').empty();
        filter.load('/Operations/filtertype/', datafilter)
        var datacont = {
            source: $('select[name=event]').val(),
            containerType: 'Teams',
            contentType: $('select[name=content-type]').val(),
            containerID: $('select[name=team]').val()
        };
        $('#content-list').load('/Operations/loadlist', datacont);


    });


    //gets the right select teams
    $('#event').on('change', function (e) {
        var datateam = {
            eventID: this.value
        };
        $('#team').load('/Operations/teamselect/', datateam)

    });

    //select teams and element type action
    $("#elements").submit(function (event) {
        event.preventDefault();
        if ($('select[name=content-type]').val() == null) {
            alert('veuillez sélectionner un type d\'élément à gérer');
        } else {
            var datafilter = {
                source: $('select[name=event]').val(),
                containerType: 'Teams',
                contentType: $('select[name=content-type]').val(),
                containerID: $('select[name=team]').val()
            };
            $('#content-list').load('/Operations/loadlist', datafilter);
        }

    });

    //paginator ajax
    $(document).on('click', '#paginator>th>a', function (event) {
        data = $(this).attr('href');
        event.preventDefault();
        datax = data.split('?');
        var datafilter = {barrackID: $('select[name=barrack]').val()};

        console.log(datax[1]);
        $('#filter-list').load('/Operations/filterlist' + '?' + datax[1], datafilter);
    });


    //filter action
    $("#filter").submit(function (event) {

        event.preventDefault();
        var datafilter = {
            barrackID: $('select[name=barrack]').val(),
            contentType: $('select[name=content-type').val(),
            containerID: $('select[name=team]').val()
        };

        $('#filter-list').load('/Operations/filterlist/', datafilter);
    });


    //event on button
    $(document).on('click', '.action-btn', function (event) {
        event.preventDefault();
        //item is clicked object
        var item = $(this);

        //gets data from clicked element's id
        var data = item.attr('id').split('-');

        //Object constructor for ajax request and also used for list updates
        var datajax = {
            source: $('select[name=event]').val(),
            containerType: 'Teams',
            contentType: $('select[name=content-type]').val(),
            containerID: $('select[name=team]').val(),
            contentID: data[1],
            action: data[0]
        };

        //may be useful in this case somehow
        /* //updates lists when item is removed
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

         }*/

        //ajax
        var request = $.ajax({
            type: 'POST',
            data: datajax,
            url: '<?= $this->Url->build(["controller" => "Operations", "action" => "ajoints"]); ?>'
        });
        //todo: double check actions if success or not in db to validate or not changes
        request.done(function () {

            refreshlist(datajax.source, datajax.containerID, datajax.containerType, datajax.contentType);


            /*else {
             refreshlist(source, containerID, containerType, contentType);
             }*/
        });
    });
    //refreshes changed list
    function refreshlist(source, containerID, containerType, contentType) {
        var datalist = {
            source: source,
            containerID: containerID,
            containerType: containerType,
            contentType: contentType
        };
        var id = source + '-' + containerID + '-' + containerType + '-' + contentType;
        $('#content-list').load('/Operations/loadlist/', datalist);
        var datafilter = {
            barrackID: $('select[name=barrack]').val(),
            contentType: $('select[name=content-type').val(),
            containerID: $('select[name=team]').val()
        };

        $('#filter-list').load('/Operations/filterlist/', datafilter);

    }


</script>