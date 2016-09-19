<div class="alertes index large-12 medium-12 columns content">
    <h3>
		<?= __('Vue arborescente des Casernes') ?>
	</h3>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('caserne') ?></th>
				<th><?= h('Informations') ?></th>
                <th><?= h('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
    <?php foreach( $barracks as $id => $barrack ) { ?>
    <?php $name = str_replace( '_' , '---' , $barracks_tree[ $barrack->id ] ); ?>
            <tr>
                <td><?= $name ?></td>
				<td>
                	<?php 
						echo $this->Html->badge( $this->Html->icon('user') . ' ' . count( $barrack->users ) , ['escape' => false] ) ;
						echo $this->Html->badge( $this->Html->icon('user') . ' ' . count( $barrack->users ) , ['escape' => false] ) ;
					 ?>
                </td>
                <td><?= h('Actions') ?></td>
            </tr>		
	<?php }	?>
    	</tbody>
    </table>
</div>
