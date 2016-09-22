<ul class="navbar navbar-nav navbar-right list-unstyled">
<?php
if($isConnected) {
    ?>
        <li class="navbar-btn btn"><?= $this->Html->link($this->Html->icon('user').' '.__('Mon profil'), ['controller' => 'Users', 'action' => 'view',$myId],['escape' => false]) ?></li>
        <li class="navbar-btn btn"><?= $this->Html->link($this->Html->icon('log-out').' '.__('Se déconnecter'), ['controller' => 'Users', 'action' => 'logout'],['escape' => false]) ?></li>

    <?php
}
else{
    ?>

        <li class="navbar-btn btn"><?= $this->Html->link($this->Html->icon('log-in').' '.__('Se connecter'), ['controller' => 'Users', 'action' => 'login'],['escape' => false]) ?></li>

    <?php
}
?>
</ul>