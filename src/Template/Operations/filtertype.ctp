<?php if ($contentType == 'Users'): ?>
    <div class="col-md-12">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i></span>
            <select class="form-control" name="barrack" id="barrack">
                <option value="all" selected>Toutes les casernes</option>
                <?php if (!empty($barracklist)): ?>
                    <?php foreach ($barracklist as $barrack): ?>
                        <option value="<?= $barrack->id ?>"><?= $barrack->name ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-default">Valider les choix</button>
    </div> <br> <br>
<?php endif; ?>

<?php if ($contentType == 'Materials'): ?>

    <div class="form-group">
        <label for="barrack">Caserne</label>
        <select class="form-control" name="barrack" id="barrack">
            <option value="all" selected>Toutes les casernes</option>
            <?php if (!empty($barracklist)): ?>
                <?php foreach ($barracklist as $barrack): ?>
                    <option value="<?= $barrack->id ?>"><?= $barrack->name ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>

    </div>
    <button type="submit" class="btn btn-default">Valider les choix</button>
<?php endif; ?>

<?php if ($contentType == 'Vehicles'): ?>

    <div class="form-group">
        <label for="barrack">Caserne</label>
        <select class="form-control" name="barrack" id="barrack">
            <option value="all" selected>Toutes les casernes</option>
            <?php if (!empty($barracklist)): ?>
                <?php foreach ($barracklist as $barrack): ?>
                    <option value="<?= $barrack->id ?>"><?= $barrack->name ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-default">Valider les choix</button>
<?php endif; ?>
