<li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Users <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><?= $this->Html->link('Users', ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('add users', ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</li>
<li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Events <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><?= $this->Html->link(__('List Event'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bills'), ['controller' => 'Bills', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bill'), ['controller' => 'Bills', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Equipments'), ['controller' => 'EventsEquipments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Equipment'), ['controller' => 'EventsEquipments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Teams'), ['controller' => 'EventsTeams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Team'), ['controller' => 'EventsTeams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Vehicles'), ['controller' => 'EventsVehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Vehicle'), ['controller' => 'EventsVehicles', 'action' => 'add']) ?></li>
    </ul>
</li>


<li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Operation <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><?= $this->Html->link('Operations', ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('add Operations', ['controller' => 'Operations', 'action' => 'add']) ?></li>
    </ul>
</li>
<li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Formation <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><?= $this->Html->link('Formation', ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('add Formation', ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</li>
<li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Materials <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><?= $this->Html->link('Materials', ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('add Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('MaterialTypes'), ['controller' => 'MaterialTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('add type'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('MaterialStocks'), ['controller' => 'MaterialStocks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('add stock'), ['controller' => 'MaterialStocks', 'action' => 'add']) ?></li>
    </ul>
</li>
<li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Casernes <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><?= $this->Html->link('Voir les casernes', ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Créér une caserne'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Gestion de la caserne'), ['controller' => 'Barracks', 'action' => 'gestion' , 19]) ?></li>
    </ul>
</li>
<li><?= $this->Html->link('Calendrier', ['controller' => 'Calendar', 'action' => 'index']) ?></li>
<li><?= $this->Html->link('Disponibilité', ['controller' => 'Calendar', 'action' => 'add']) ?></li>
<li><?= $this->Html->link('Messagerie', ['controller' => 'Messages', 'action' => 'index']) ?></li>