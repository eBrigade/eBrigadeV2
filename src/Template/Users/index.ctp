<div class="users index large-12 medium-12 columns content">
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
	<table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('firstname') ?></th>
                <th><?= $this->Paginator->sort('lastname') ?></th>
                <th><?= h('Coordonnées') ?></th>
                <th><?= $this->Paginator->sort('cellphone') ?></th>
                <th><?= $this->Paginator->sort('caserne') ?></th>
                <th><?= $this->Paginator->sort('is_active') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->firstname) ?></td>
                <td><?= h($user->lastname) ?></td>
                <td>
                    <small>
                        <?= h($user->adress) ?><br />
                        <?= h($user->zipcode) ?>&nbsp;<?= h($user->ville) ?><br />
                        <?= h($user->email) ?><br />
                        <?= h($user->phone) ?>&nbsp;<?= h($user->cellphone) ?>
                    </small>
                </td>
                <td><?= h('Liste des casernes d\'appartenance') ?></td>
                <td>
					<?php 
						if( (int) $user->is_active ){ 
							echo $this->Html->icon('ok');
						}else{ 
							echo $this->Html->icon('remove');
						}
					?>
				</td>
                <td class="actions">
					<?= $this->Form->buttonToolbar([
							$this->Form->buttonGroup([
								  $this->Html->link(	$this->Html->icon('eye-open'), 
													  ['action' => 'view', $user->id],
													  ['class'=>'btn btn-default','escape'=>false]), 
								  $this->Html->link(	$this->Html->icon('pencil'), 
													  ['action' => 'edit', $user->id],
													  ['class'=>'btn btn-default','escape'=>false]), 
								  $this->Html->link(	$this->Html->icon('trash'), 
													  ['action' => 'delete', $user->id],
													  ['class'=>'btn btn-default','escape'=>false,'confirm' => __('Are you sure you want to delete # {0}?', $user->id)])
							])
						]);
					?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	</div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
