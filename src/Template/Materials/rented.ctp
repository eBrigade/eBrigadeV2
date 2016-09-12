<div class="table-responsive">
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th>Matériel</th>
                <th>Emprunté par</th>
                <th>Quantité</th>
                <th>Depuis le</th>
                <th>Jusqu'au</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($materials as $material): ?>

                <?php foreach($material->user_materials as $user_material)
                    {
                ?>
                    <tr>
                        <td><?= $material->material_type->name ?></td>
                        <td><?= ($user_material->user->firstname != null && $user_material->user->lastname != null) ? $user_material->user->firstname . ' ' . $user_material->user->lastname : 'Nope' ?></td>
                        <td><?= ($user_material->quantity != null) ? $user_material->quantity : '-/-' ?></td>
                        <td><?= ($user_material->from_date != null) ? $user_material->from_date : 'Inconnu' ?></td>
                        <td><?= ($user_material->from_to != null) ? $user_material->from_to : 'Inconnu' ?></td>
                    </tr>
                <?php
                    }
                ?>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator text-center">
        <ul class="pagination">
            <?= $this->Paginator->prev($this->Html->icon('chevron-left'),['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next($this->Html->icon('chevron-right'),['escape' => false]) ?>
        </ul>
    </div>
</div>
