
<h1>Inventaire <?= $barrack->name ?></h1>
<div class="row">
    <div class="col-md-6">
        <h3>Formulaire d'emprunt</h3>
        <?= $this->Form->create() ?>
        <?= $this->Form->input('material_id', ['options' => $materials]) ?>
        <?= $this->Form->button(__('Réserver')) ?>
        <?= $this->Form->end() ?>
    </div>
    <div class="col-md-6">
        <h3>Matériels empruntés</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Matériel</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user->user->firstname . ' ' . $user->user->lastname ?></td>
                    <td><?= $user->material->material_type->name ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
