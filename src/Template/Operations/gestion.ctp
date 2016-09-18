
<?= $this->Html->link("Basculer en affichage tactique", array('controller' => 'Operations', 'action' => 'map', $operation->id), array('class' => 'btn btn-info btn-xs')) ?>
<?= $this->Html->link("Basculer en affichage opérationnel", array('controller' => 'Operations', 'action' => 'operationnel', $operation->id), array('class' => 'btn btn-info btn-xs')) ?>
<div class="container">
    <div class="row">
        <h2>Gestion de <?= $operation->title?></h2>
    </div>
    <div class="row">
        <div class="col-xs-6 col-md-6">
            <h3>Eléments disponibles</h3>
            <form id="filter">
                <div class="form-group">
                    <label for="barrack">Caserne</label>
                    <select class="form-control" name="barrack" id="barrack">
                        <option value="all" selected>Toutes les casernes</option>
                        <?php if (!empty($barracklist)): ?>
                            <?php foreach ($barracklist as $barrack): ?>
                                <option value="<?= $barrack->id ?>"><?= $barrack->name ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-default">Valider les choix</button>
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
                                <option value="<?= $event->id ?>">id :<?= $event->id ?> - nom : <?= $event->title ?> - début : <?= $event->event_start_date?> , fin : <?= $event->event_end_date ?></option>
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

    //gets the right select teams
    $('#event').on('change', function (e) {
       var datateam = {
           eventID: this.value
       };
        $('#team').load('/Operations/teamselect/', datateam)

    });

    //select teams and element type action
    $("#elements").submit(function(event) {

        event.preventDefault();
        var datafilter = {
            source: $('select[name=event]').val(),
            containerType: 'Teams',
            contentType: $('select[name=content]').val(),
            containerID: $('select[name=team]').val()
        };
        console.log(datafilter);
        $('#content-list').load('/Operations/loadlist', datafilter);
    });

    //paginator ajax
    $(document).on('click', 'a', function(event) {
        data = $(this).attr('href');
        event.preventDefault();
        datax = data.split('?');
        var datafilter = { barrackID: $('select[name=barrack]').val()};

        console.log(datax[1]);
        $('#filter-list').load('/Operations/userlist' + '?' + datax[1], datafilter );
    });


    //filter action
    $("#filter").submit(function(event) {

        event.preventDefault();
        var datafilter = { barrackID: $('select[name=barrack]').val()};
        $('#filter-list').load('/Operations/userlist/', datafilter);
    });



</script>