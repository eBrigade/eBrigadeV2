<li><?= $this->Html->link('Users', ['controller' => 'Users', 'action' => 'index'])?></li>
<li><?= $this->Html->link('Events', ['controller' => 'Events', 'action' => 'index'])?></li>
<li><?= $this->Html->link('Messages', ['controller' => 'Messages', 'action' => 'index'])?></li>
<li><?= $this->Html->link('Operations', ['controller' => 'Operations', 'action' => 'index'])?></li>

<li><a  class="dropdown-toggle" data-toggle="dropdown" href="#">Formation <span class="caret"></span></a>
<ul class="dropdown-menu">
    <li><?= $this->Html->link('Formation', ['controller' => 'Formations', 'action' => 'index'])?></li>
    <li><?= $this->Html->link('Formation add', ['controller' => 'Formations', 'action' => 'add'])?></li>
    </ul>
</li>

<li><?= $this->Html->link('Materials', ['controller' => 'Materials', 'action' => 'index'])?></li>
<li><?= $this->Html->link('Barracks', ['controller' => 'Barracks', 'action' => 'index'])?></li>
<li><?= $this->Html->link('Calendar', ['controller' => 'Calendar', 'action' => 'index'])?></li>
<li><?= $this->Html->link('Availabilities', ['controller' => 'Calendar', 'action' => 'add'])?></li>