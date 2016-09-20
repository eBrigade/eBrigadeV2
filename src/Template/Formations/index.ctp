<div class="formations index large-9 medium-8 columns content">
    <h3><?= __('Formations') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('Titre') ?></th>
                <th><?= $this->Paginator->sort('Competence Aquise') ?></th>
                <th><?= $this->Paginator->sort('Diplome') ?></th>
                <th><?= $this->Paginator->sort('Debut') ?></th>
                <th><?= $this->Paginator->sort('Fin') ?></th>
                <th><?= $this->Paginator->sort('Prix') ?></th>
                <th><?= $this->Paginator->sort('Ville') ?></th>
                <th><?= $this->Paginator->sort('Type de Formation') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formations as $formation): ?>
            <tr>
                <td><?= $this->Number->format($formation->id) ?></td>
                <td><?= h($formation->title) ?></td>
                <td><?= h($formation->skills) ?></td>
                <td><?= h($formation->diploma) ?></td>
                <td><?= h($formation->formation_start) ?></td>
                <td><?= h($formation->formation_end) ?></td>
                <td><?= h($formation->price) ?> €</td>
                <td><?= h($formation->city_id) ?></td>
                <td><?= h($formation->formation_type_id) ?></td>
                <td><?= $formation->has('formation_type') ? $this->Html->link($formation->formation_type->title, ['controller' => 'FormationTypes', 'action' => 'view', $formation->formation_type->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__(' View'), ['action' => 'view', $formation->id],['class'=>'btn btn-primary glyphicon glyphicon-eye-open']) ?>
                    <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $formation->id],['class'=>'btn btn-info glyphicon glyphicon-edit']) ?>
                    <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $formation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formation->id),'class'=>'btn btn-danger glyphicon glyphicon-remove']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
