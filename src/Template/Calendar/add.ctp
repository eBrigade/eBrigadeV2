<div class="row">
    <!--bouton de sauvegarde et status-->
    <div   class="col-md-2 col-sm-12  col-xs-12">
        <button type="button" id="bttosave" class="btn"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> SAUVEGARDER </button><br/>
        <?php if ($availabilities){
        echo "<div id='savedate' > <span > Dernière sauvegarde le : $availabilities->modified   </span ></div>";
    } else {
    echo "<div id='savedate' > <span > Aucune sauvegarde trouvée </span ></div>";
    } ?>
    <div class="row voffset3">
        <div id="selector" class="btn-group-vertical col-md-12 col-sm-12 col-xs-12">
            <button type="button" class="btn active btn-danger">ABSENT</button>
            <button type="button" class="btn btn-danger">ASTREINTE</button>
            <button type="button" class="btn btn-warning">MATIN</button>
            <button type="button" class="btn btn-success">APRES-MIDI</button>
            <button type="button" class="btn btn-info">SOIR</button>
            <button type="button" class="btn btn-primary">NUIT</button>
        </div>
    </div>
</div>

<!--affiche le calendrier-->
    <div id='calendar' class="col-md-10 col-sm-12 voffset3"></div>
</div>


<?= $this->Html->css('fullcalendar.css') ?>
<?= $this->Html->css('themes/black-tie/jquery-ui.css') ?>
<?= $this->Html->script('jquery-ui.js')?>
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
            fixedWeekCount : false,
            aspectRatio: 2,
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
            switch($ev[2]){
            case 'ABSENT':
            echo "
        {
            title: '$ev[2]',
            start: '$ev[0]',
            end: '$ev[1]',
            color: '#d14744'
        },
            ";
            break;
            case 'MATIN':
            echo "
        {
            title: '$ev[2]',
            start: '$ev[0]',
            end: '$ev[1]',
            color: '#efa843'
        },
            ";
            break;
            case 'APRES-MIDI':
            echo "
        {
            title: '$ev[2]',
            start: '$ev[0]',
            end: '$ev[1]',
            color: '#57b257'
        },
            ";
            break;
            case 'SOIR':
            echo "
        {
            title: '$ev[2]',
            start: '$ev[0]',
            end: '$ev[1]',
            color: '#52bcdc'
        },
            ";
            break;
            case 'NUIT':
            echo "
        {
            title: '$ev[2]',
            start: '$ev[0]',
            end: '$ev[1]',
            color: '#3174af'
        },
            ";
            break;
            default:
            echo "
        {
            title: '$ev[2]',
            start: '$ev[0]',
            end: '$ev[1]',
        },
            ";
            break;
        }




        }

        }}
        ?>

        ],
                selectable: true,
                selectHelper: true,
                select: function(start, end, id) {
            var title = $('.active').text();
            var eventData;
            if (title) {
            if (title == 'ABSENT') {
                eventData = {
                    title: title,
                    start: start,
            end: end,
                color: '#d14744',
                id: id
                };
        }
            if (title == 'MATIN') {
            eventData = {
            title: title,
            start: start,
            end: end,
            color: '#efa843',
            id: id
        };
        }
            if (title == 'APRES-MIDI') {
            eventData = {
            title: title,
            start: start,
            end: end,
            color: '#57b257',
            id: id
        };
        }
            if (title == 'SOIR') {
            eventData = {
            title: title,
            start: start,
            end: end,
            color: '#52bcdc',
            id: id
        };
        }
            if (title == 'NUIT') {
            eventData = {
            title: title,
            start: start,
            end: end,
            color: '#3174af',
            id: id
        };
        }

            $('#calendar').fullCalendar('renderEvent', eventData, true);
var date = moment(start).format();
            var dateend = moment(end).format();

            if (myArray.indexOf(date + '|' + dateend + '|' + title) == -1) {
            myArray.push(date + '|' + dateend + '|' + title);
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
        displayEventTime: false,
                eventLimit: true,
        eventClick: function(calEvent, jsEvent, view) {
            $('#calendar').fullCalendar('removeEvents', function (event) {
                return event == calEvent;
            });
                var dateget = moment(calEvent.start).format('YYYY-MM-DDTHH:mm:ss');
            var dategetend = moment(calEvent.end).format('YYYY-MM-DDTHH:mm:ss');
                var titleget = calEvent.title;
          var compare = dateget + 'Z|'+ dategetend + 'Z|'+ titleget;

            var index = myArray.indexOf(compare);
            if (index > -1) {
            myArray.splice(index, 1);
        }
        }
    });
    });

    $( "#bttosave" ).click(function() {
        $.ajax({
            type:'post',
            data: 'title=' + myArray,
            url: '../calendar/save',
            success:function(){
              $('#savedate').load('../calendar/save');
            }
        });
    });

    // sauvegarde automatique
/*    setInterval(function(){
        $("#bttosave").click();
    },300000);*/
</script>


