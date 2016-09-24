<?php if (empty($event->teams)): ?>
    <p>Pas d'équipe associée, en créer une ? (todo)</p>
    <button id="add-team" class="btn btn-success btn-sm">Nouvelle équipe
    </button>
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
            <button id="add-team" class="btn btn-success btn-sm">Nouvelle équipe
            </button>
        </div>
    </div> <br> <br>




<?php endif; ?>
