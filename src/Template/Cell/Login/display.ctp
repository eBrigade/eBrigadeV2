<div class="dropdown">
<?php
if($isConnected) {
    ?>

        <li><?= $this->Html->link(__('Se déconnecter'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
        <li><?= $this->Html->link(__('Mon profil'), ['controller' => 'Users', 'action' => 'view',$myId]) ?></li>

    <?php
}
else{
    ?>

        <li><?= $this->Html->link(__('Se connecter'), ['controller' => 'Users', 'action' => 'login']) ?></li>

    <?php
}
?>
</div>