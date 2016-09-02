<div class="row">
    <div id="selector" class="btn-group">
        <button type="button" class="btn active">ABSENT</button>
        <button type="button" class="btn">MATIN</button>
        <button type="button" class="btn">APRES-MIDI</button>
        <button type="button" class="btn">SOIR</button>
        <button type="button" class="btn">NUIT</button>
    </div>
</div>


<button type="button" id="test">test</button>

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

    var myArray = new Array();

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
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
            var title = $('.active').text();;
            var eventData;

            if (title) {
                eventData = {
                    title: title,
                    start: start,
                    end: end
                };

                $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true

                myArray.push(eventData);
            }
            $('#calendar').fullCalendar('unselect');
        },
        editable: true,
                eventLimit: true,

    });

    });

    $( "#test" ).click(function() {
        var id = 3;
        $.post('../calendar/save',{id:id}, function(data){
            console.log(data);
        }, 'json');
    });

</script>


