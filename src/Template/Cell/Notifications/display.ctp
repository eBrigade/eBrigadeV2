<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="badge"><?= $notifCount ?></span><span class="glyphicon glyphicon-bell"></span></span></a>

    <?php if($notifCount > 0) : ?>
    <ul class="dropdown-menu" role="menu">
        <?php endif;?>

<?php
 foreach ($check as $alert) : ?>
        <?php $text = $alert->message;
 $mp = $alert->message->user;
        ?>

<li id="<?= $alert->id ?>" class="delete"><a href='<?= $this->Url->build(['controller' => 'Messages','action' => 'send' ]); ?>'><span class='glyphicon glyphicon-envelope'></span> Message privé de <?= $mp->firstname.' '.$mp->lastname ?></a></li>

<?php endforeach ?>
        <?php if($notifCount > 0) : ?>
    </ul>
</li>
<?php endif; ?>


<script>
    $( ".delete" ).click(function() {
        var getid = $(this).attr('id');
        $.ajax({
            type:'post',
            data: 'id=' + getid ,
            url: ' <?= $this->Url->build('/messages/deletenotif'); ?>'
        });
    });
</script>


