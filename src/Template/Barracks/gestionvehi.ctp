<?php $cell = $this->cell('Barrackgestionmenu',[$id]) ?>
<?= $cell ?>


<!--_____________________________________________________________________________________VEHICULES-->

<div class="panel panel-danger " id="vehi">
    <div class="panel-heading">Véhicules

        <a href='<?= $this->Url->build(["controller" => "users","action" => "view" ]); ?>'
           class="btn btn-success pull-right btn-add marge"><i class="glyphicon glyphicon-plus"></i> Créer</a>

    </div>
    <table class="table table-bordered table-hover" width="100%" id="tbl">
        <thead class="gst">
        <tr>
            <th></th>
            <th>
                <?php if ($this->Paginator->sortKey() == 'vehicle_type_id'): ?>
                <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down';
                ?>'></i>
                <?php else: ?>
                <i class='fa fa-sort'></i>
                <?php endif; ?>
                <?= $this->Paginator->sort('vehicle_type_id', ['label' => 'Type']) ?>
            </th>
            <th>Désignation</th>
            <th class="hidden-sm hidden-xs">Eqp</th>
            <th class="hidden-sm hidden-xs">Matricule</th>
            <th class="hidden-sm hidden-xs">Km</th>
            <th class="hidden-sm hidden-xs">Acquis le</th>
            <th class="hidden-sm hidden-xs">Garantie</th>
            <th class="hidden-sm hidden-xs">Revision</th>
            <th class="hidden-sm hidden-xs">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($vehicules as $vehi): ?>
        <tr id='<?= $vehi->id ?>'>
            <td><img id='img-veh' src='<?= $this->Url->image($vehi->vehicle_type->picture) ?>'></td>
            <td><?= $vehi->vehicle_type->type ?></td>
            <td><?= $vehi->vehicle_type->name ?></td>
            <td class='hidden-sm hidden-xs id=' opt
            '>
            <?= ($vehi->snow) ? "<span class='glyphicon glyphicon-asterisk' aria-hidden='true'
                                       data-toggle='tooltip' title='Véhicule équipé de pneux hiver'></span>"
            : "" ?>
            <?= ($vehi->air_conditionner) ? "<span class='glyphicon glyphicon-random' aria-hidden='true'
                                                   data-toggle='tooltip'
                                                   title='Véhicule avec climatisation'></span>" : "" ?>
            </td>
            <td class='hidden-sm hidden-xs' id='mat'><?= $vehi->matriculation ?></td>
            <td class='hidden-sm hidden-xs' id='klm'><?= $vehi->number_kilometer ?></td>
            <td class='hidden-sm hidden-xs' id='buy'><?= $vehi->bought ?></td>
            <td class='hidden-sm hidden-xs' id='end'><?= $vehi->end_warranty ?></td>
            <td class='hidden-sm hidden-xs' id='rev'><?= $vehi->next_revision ?></td>

            <td>  </td>
        </tr>
        <?php endforeach;  ?>

        </tbody>
    </table>
    <ul class="pagination pagination-large pull-right">
     <?php
            echo $this->Paginator->prev(__('Prec'), array('tag' => 'li'), null, array('tag' => 'li','class' =>
        'disabled','disabledTag' => 'a'));
        echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' =>
        'active','tag'
        => 'li','first' => 1));
        echo $this->Paginator->next(__('Suiv'), array('tag' => 'li','currentClass' => 'disabled'), null,
        array('tag'
        => 'li','class' => 'disabled','disabledTag' => 'a'));
        ?>
    </ul>
</div>
