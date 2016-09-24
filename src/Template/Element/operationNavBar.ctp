<nav class="navbar navbar-info">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Operation : <?= $operation->title ?></a>
        </div>
        <ul class="nav nav-tabs">
            <li role="presentation" <?php if ($viewType == 'gestion') { echo 'class="active"';} ?> ><?= $this->Html->link("Gestion",
                    array('controller' => 'Operations', 'action' => 'gestion', $operation->id)) ?></li>
            <li role="presentation"  <?php if ($viewType == 'carte') { echo 'class="active"';} ?> ><?= $this->Html->link("Carte", array('controller' => 'Operations', 'action' => 'map', $operation->id)) ?></li>
            <li role="presentation"  <?php if ($viewType == 'operationnel') { echo 'class="active"';} ?> ><?= $this->Html->link("Vue d'ensemble",
                    array('controller' => 'Operations', 'action' => 'operationnel', $operation->id)) ?></li>
        </ul>
    </div><!-- /.container-fluid -->
</nav>
