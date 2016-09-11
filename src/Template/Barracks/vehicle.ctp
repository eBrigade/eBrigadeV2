
<?php $c_mat = count($barrack->vehicles) ?>

<table class="table table-hover" width="100%" id="tbl-mat">
    <thead>
    <tr>
        <th> </th>
        <th>Type</th>
        <th>Désignation</th>
        <th>Matricule</th>
        <th>Km</th>
        <th>Acquis le</th>
        <th>Garantie</th>
        <th>Revision</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($barrack->vehicles as $vehi)

    echo "
    <tr id=".$vehi->id.">
        <td><img id='img-veh' src=". $this->Url->image($vehi->vehicle_type->picture)."></td>
        <td>".$vehi->vehicle_type->type."</td>
        <td>".$vehi->vehicle_type->name."</td>
        <td>".$vehi->matriculation."</td>
        <td>".$vehi->number_kilometer."</td>
        <td>".$vehi->bought."</td>
        <td>".$vehi->end_warranty."</td>
        <td>".$vehi->next_revision."</td>
        <td>
            <span class='glyphicon glyphicon-remove red pull-right hidecross' aria-hidden='true'></span>
            <!--<span class='glyphicon glyphicon-edit  pull-right hideedit' aria-hidden='true'></span>-->
        </td>
    </tr>
    ";
    ?>
    </tbody>
</table>


<script>

    var cid = '<?= $barrack->id ?>';

    // compte le nbr de matériel
    var c_mat = '<?= $c_mat ?>';
    $("#bdg-veh").text(c_mat);

    // function pour trier les  colonnes matériel
    $('th').click(function () {
        var table = $(this).parents('table').eq(0)
        var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
        this.asc = !this.asc
        if (!this.asc) {
            rows = rows.reverse()
        }
        for (var i = 0; i < rows.length; i++) {
            table.append(rows[i])
        }
    })
    function comparer(index) {
        return function (a, b) {
            var valA = getCellValue(a, index), valB = getCellValue(b, index)
            return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
        }
    }
    function getCellValue(row, index) {
        return $(row).children('td').eq(index).html()
    }

    // boutons pour supprimer des vehicules
    $('.hidecross').click(function () {
        c_mat--;
        $("#bdg-veh").text(c_mat);
        var array = [];
        array.push($(this).closest('tr').attr('id'));
        console.log(array);
        $(this).parents('tr').first().remove();
        $.ajax({
            type: 'POST',
            url: '<?= $this->Url->build("BarracksVehicles/deleteliaison"); ?>',
            data: 'vid= ' + array + '&id=' + cid
        });
    });
</script>