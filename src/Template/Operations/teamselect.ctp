<?php if (empty($event->teams)): ?>
    <p>Pas d'équipe associée, veuillez en créer.</p>
<?php endif ?>
<?php if (!empty($event->teams)): ?>
    <div class="col-md-12">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
            <select class="form-control" name="team" id="team">
                <option value="" disabled selected>Choix de l'équipe</option>
                <?php foreach ($event->teams as $team): ?>
                    <option value="<?= $team->id ?>">id :<?= $team->id ?> - nom : <?= $team->name ?></option>
                <?php endforeach; ?>
            </select>
            <?= $this->Html->link($this->Html->icon('plus'), ['action' => 'addevent', $event->id], ['id' => 'add-team', 'class'=>'btn btn-success','escape'=>false]) ?>
            <?= $this->Html->link($this->Html->icon('pencil'), ['action' => 'edit', $event->id], ['class'=>'btn btn-info','escape'=>false]) ?>
            <?= $this->Form->postLink($this->Html->icon('trash'), ['action' => 'delete', $event->id], ['class'=>'btn btn-danger','escape'=>false],
                ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?>

        </div>
    </div> <br> <br>




<?php endif; ?>
