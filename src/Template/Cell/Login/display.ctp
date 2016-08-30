<?php
if($this->request->session()->read('Auth.User.id') !== null) {
    ?>
    <nav class="navbar nav-tabs-justified">
        <li><?= $this->Html->link(__('Se déconnecter'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
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