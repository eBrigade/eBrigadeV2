<?php
if($isConnected) {
    ?>
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?= $auth ?> <span class="caret"></span></a>
<?php
}
else{
   ?>
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Hors-ligne <span class="caret"></span></a>
    <?php
}
?>
<ul class="dropdown-menu" role="menu">
<?php
if($isConnected) {
    ?>
        <li><a href="<?= $this->Url->build(['controller' => 'Users','action' => 'view' ,$myId, 'prefix' => false]); ?>"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
    <li><a href="<?= $this->Url->build(['controller' => 'Calendar','action' => 'add', 'prefix' => 'calendrier' ]); ?>"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
        Mes disponibilités</a></li>

    <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Paramètres</a></li>
        <li class="divider"></li>
        <li><a href="<?= $this->Url->build(['controller' => 'Users','action' => 'logout',
        'prefix' => false]); ?>"><span class="glyphicon glyphicon-off"></span> Deconnexion</a></li>
    <?php
}
else{
    ?>
    <li><a href="<?= $this->Url->build(['controller' => 'Users','action' => 'login', 'prefix' => false]); ?>"><i class="fa fa-plug" aria-hidden="true"></i> Connexion</a></li>
    <li class="divider"></li>
    <li><a href="<?= $this->Url->build(['controller' => 'Users','action' => 'add', 'prefix' => false]); ?>"><span class="glyphicon glyphicon-share"></span> Inscription</a></li>



    <?php
}
?>
</ul>