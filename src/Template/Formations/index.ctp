
<div class="formations index col-lg-9 col-md-8 columns content">
    <h3><?= __('List Formations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Organisation') ?></th>
                <th><?= $this->Paginator->sort('Title') ?></th>
                <th><?= $this->Paginator->sort('Type Formation') ?></th>
                <th><?= $this->Paginator->sort('Adress') ?></th>
                <th><?= $this->Paginator->sort('Caserne') ?></th>
                <th><?= $this->Paginator->sort('Horraire') ?></th>
                <th><?= $this->Paginator->sort('Debut') ?></th>
                <th><?= $this->Paginator->sort('Fin') ?></th>
                <th><?= $this->Paginator->sort('Autoriser au public') ?>
                <th><?= $this->Paginator->sort('Ville') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formations as $formation): ?>
            <tr>
                <td><?= $this->Number->format($formation->organization['title']) ?></td>
                <td><?= h($formation->event['title']) ?></td>
                <td><?= h($formation->formation_type['title']) ?></td>
                <td><?= h($formation->event['address']) ?></td>
                <td><?= h($formation->event['barrack_id']) ?></td>
                <td><?= h($formation->event['horaires']) ?></td>
                <td><?= h($formation->event['event_start_date']) ?></td>
                <td><?= h($formation->event['event_end_date']) ?></td>
                <?php if ($formation->event['public'] === '1'){$ouinon = 'oui';} else{$ouinon= 'non';} ?>
                <td><?= h($ouinon) ?></td>
                <td><?= h($formation->event['city_id']) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $formation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $formation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $formation->id], ['confirm' => __('Alors tu veut m\'effacer tes sur ?' , $formation->id)]) ?>
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
