<?php $cell = $this->cell('Barrack') ?>
<?= $cell ?>

<div class='col-md-9'>

    <div class="panel panel-primary">
        <div class="panel-heading"><?= __('VUE ARBORESCENTE DES CASERNES') ?>
        </div>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th>Caserne</th>
				<th><?= h('Informations') ?></th>
                <th><?= h('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
    <?php foreach( $barracks as $id => $barrack ) { ?>
    <?php $name = str_replace( '_' , ' <i class="fa fa-long-arrow-right" aria-hidden="true"></i> ' , $barracks_tree[ $barrack->id ] ); ?>
            <tr>
                <td> <?= $name ?></td>
				<td>
                	<?php
						echo $this->Html->badge( $this->Html->icon('user') . ' ' . count( $barrack->users ) , ['escape' => false]) ;
						echo $this->Html->badge( $this->Html->icon('briefcase') . ' ' . count( $barrack->material_stocks ) , ['escape' => false] ) ;
                    echo $this->Html->badge( $this->Html->icon('road') . ' ' . count( $barrack->vehicles ) , ['escape' => false] ) ;

                    ?>
                </td>
                <td>                <a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'view' , $barrack->id]); ?>" class="btn btn-default  btn-sm" ><i class="glyphicon glyphicon-eye-open"></i></a>
                </td>
            </tr>		
	<?php }	?>
    	</tbody>
    </table>
</div>

