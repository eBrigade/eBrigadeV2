
<?php $c_veh = count($barrack->vehicles) ?>

<table class="table table-hover" width="100%" id="tbl-vehicule">
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
        <th>Option</th>
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
        <td id='mat'>".$vehi->matriculation."</td>
        <td id='klm'>".$vehi->number_kilometer."</td>
        <td id='buy'>".$vehi->bought."</td>
        <td id='end'>".$vehi->end_warranty."</td>
        <td id='rev'>".$vehi->next_revision."</td>

        <td id= 'icon'>
            <span class='glyphicon glyphicon-remove red pull-right hidecross' aria-hidden='true'></span>
            <span class='glyphicon glyphicon-edit  pull-right hideedit' aria-hidden='true'></span>
        </td>
    </tr>
    ";
    ?>
    </tbody>
</table>


<script>

    var cid = '<?= $barrack->id ?>';

    // compte le nbr de matériel
    var c_veh = '<?= $c_veh ?>';
    $("#bdg-veh").text(c_veh);

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
    });
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

    // boutons pour editer des vehicules
    $('.hideedit').click(function () {
        var mat_val_origin = $(this).closest('tr').find('#mat').text();
        var klm_val_origin = $(this).closest('tr').find('#klm').text();
        var buy_val_origin = $(this).closest('tr').find('#buy').text().split("/").reverse().join("-");
        var end_val_origin = $(this).closest('tr').find('#end').text().split("/").reverse().join("-");
        var rev_val_origin = $(this).closest('tr').find('#rev').text().split("/").reverse().join("-");
        $(this).closest('tr').find('#mat').html('<input type="text" value=' + mat_val_origin + ' id="e-mat" class="edit-mod">');
        $(this).closest('tr').find('#klm').html('<input type="text" value=' + klm_val_origin + ' id="e-klm" class="edit-mod">');
        $(this).closest('tr').find('#buy').html('<input type="text" value=' + buy_val_origin + ' id="e-buy" class="edit-mod">');
        $(this).closest('tr').find('#end').html('<input type="text" value=' + end_val_origin + ' id="e-end" class="edit-mod">');
        $(this).closest('tr').find('#rev').html('<input type="text" value=' + rev_val_origin + ' id="e-rev" class="edit-mod"> <span id="ok" class="glyphicon glyphicon-ok  green pull-right"></span>');
        date('#e-buy', '-30:-0', '-5y');
        date('#e-end', '-30:+20', '+2y');
        date('#e-rev', '-0:+5', '+6m');
        $('#tbl-vehicule').removeClass( "table-hover" ).find('td:last-child').html("");

        $('#ok').click(function () {
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
                url: '<?= $this->Url->build(["controller" => "Vehicles","action" => "editliaison"]); ?>',
                data: send
            });
            $('#tbl-vehi').load('/Barracks/view/' + cid + '/vehicle');
        });
    });


</script>

<!--<td id='opt'>";-->

    <!--if ($vehi->snow){echo '<span class="glyphicon glyphicon-remove">neigeg</span>';}-->
    <!--if ($vehi->air_conditionner){echo '<span class="glyphicon glyphicon-remove">cklim</span>';}-->


    <!--echo "-->
<!--</td>-->
