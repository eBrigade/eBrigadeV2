
        <?php foreach ($eve->teams as $team): ?>
        	<li class="list-group-item">
				<?= $this->Form->button($this->Html->icon('pencil'), ['escape' => false]) ?>
				<?=$team->name?>
                <?= $this->Html->badge( $this->Html->icon('user') . ' ' . count( $team->users ) . '/12' , ['escape' => false] ) ?>
                <?= $this->Html->badge( $this->Html->icon('briefcase') . ' Matériels ' . count( $team->materials ) , ['escape' => false] ) ?>
                <?= $this->Html->badge( $this->Html->icon('road') . ' Véhicules ' . count( $team->vehicles ) , ['escape' => false] ) ?>
            </li>
        <?php endforeach; ?>


