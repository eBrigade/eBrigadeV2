<?php $cell = $this->cell('Barrackgestionmenu',[$id]) ?>
<?= $cell ?>


<div class="my-modal-base">
    <div class="my-modal-cont"></div>
</div>

<!--_____________________________________________________________________________________VEHICULES-->

<div class="panel panel-danger " id="vehi">
    <div class="panel-heading">Véhicules

        <?= $this->Form->button(__(' <i class="glyphicon glyphicon-plus"></i> Ajouter un véhicule'),['id' => 'bt-vehi', 'class' =>
        'btn btn-success pull-right btn-add',]) ?>

    </div>
    <table class="table table-bordered table-hover" width="100%" id="tbl">
        <thead class="gst">
        <tr>
            <th></th>
            <th>Type</th>
            <th>Désignation</th>
            <th class="hidden-sm hidden-xs">Eqp</th>
            <th  class='hidden-sm hidden-xs' > <?php if ($this->Paginator->sortKey() == 'Vehicles.matriculation'): ?>
                <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down';
                ?>'></i>
                <?php else: ?>
                <i class='fa fa-sort'></i>
                <?php endif; ?>
                <?= $this->Paginator->sort('Vehicles.matriculation', ['label' => 'Matricule']) ?></th>
            <th  class='hidden-sm hidden-xs' > <?php if ($this->Paginator->sortKey() == 'Vehicles.number_kilometer'): ?>
                <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down';
                ?>'></i>
                <?php else: ?>
                <i class='fa fa-sort'></i>
                <?php endif; ?>
                <?= $this->Paginator->sort('Vehicles.number_kilometer', ['label' => 'Km']) ?></th>

            <th  class='hidden-sm hidden-xs' > <?php if ($this->Paginator->sortKey() == 'Vehicles.bought'): ?>
                <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down';
                ?>'></i>
                <?php else: ?>
                <i class='fa fa-sort'></i>
                <?php endif; ?>
                <?= $this->Paginator->sort('Vehicles.bought', ['label' => 'Acquis le']) ?></th>
            <th  class='hidden-sm hidden-xs' > <?php if ($this->Paginator->sortKey() == 'Vehicles.end_warranty'): ?>
                <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down';
                ?>'></i>
                <?php else: ?>
                <i class='fa fa-sort'></i>
                <?php endif; ?>
                <?= $this->Paginator->sort('Vehicles.end_warranty', ['label' => 'Fin de garantie']) ?></th>
            <th  class='hidden-sm hidden-xs' > <?php if ($this->Paginator->sortKey() == 'Vehicles.next_revision'): ?>
                <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down';
                ?>'></i>
                <?php else: ?>
                <i class='fa fa-sort'></i>
                <?php endif; ?>
                <?= $this->Paginator->sort('Vehicles.next_revision', ['label' => 'Prochaine révision']) ?></th>
            <th >Action</th>
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

            <td id="act">
                <button id="btdel" class='glyphicon glyphicon-remove pull-right  btn btn-danger btn-sm del' aria-hidden='true'></button>
                <button  id="btedit" class='glyphicon glyphicon-edit pull-right  btn btn-warning btn-sm edit'  aria-hidden='true'></button>
            </td>
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


<?= $this->Html->script('jquery-ui.js')?>
<script>
    var cid = '<?= $id ?>';

    // ouvre le formulaire en modal
    var vehicles = '<?= $this->Url->build(["controller" => "Vehicles","action" => "add", $id ]); ?>';
    modal('#bt-vehi', vehicles);

    // supprimer des vehicules
    $('.del').click(function () {
        var array = [];
        array.push($(this).closest('tr').attr('id'));
        $('#' + array).css('background-color','#F5A9A9');
        $.ajax({
            type: 'POST',
            url: '<?= $this->Url->build("Vehicles/ajaxdelete"); ?>',
            data: 'id=' + array,
            success: function (html) {
                $('#' + array).remove();
                $('.cpt-vehi').text(parseInt($('.cpt-vehi').text() - 1));
            }
        });
    });


    // boutons pour editer des vehicules
    $('.edit').click(function () {
        var mat_val_origin = $(this).closest('tr').find('#mat').text();
        var klm_val_origin = $(this).closest('tr').find('#klm').text();
        var buy_val_origin = $(this).closest('tr').find('#buy').text().split("/").reverse().join("-");
        var end_val_origin = $(this).closest('tr').find('#end').text().split("/").reverse().join("-");
        var rev_val_origin = $(this).closest('tr').find('#rev').text().split("/").reverse().join("-");
        $(this).closest('tr').find('#mat').html('<input type="text" value=' + mat_val_origin + ' id="e-mat" class="edit-mod">');
        $(this).closest('tr').find('#klm').html('<input type="text" value=' + klm_val_origin + ' id="e-klm" class="edit-mod">');
        $(this).closest('tr').find('#buy').html('<input type="text" value=' + buy_val_origin + ' id="e-buy" class="edit-mod">');
        $(this).closest('tr').find('#end').html('<input type="text" value=' + end_val_origin + ' id="e-end" class="edit-mod">');
        $(this).closest('tr').find('#rev').html('<input type="text" value=' + rev_val_origin + ' id="e-rev" class="edit-mod">');
        $(this).closest('tr').find('#act').html('<button  id="btok" class="glyphicon glyphicon-ok pull-right  btn btn-success btn-sm ok"  aria-hidden="true"></button>');
        date('#e-buy', '-30:-0', '-5y');
        date('#e-end', '-30:+20', '+2y');
        date('#e-rev', '-0:+5', '+6m');
        $('#tbl').removeClass( "table-hover" );

        $('#btok').click(function () {
            var id = $(this).closest('tr').attr('id');
            var mat_new = $('#e-mat').val();
            var klm_new = $('#e-klm').val();
            var buy_new = $('#e-buy').val();
            var end_new = $('#e-end').val();
            var rev_new = $('#e-rev').val();
            var send = 'id=' + id + '&matriculation=' + mat_new + '&number_kilometer=' + klm_new +
                    '&bought=' + buy_new + '&end_warranty=' + end_new + '&next_revision=' + rev_new  ;
            $.ajax({
                type: 'post',
                url: '<?= $this->Url->build(["controller" => "Vehicles","action" => "ajaxedit"]); ?>',
                data: send
            });
            var buynew = buy_new.split("-").reverse().join("/");
            var endnew = end_new.split("-").reverse().join("/");
            var revnew = rev_new.split("-").reverse().join("/");
            $(this).closest('tr').find('#mat').text( mat_new);
            $(this).closest('tr').find('#klm').text( klm_new);
            $(this).closest('tr').find('#buy').text( buynew);
            $(this).closest('tr').find('#end').text( endnew);
            $(this).closest('tr').find('#rev').text( revnew);
            $('#btok').addClass("hidden");
            $(this).closest('tr').find('#act').html('<button id="btdel" class="glyphicon glyphicon-remove pull-right  btn btn-danger btn-sm del" aria-hidden="true"></button><button  id="btedit" class="glyphicon glyphicon-edit pull-right  btn btn-warning btn-sm edit"  aria-hidden="true"></button>');
        });
    }); 
    $('[data-toggle="tooltip"]').tooltip();
</script>

        