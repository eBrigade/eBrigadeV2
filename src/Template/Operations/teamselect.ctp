<?php if (empty($event->teams)): ?>
    <p>Pas d'équipe associée, en créer une ? (todo)</p>
<?php endif ?>
<?php if (!empty($event->teams)): ?>
    <label for="event">Equipe</label>
    <select class="form-control" name="team" id="team">
        <option value="" disabled selected>Choix de l'équipe</option>
        <?php foreach ($event->teams as $team): ?>
            <option value="<?= $team->id ?>">id :<?= $team->id ?> - nom : <?= $team->name ?></option>
        <?php endforeach; ?>
    </select>
    <label for="event">Type d'éléments à gérer</label>
    <select class="form-control" name="content" id="content">
        <option value="" disabled selected>Type d'éléments à gérer</option>
        <option value="Users">Equipiers</option>
        <option value="Materials">Materials</option>
        <option value="Vehicles">Véhicules</option>
    </select>

<?php endif; ?>