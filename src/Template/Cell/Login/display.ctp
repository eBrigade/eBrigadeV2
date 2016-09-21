<ul class="dropdown list-unstyled">
<?php
if($isConnected) {
    ?>

        <li><?= $this->Html->link($this->Html->icon('log-out').' '.__('Se déconnecter'), ['controller' => 'Users', 'action' => 'logout'],['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->icon('user').' '.__('Mon profil'), ['controller' => 'Users', 'action' => 'view',$myId],['escape' => false]) ?></li>

    <?php
}
else{
    ?>

        <li><?= $this->Html->link($this->Html->icon('log-in').' '.__('Se connecter'), ['controller' => 'Users', 'action' => 'login'],['escape' => false]) ?></li>

    <?php
}
?>
</ul>