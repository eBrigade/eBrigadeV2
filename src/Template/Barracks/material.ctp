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

    // boutons pour supprimer du matériel
    $('.hidecross').click(function () {
        c_mat--;
        $("#bdg-mat").text(c_mat);
        var array = [];
        array.push($(this).closest('tr').attr('id'));
        $(this).parents('tr').first().remove();
        $.ajax({
            type: 'POST',
            url: '<?= $this->Url->build(["controller" => "Materials","action" => "deleteliaison"]); ?>',
            data: {id: array},
        });
    });

    // boutons pour editer du matériel
    var cid = '<?= $barrack->id ?>';

    $('.hideedit').click(function () {
        var stock_val_origin = $(this).closest('tr').find('.stock').text();
        $(this).closest('tr').find('.stock').html('<input type="number" value=' + stock_val_origin + ' id="nbr"><span id="ok" class="glyphicon glyphicon-ok  green pull-right" aria-hidden="true"></span>');
        $('table').removeClass( "table-hover" );
        $( 'table tbody tr td:last-child' ).html("");

        $('#ok').click(function () {
            var id = $(this).closest('tr').attr('id');
            var stock_new = $('#nbr').val();
            var send = 'id=' + id + '&stock=' + stock_new;
            $.ajax({
                type: 'post',
                url: '<?= $this->Url->build(["controller" => "Materials","action" => "editliaison"]); ?>',
                data: send
            });
            $('#tbl-material').load('/Barracks/view/' + cid + '/material');
        });
    });


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