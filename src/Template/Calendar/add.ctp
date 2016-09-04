<div class="row">
    <div id="selector" class="btn-group col-md-8">
        <button type="button" class="btn active">ABSENT</button>
        <button type="button" class="btn">MATIN</button>
        <button type="button" class="btn">APRES-MIDI</button>
        <button type="button" class="btn">SOIR</button>
        <button type="button" class="btn">NUIT</button>
    </div>
    <div   class="col-md-4">
    <button type="button" id="test" class="btn">SAUVEGARDER </button><br/>

        <?php if ($availabilities){
        echo "Dernière sauvegarde le : $availabilities->modified ";
        }
        ?>

    </div>
</div>



<br/>
<div class="row">
<div id='calendar'></div>
</div>

<?= $this->Html->css('fullcalendar.css') ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<?= $this->Html->script('moment.min.js')?>
<?= $this->Html->script('fullcalendar.js')?>
<?= $this->Html->script('lang-all.js')?>


<script>
    $('#selector button').click(function() {
        $(this).addClass('active').siblings().removeClass('active');
    });

    var myArray =[
    <?php if ($availabilities) {
        $results = explode(",", $availabilities->result);
        foreach ($results as $result){
            echo '"' ;
            echo $result ;
            echo '",' ;
        }
    }
  else{
        echo "";
    }
    ?>
    ];

    $(document).ready(function() {

        var initialLangCode = 'fr';
        $('#calendar').fullCalendar({
            theme: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: <?php echo "'$now->year-$now->month-$now->day'"  ?>,
        lang: initialLangCode,
        events: [

<?php if ($availabilities){

        $results = explode(",", $availabilities->result);
        foreach ($results as $result){
            $ev = explode("|", $result);
if (count($ev, COUNT_RECURSIVE) > 1){
            echo "
        {
            title: '$ev[1]',
            start: '$ev[0]',
        },
            ";
        }}}
        ?>

        ],
                selectable: true,
                selectHelper: true,
                select: function(start, end, id) {
            var title = $('.active').text();
            var eventData;
            if (title) {
                eventData = {
                    title: title,
                    start: start,
                id: id
                };
                $('#calendar').fullCalendar('renderEvent', eventData, true);
var date = moment(start).format();
            var shortdatestart = date.slice(0,10);

            if (myArray.indexOf(shortdatestart + '|' + title) == -1) {
            myArray.push(shortdatestart + '|' + title);
            console.log(myArray);
        }
            else {
            $('#calendar').fullCalendar('removeEvents', function(event) {
            return event.id == id;
        });
            console.log("doublon");
        }

            }
            $('#calendar').fullCalendar('unselect');
        },
        editable: false,
                eventLimit: true,

        eventClick: function(calEvent, jsEvent, view) {
            $('#calendar').fullCalendar('removeEvents', function (event) {
                return event == calEvent;
            });
                var dateget = moment(calEvent.start).format('YYYY-MM-DD');
                var titleget = calEvent.title;
          var compare = dateget +'|'+ titleget;
            var index = myArray.indexOf(compare);
            if (index > -1) {
            myArray.splice(index, 1);
        }
                console.log(myArray);

        }

    });
    });

    $( "#test" ).click(function() {
        console.log( myArray);
        $.ajax({
            type:'post',
            data: 'title=' + myArray,
            url: '../calendar/save',
        });
    });

</script>


