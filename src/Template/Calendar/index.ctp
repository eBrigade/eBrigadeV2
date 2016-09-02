


<div id='calendar'></div>







<?= $this->Html->css('fullcalendar.css') ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<?= $this->Html->script('moment.min.js')?>
<?= $this->Html->script('fullcalendar.js')?>
<?= $this->Html->script('lang-all.js')?>

<script>
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
            editable: true,
            eventLimit: true,
            events: [

            <?php
                    foreach ($event as $ev){
            $inverse = explode("/", $ev->event_start_date);
            $inverse_end = explode("/", $ev->event_end_date);
            $date_start = "$inverse[2]-$inverse[1]-$inverse[0]";
            $date_end = "$inverse[2]-$inverse[1]-$inverse[0]";
            echo "
            {
                title: '$ev->title',
                        url: 'http://google.com/',
                    start: '$date_start',
                    end: '$date_end'
            },
            ";
        }
        ?>

            ]
        });

    });

</script>