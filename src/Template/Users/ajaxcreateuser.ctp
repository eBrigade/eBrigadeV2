<tr id="<?= $user->id ?>" class="highlight">
    <td><?=  $user->firstname ?></td>
    <td><?=  $user->lastname ?></td>
    <td><?= $user->birthday ?></td>
    <td><?= $user->city->zipcode ?></td>
    <td><?= $user->city->city ?></td>
    <td><?=  $user->address ?></td>
    <td><?= $user->phone ?></td>
    <td id="act">
        <button id="btdel" class='glyphicon glyphicon-remove pull-right  btn btn-danger btn-sm del' aria-hidden='true'></button>
        <button  id="btedit" class='glyphicon glyphicon-edit pull-right  btn btn-warning btn-sm edit'  aria-hidden='true'></button>
    </td>
</tr>