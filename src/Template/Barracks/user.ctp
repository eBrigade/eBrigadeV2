<?php $c_user = count($barrack->users) ?>

<table class="table table-hover" width="100%" id="tbl-vehicule">
    <thead>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Cp</th>
        <th>Ville</th>
        <th>Téléphone</th>
        <th>Actif</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($barrack->users as $user): ?>
    <tr id="<?= $user->id ?>">
        <td><?=  $user->firstname ?></td>
        <td><?= $user->lastname ?></td>
        <td><?= $user->zipcode ?></td>
        <td><?= $user->city->city ?></td>
        <td><?= $user->workphone ?></td>
        <td><?= ($user->is_active) ? 'Oui' : 'Non' ?>
        </td>
        <td class='hidden-sm hidden-xs' id= 'icon'>
            <span class='glyphicon glyphicon-remove red pull-right hidecross' aria-hidden='true'></span>
        </td>
    </tr>

  <?php endforeach;  ?>
    </tbody>
</table>


<script>

    var cid = '<?= $barrack->id ?>';

    // compte le nbr de personnes
    var c_user = '<?= $c_user ?>';
    $("#bdg-user").text(c_user);

    // function pour trier les  colonnes personnels
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

    // boutons pour supprimer des personnes
    $('.hidecross').click(function () {
        c_user--;
        $("#bdg-user").text(c_user);
        var array = [];
        array.push($(this).closest('tr').attr('id'));
        $(this).parents('tr').first().remove();
        $.ajax({
            type: 'POST',
            url: '<?= $this->Url->build("BarracksUsers/deleteliaison"); ?>',
            data: 'uid= ' + array + '&id=' + cid
        });
    });
    </script>