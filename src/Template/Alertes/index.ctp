<div class="alertes index large-12 medium-12 columns content">
    <h3>
		<?= __('Module de gestion des alertes sms') ?>
		<?= $this->Html->link( $this->Html->icon('plus').__(' Créer une alerte'), ['action' => 'add'],['escape'=>false,'class'=>'btn btn-primary btn-md active']) ?>
		<?= $this->Html->link( $this->Html->icon('list').__(' Créer une liste'), ['action' => 'liste'],['escape'=>false,'class'=>'btn btn-primary btn-md active']) ?>
	</h3>
	<p>
		L'objectif de ce module étant de pouvoir être couplé au niveau opérationnel les équipes au système d'alerte SMS, les listes de numéros seront celles des équipiers, le nom celui de la tranche ou de l'équipe.
	</p>	
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('equipe') ?></th>
				<th><?= $this->Paginator->sort('list') ?></th>
                <th><?= $this->Paginator->sort('message') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alertes as $alerte): ?>
            <tr>
                <td><?= $this->Number->format($alerte->id) ?></td>
				<td>
					<?= h($alerte->equipe) ?>
				</td>
				<td><?= h($alerte->list) ?></td>
				<td>
				<?= $this->Html->link( $this->Html->icon('comment'), ['action' => 'resend', $alerte->id],['escape'=>false]) ?>
				<?php 
				if( ! $alerte->success ) {
					echo $this->Html->icon('alert');
				}
				?>
				<?= h($alerte->message) ?>
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
