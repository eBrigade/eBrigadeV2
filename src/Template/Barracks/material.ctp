<?php $c_mat = count($barrack->materials) ?>

<table class="table table-hover" width="100%" id="tbl-mat">
    <thead>
    <tr>
        <th>Stock</th>
        <th>Type</th>
        <th>Désignation</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($barrack->materials as $matos)
    echo "
    <tr id=".$matos->id.">
        <td class='stock'>".$matos->stock."</td>
        <td>".$matos->material_type->type."</td>
        <td>".$matos->material_type->name."</td>
        <td>
            <span class='glyphicon glyphicon-remove red pull-right hidecross' aria-hidden='true'></span>
            <span class='glyphicon glyphicon-edit  pull-right hideedit' aria-hidden='true'></span>
        </td>
    </tr>
    ";
    ?>
    </tbody>
</table>

<script>
    // compte le nbr de matériel
    var c_mat = '<?= $c_mat ?>';
    $("#bdg-mat").text(c_mat);






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

</script>