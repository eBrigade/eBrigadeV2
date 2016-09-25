
<tr id='<?= $vehi->id ?>' class="highlight">
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

    <td>
        <button id="btdel" class='glyphicon glyphicon-remove pull-right  btn btn-danger btn-sm del' aria-hidden='true'></button>
        <button  id="btedit" class='glyphicon glyphicon-edit pull-right  btn btn-warning btn-sm edit'  aria-hidden='true'></button>
        <button  id="btok" class='glyphicon glyphicon-ok pull-right  btn btn-success btn-sm ok hidden'  aria-hidden='true'></button>

    </td>
</tr>