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

<li id="<?= $alert->id ?>" class="delete"><a href='<?= $this->Url->build(['controller' => 'Messages','action' => 'view', $alert->message->id, strtolower(str_replace(' ', '-', $alert->message->subject)), 'prefix' => 'messagerie'  ]); ?>'><span class='glyphicon glyphicon-envelope'></span> Message privé de <?= $mp->firstname.' '.$mp->lastname ?></a></li>

<?php endforeach ?>
        <?php if($notifCount > 0) : ?>
    </ul>
</li>
<?php endif; ?>

