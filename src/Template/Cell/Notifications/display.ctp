<div class="dropdown">
    <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
        <i class="glyphicon glyphicon-bell"></i>
        <span class="badge badge-notify bdg-not"><?= $notifCount ?></span>
    <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">
        <div class="notification-heading"><h4 class="menu-title">Notifications</h4><h4 class="menu-title pull-right">Voir tous<i class="glyphicon glyphicon-circle-arrow-right"></i></h4>
        </div>
        <li class="divider"></li>
        <div class="notifications-wrapper">


<?php
 foreach ($check as $alert){
echo "
            <a class='content' href='/messages/view/$alert->source_id'>

                <div class='notification-item' id='notif-$alert->id'>
                    <h4 class='item-title'>$alert->content</h4>
                    <p class='item-info'><a href='#' id='delete'>Supprimer </a> | <a href='/messages/view/$alert->source_id'>Voir </a></p>
                </div>

            </a>
    ";
}
?>



        </div>
        <li class="divider"></li>
        <div class="notification-footer"><h4 class="menu-title">Voir tous<i class="glyphicon glyphicon-circle-arrow-right"></i></h4></div>
    </ul>
</div>

<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script type='text/javascript' src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script>
    $( "#delete" ).click(function() {
       $("#notif-<?= $alert->id ?>").remove();
        $.ajax({
            type:'post',
            data: 'id=<?= $alert->id ?>',
            url: '../deletenotif'
        });
    });
</script>