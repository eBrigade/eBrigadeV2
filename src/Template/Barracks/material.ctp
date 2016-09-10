<?php $c_mat = count($barrack->materials) ?>

<table class="table table-hover" width="100%">
    <thead>
    <tr>
        <th>Qté</th>
        <th>Désignation</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($barrack->materials as $matos)
    echo "
    <tr id=".$matos->id.">
        <td>".$matos->stock."</td>
        <td>".$matos->material_type->name."</td>
        <td><span class='glyphicon glyphicon-remove red pull-right hidecross' aria-hidden='true'></span>
        </td>
    </tr>
    ";
    ?>
    </tbody>
</table>

<script>
    // boutons pour supprimer des liaisons entre la caserne
    var c_mat = '<?= $c_mat ?>';
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

    // compte le nbr de matériel
    $("#bdg-mat").text(c_mat);
</script>