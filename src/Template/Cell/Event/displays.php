<?php foreach ($formation->events as $event): ?>
    <div class="panel" style="border: solid #83580b 1px">
        <div class="panel-heading" style="background-color: #83580b"><p style="color=white"><b>Nom de la Mission : </b><?= $event->title ?></p>
            <div class="btn-group ">
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
        </div>
        <li class="list-group-item">
            <div class="panel-body">
                <div class="row-fluid">
                    <p><b>Horaires : </b><?= $event->horaires ?></p>
                    <p><b>Lieu de rendez-vous : </b><?= $event->details ?></p>
                    <p><b>Consignes : </b><?= $event->instructions ?></p>
                </div>
                <?= $this->cell('Team',[$formation->id,$event]) ?>
            </div>
        </li>
    </div>
<?php endforeach; ?>