<?php foreach ($event->teams as $team): ?>
    <li class="list-group-item">
		<?= $this->Html->link(_(''),['controller'=>'teams','action'=>'edit',$team->id],['class'=>'btn btn-default glyphicon glyphicon-pencil']) ?>
        <?= $this->Form->postLink(__(' '), ['controller'=>'Formations','action' => 'cop', $team->id],['class'=>'btn btn-default glyphicon glyphicon-paste']) ?>
        <?=$team->name?>
        <?= $this->Html->badge( $this->Html->icon('user') . ' ' . count( $team->users ) . '/12' , ['escape' => false] ) ?>
        <?= $this->Html->badge( $this->Html->icon('briefcase') . ' Matériels ' . count( $team->materials ) , ['escape' => false] ) ?>
        <?= $this->Html->badge( $this->Html->icon('road') . ' Véhicules ' . count( $team->vehicles ) , ['escape' => false] ) ?>
    </li>
<?php endforeach; ?>