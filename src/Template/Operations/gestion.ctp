<?= $this->Html->link("Basculer en affichage tactique", array('controller' => 'Operations', 'action' => 'map', $operation->id), array('class' => 'btn btn-info btn-xs')) ?>
<?= $this->Html->link("Basculer en affichage opérationnel", array('controller' => 'Operations', 'action' => 'operationnel', $operation->id), array('class' => 'btn btn-info btn-xs')) ?>
<div class="event-modal-base">
    <div class="event-modal-cont"></div>
</div>
<div class="team-modal-base">
    <div class="team-modal-cont"></div>
</div>


<div class="container">
    <div class="row">

        <h4>Gestion de : <?= $operation->title ?></h4>

        <div class="btn-group btn-group-justified">
            <a href="#" id="content-Users" class="content-type btn btn-primary">Equipiers</a>
            <a href="#" id="content-Materials" class="content-type btn btn-primary">Matériel</a>
            <a href="#" id="content-Vehicles" class="content-type btn btn-primary">Véhicules</a>
        </div>
    </div>
</div>

<div class="container">

    <div class="row">
        <div class="col-xs-6 col-md-6">
            <h4>Eléments disponibles</h4>
            <form id="filter">

            </form>
        </div>
        <div class="col-xs-6 col-md-6">
            <h4>Eléments déployés</h4>
            <form>
                <div class="form-group">
                    <label for="event">Evénement</label>
                    <select class="form-control" name="event" id="event">
                        <option value="" disabled selected>sélection de l'événement</option>
                        <?php if (!empty($operation->events)): ?>
                            <?php foreach ($operation->events as $event): ?>
                                <option value="<?= $event->id ?>">id :<?= $event->id ?> - nom : <?= $event->title ?>
                                    -
                                    début : <?= $event->event_start_date ?> , fin
                                    : <?= $event->event_end_date ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <button  id="add-event" class="btn btn-info btn-sm">Nouvel Evénement</button>

            </form>
        </div>
        <form>
            <div class="form-group" id="team">
            </div>
        </form>


    </div>
</div>
<div class="row">
    <div class="col-xs-6 col-md-6">
        <div id="filter-list">
        </div>
    </div>
    <div class="col-xs-6 col-md-6">
        <div id="content-list">
        </div>
    </div>
</div>
</div>


<script>

    //team add modal
    $(document).on('click', '#add-team', function (event) {
        event.preventDefault();
        var url = '<?= $this->Url->build(['controller' => 'Operations', 'action' => 'addteam']); ?>';
        $('.event-modal-cont').load(url, function (result) {
            $('#teamModal').modal({show: true});
        });
    });

    //event add modal
    $('#add-event').on('click', function (event) {
        event.preventDefault();
        var url = '<?= $this->Url->build(['controller' => 'Operations', 'action' => 'addevent', $operation->id]); ?>';
        $('.event-modal-cont').load(url, function (result) {
            $('#eventModal').modal({show: true});
        });
    });


    //gets content type
    function contentType() {
        var contentType = $('.content-active').attr('id').split('-');
        contentType = contentType[1];
        return contentType;
    }

    //gets data context
    function dataContext() {
        var data = {
            barrackID: $('select[name=barrack]').val(),
            contentType: contentType(),
            containerID: $('select[name=team]').val(),
            source: $('select[name=event]').val()
        };
        return data;
    }

    //refreshes changed list
    function refreshlist() {
        $('#content-list').load('/Operations/loadlist/', dataContext());
        $('#filter-list').load('/Operations/filterlist/', dataContext());
    }

    //sets filter on contentType choice
    $('.content-type').on('click', function (e) {
        e.preventDefault();

        $('.content-type').removeClass('content-active');
        $(this).addClass('content-active');

        var datafilter = {
            contentType: contentType()
        };
        var filter = $('#filter');
        filter.load('/Operations/filtertype/', datafilter);
        refreshlist()
    });


    //gets the right select teams
    $('#event').on('change', function (e) {
        var datateam = {
            eventID: this.value
        };
        $('#team').load('/Operations/teamselect/', datateam)
    });

    //select teams and element type action
    $(document).on('change', '#team', function (event) {
        event.preventDefault();
        if (contentType() == null) {
            alert('veuillez sélectionner un type d\'élément à gérer');
        } else {
            refreshlist()
        }
    });

    //paginator ajax
    //todo: fixit
    $(document).on('click', '#paginator>th>a', function (event) {
        data = $(this).attr('href');
        event.preventDefault();
        datax = data.split('?');

        console.log(datax[1]);
        $('#filter-list').load('/Operations/filterlist' + '?' + datax[1], dataContext());
    });


    //filter action
    $("#filter").submit(function (event) {
        event.preventDefault();
        $('#filter-list').load('/Operations/filterlist/', dataContext());
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
            contentType: contentType(),
            containerID: $('select[name=team]').val(),
            contentID: data[1],
            action: data[0]
        };

        //ajax
        var request = $.ajax({
            type: 'POST',
            data: datajax,
            url: '<?= $this->Url->build(["controller" => "Operations", "action" => "ajoints"]); ?>'
        });
        //todo: double check actions if success or not in db to validate or not changes
        request.done(function () {
            refreshlist();
        });
    });

</script>