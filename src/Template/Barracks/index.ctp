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
						echo $this->Html->badge( $this->Html->icon('user') . ' ' . count( $barrack->users ) , ['escape' => false ,'data-original-title' => 'Personnel' , 'data-toggle' => 'tooltip']) ;
						echo $this->Html->badge( $this->Html->icon('briefcase') . ' ' . count( $barrack->material_stocks ) , ['escape' => false ,'data-original-title' => 'Matériel' , 'data-toggle' => 'tooltip']) ;
                    echo $this->Html->badge( $this->Html->icon('road') . ' ' . count( $barrack->vehicles ) , ['escape' => false ,'data-original-title' => 'Véhicules' , 'data-toggle' => 'tooltip']) ;

                    ?>
                </td>
                <td>                <a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'view' , $barrack->id]); ?>" class="btn btn-default btn-sm" ><i class="glyphicon glyphicon-eye-open"></i> Voir en détails</a>
                    <a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'edit', $barrack->id]); ?>" data-original-title="Editer cette caserne" data-toggle="tooltip" type="button" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i></a>

                    <?= $this->Form->postLink(__('<i class="glyphicon glyphicon-remove"></i>'),
                    ['controller' => 'barracks', 'action' => 'delete', $barrack->id],
                    [
                    'class' => 'btn btn-xs btn-danger ',
                    'escape' => false,
                    'data-original-title' => 'Supprimer cette caserne',
                    'data-toggle' => 'tooltip',
                    'confirm' => __('Etes-vous sûr de vouloir supprimer cette caserne')
                    ]
                    ) ?>
                </td>
            </tr>		
	<?php }	?>
    	</tbody>
    </table>
</div>


  <script>
      $('[data-toggle="tooltip"]').tooltip();
      </script>
