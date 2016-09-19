<?php foreach ($formation->events as $event): ?>
<div class="row-fluid clearfix">
	<ul class="list-group">
    	<li class="list-group-item list-group-item-info">
			<h4 class="list-group-item-heading">
				<?= $event->title ?>
                <div class="btn-group">
                    <button type="button" class="btn btn-info btn-xs">Modifier cette Mission</button>
                    <button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="/Events/edit/<?= $event->id ?>">Modifier les informations de la Mission</a></li>
                        <li role="separator" class="divider"></li>
                        <li><?= $this->Form->postLink(__('Supprimer l\'équipe et ses moyens'), ['controller'=>'Events','action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?></li>
                        <li><a href="#">Vider la liste des équipiers</a></li>
                        <li><a href="#">Vider la liste des véhicules et du matériel</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Dupliquer l'équipe et ses moyens</a></li>
                    </ul>
                </div>
            </h4>
            <p class="list-group-item-text">Horaires : <?= $event->horaires ?> et Rendez-vous : <?= $event->details ?></p>
        </li>
        <li class="list-group-item">
            <p><b>Consignes : </b><?= $event->instructions ?></p>        
        </li>
        <?= $this->cell('Team',[$formation->id,$event]) ?>
    </ul>
</div>
<?php endforeach; ?>