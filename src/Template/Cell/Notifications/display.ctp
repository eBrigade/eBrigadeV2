<div class="dropdown">
    <a id="dLabel" role="button" data-toggle="dropdown" data-target="" href="#">
        <i class="glyphicon glyphicon-bell"></i>
        <span class="badge badge-notify bdg-not" id="count"><?= $notifCount ?></span>
    <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">
        <div class="notification-heading"><h4 class="menu-title">Notifications</h4>
        </div>
        <li class="divider"></li>
        <div class="notifications-wrapper">

<?php
 foreach ($check as $alert){
 $text = $alert->message;
 $mp = $alert->message->user;
echo "
            <a class='content' href='/messages/view/$alert->source_id'>

                <div class='notification-item' id='$alert->id'>
                    <h4 class='item-title'>Message privé de $mp->firstname $mp->lastname</h4>
                    <h4 class='item-title'>Sujet :  $text->subject</h4>
                    <p class='item-info delete'> Reçu le $text->created </p> <p class='item-info delete'><a href='#' id='delete'>Supprimer </a> | <a href='/messages/view/$alert->source_id'>Voir </a></p>
                </div>

            </a>
    ";
}
?>

        </div>
    </ul>
</div>



<script>
    var count = <?= $notifCount ?>;
    $( ".delete" ).click(function() {
        count--;
        $( "#count" ).text(count);
        var getid = $(this).parents().find('.notification-item').attr('id');
        $(this).closest('.notification-item').remove();
        $.ajax({
            type:'post',
            data: 'id=' + getid ,
            url: ' <?= $this->Url->build('/messages/deletenotif'); ?>'
        });
    });
</script>