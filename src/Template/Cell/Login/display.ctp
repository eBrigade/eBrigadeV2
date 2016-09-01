<?php
if($isConnected) {
    ?>
    <nav class="navbar nav-tabs-justified">
        <li><?= $this->Html->link(__('Se déconnecter'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
        <li><?= $this->Html->link(__('Mon profil'), ['controller' => 'Users', 'action' => 'view',$myId]) ?></li>
    </nav>
    <?php
}
else{
    ?>
    <nav class="navbar nav-tabs-justified">
        <li><?= $this->Html->link(__('Se connecter'), ['controller' => 'Users', 'action' => 'login']) ?></li>
    </nav>
    <?php
}
?>