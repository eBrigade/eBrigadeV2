
<div class="event-modal-base">
    <div class="event-modal-cont"></div>
</div>
<div class="team-modal-base">
    <div class="team-modal-cont"></div>
</div>


<?= $this->element('operationNavBar', [$operation, 'viewType' => 'gestion'])?>

<div class="row">
    <div class='col-md-3'>
        <div class="sidebar-nav">
            <div class="navbar linkout" role="navigation">

                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="javascript:;"> GESTION DES
                        </a></li>
                    <li><a href="#" class="content-type" id="content-Users"><i class="fa fa-user fa-lg "
                                                                               aria-hidden="true"></i> Equipiers</a>
                    </li>
                    <li><a href="#" class="content-type" id="content-Materials"><i class="fa fa-wrench fa-lg "
                                                                                   aria-hidden="true"></i>
                            Matériel</a></li>
                    <li><a href="#" class="content-type" id="content-Vehicles"><i class="fa fa-plane fa-lg "
                                                                                  aria-hidden="true"></i>
                            Véhicules</a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar-nav">
            <div class="navbar linkout" role="navigation">

                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="javascript:;"> CHOIX DE L'EQUIPE
                        </a>
                    </li>
                    <div class="voffset3"></div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map" aria-hidden="true"></i></span>
                            <select class="form-control" name="event" id="event">
                                <option value="" disabled selected>Evénement</option>
                                <?php if (!empty($operation->events)): ?>
                                    <?php foreach ($operation->events as $event): ?>
                                        <option value="<?= $event->id ?>">id :<?= $event->id ?> - nom
                                            : <?= $event->title ?>
                                            -
                                            début : <?= $event->event_start_date ?> , fin
                                            : <?= $event->event_end_date ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <?= $this->Html->link($this->Html->icon('plus'), ['action' => 'addevent', $operation->id], ['id' => 'add-event', 'class'=>'btn btn-success','escape'=>false]) ?>
                            <?= $this->Html->link($this->Html->icon('pencil'), ['action' => 'edit', $operation->id], ['class'=>'btn btn-info','escape'=>false]) ?>
                            <?= $this->Form->postLink($this->Html->icon('trash'), ['action' => 'delete', $operation->id], ['class'=>'btn btn-danger','escape'=>false],
                                ['confirm' => __('Are you sure you want to delete # {0}?', $operation->id)]) ?>
                        </div>
                    </div>
                    <br> <br>

                    <form>
                        <div class="form-group" id="team">
                        </div>
                    </form>

            </div>
            </ul>
        </div>
        <div class="sidebar-nav">
            <div class="navbar linkout" role="navigation">

                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="javascript:;"> Filtrer les éléments disponibles
                        </a>
                    </li>
                    <div class="voffset3"></div>
                    <div class="col-md-12">


                        <div class="form-group" id="filter">

                        </div>

                    </div>
                </ul>
            </div>

        </div>
    </div>
        <div class="col-md-9">

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


    //event add modal
    $(document).on('click', '#add-event', function (event) {
        event.preventDefault();

        var url = '<?= $this->Url->build(['controller' => 'Operations', 'action' => 'addevent', $operation->id]); ?>';

        $('.event-modal-cont').load(url, function (result) {
            $('#eventModal').modal({show: true});
        });
    });

    //team add modal
    $(document).on('click', '#add-team', function (event) {
        event.preventDefault();
        var eventID = $('select[name=event]').val();

        var url = "/Operations/addteam/" + eventID;
        $('.event-modal-cont').load(url, function (result) {
            $('#teamModal').modal({show: true});
        });
    });


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
            url: '<?= $this->Url->build(["controller" => "Operations", "action" => "joints"]); ?>'
        });
        //todo: double check actions if success or not in db to validate or not changes
        request.done(function () {
            refreshlist();
        });
    });

</script>