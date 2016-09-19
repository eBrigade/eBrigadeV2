

<div id='calendar'></div>

<?= $this->Html->css('fullcalendar.css') ?>
<?= $this->Html->script('jquery-ui.js')?>
<?= $this->Html->script('moment.min.js')?>
<?= $this->Html->script('fullcalendar.js')?>
<?= $this->Html->script('lang-all.js')?>

<?php $date = $now->i18nFormat('yyyy-MM-dd'); ?>


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

            fixedWeekCount : false,
            theme: true,
            defaultDate: <?php echo "'$date'"  ?>,
            lang: initialLangCode,
            editable: false,
            eventLimit: true,
                eventMouseover: function (data, event, view) {
            tooltip = '<div class="tooltiptopicevent" style="width:auto;height:auto;background:#feb811;position:absolute;z-index:10001;padding:10px 10px 10px 10px ;  line-height: 200%;border-radius: 5px;border: 1px solid black;">' +
                    '' + data.title + '</br>' +  data.address + '</br>' +  data.instructions+ '</br>' +  data.details + '</div>';
            $("body").append(tooltip);
            $(this).mouseover(function (e) {
                $(this).css('z-index', 10000);
                $('.tooltiptopicevent').fadeIn('500');
                $('.tooltiptopicevent').fadeTo('10', 1.9);
            }).mousemove(function (e) {
                $('.tooltiptopicevent').css('top', e.pageY + 10);
                $('.tooltiptopicevent').css('left', e.pageX + 20);
            });
        },

        eventMouseout: function (data, event, view) {
            $(this).css('z-index', 8);
            $('.tooltiptopicevent').remove();
        },

        dayClick: function () {
            tooltip.hide()
        },

        eventResizeStart: function () {
            tooltip.hide()
        },

        eventDragStart: function () {
            tooltip.hide()
        },

        viewDisplay: function () {
            tooltip.hide()
        },
            events: [
            <?php foreach ($event as $ev): ?>

        <?php
                $eve = explode(" ", $ev->event_start_date);
        $date = $eve[0];
        $inv_date = explode("/", $date);
        $ev_start = "$inv_date[2]-$inv_date[1]-$inv_date[0]";

        $evef = explode(" ", $ev->event_end_date);
        $datef = $evef[0];
        $inv_datef = explode("/", $datef);
        $ev_startf = "$inv_datef[2]-$inv_datef[1]-$inv_datef[0]";
        $t = "T";
        $z = "Z";
        $date_start = "$ev_start$t$eve[1]$z";
        $date_end = "$ev_startf$t$evef[1]$z";
        ?>
            {
                title: "<?= $ev->title ?>",
                        url: "/events/view/<?= $ev->id  ?>",
                    start: "<?= $date_start  ?>",
                    end: "<?= $date_end  ?>",
                    color: "#257e4a",
                address : "<?= $ev->address  ?>",
                    instructions : "<?= $ev->instructions  ?>",
                    details : "<?= $ev->details  ?>"
            },
        <?php endforeach;  ?>
            ]
        });
    });

</script>