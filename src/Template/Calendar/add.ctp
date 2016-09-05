<div class="row">

  <!--liste des différentes options pouvant être insérées dans le calendrier-->
    <div id="selector" class="btn-group col-md-7 col-md-offset-1">
        <button type="button" class="btn active btn-danger">ABSENT</button>
        <button type="button" class="btn btn-warning">MATIN</button>
        <button type="button" class="btn btn-success">APRES-MIDI</button>
        <button type="button" class="btn btn-info">SOIR</button>
        <button type="button" class="btn btn-primary">NUIT</button>
    </div>

    <!--bouton de sauvegarde et status-->
    <div   class="col-md-3">
    <button type="button" id="bttosave" class="btn">SAUVEGARDER </button><br/>
        <?php if ($availabilities){
        echo "<div id='savedate' > <span > Dernière sauvegarde le : $availabilities->modified   </span ></div>";
        } else {
    echo "<div id='savedate' > <span > Aucune sauvegarde trouvée </span ></div>";
    } ?>
    </div>
</div><br/>

<!--affiche le calendrier-->
<div class="row">
<div id='calendar' class="col-md-10 col-md-offset-1"></div>
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




            switch($ev[1]){
            case 'ABSENT':
            echo "
        {
            title: '$ev[1]',
            start: '$ev[0]',
            color: '#d14744'
        },
            ";
            break;
            case 'MATIN':
            echo "
        {
            title: '$ev[1]',
            start: '$ev[0]',
            color: '#efa843'
        },
            ";
            break;
            case 'APRES-MIDI':
            echo "
        {
            title: '$ev[1]',
            start: '$ev[0]',
            color: '#57b257'
        },
            ";
            break;
            case 'SOIR':
            echo "
        {
            title: '$ev[1]',
            start: '$ev[0]',
            color: '#52bcdc'
        },
            ";
            break;
            case 'NUIT':
            echo "
        {
            title: '$ev[1]',
            start: '$ev[0]',
            color: '#3174af'
        },
            ";
            break;
            default:
            echo "
        {
            title: '$ev[1]',
            start: '$ev[0]',
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
                color: '#d14744',
                id: id
                };
        }
            if (title == 'MATIN') {
            eventData = {
            title: title,
            start: start,
            color: '#efa843',
            id: id
        };
        }
            if (title == 'APRES-MIDI') {
            eventData = {
            title: title,
            start: start,
            color: '#57b257',
            id: id
        };
        }
            if (title == 'SOIR') {
            eventData = {
            title: title,
            start: start,
            color: '#52bcdc',
            id: id
        };
        }
            if (title == 'NUIT') {
            eventData = {
            title: title,
            start: start,
            color: '#3174af',
            id: id
        };
        }

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

    $( "#bttosave" ).click(function() {
        console.log( myArray);
        $.ajax({
            type:'post',
            data: 'title=' + myArray,
            url: '../calendar/save',
            success:function(){
              $('#savedate').load('../calendar/save');
            }
        });
    });


    setInterval(function(){
        $("#bttosave").click();
    },300000);
</script>


