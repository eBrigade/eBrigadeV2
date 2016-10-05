<?php $cell = $this->cell('Barrackgestionmenu',[$id]) ?>
<?= $cell ?>

<div class="my-modal-base">
    <div class="my-modal-cont"></div>
</div>
<!--_____________________________________________________________________________________PERSONNEL-->


<div class="panel panel-info" id="user">
    <div class="panel-heading">Personnel


        <?= $this->Form->button(__(' <i class="glyphicon glyphicon-plus"></i> Créer'),['id' => 'bt-createuser', 'class' =>
        'btn btn-success pull-right btn-add marge',]) ?>
        <?= $this->Form->button(__(' <i class="glyphicon glyphicon-arrow-down"></i> Ajouter'),['id' => 'bt-adduser', 'class' =>
        'btn btn-warning pull-right btn-add marge',]) ?>
    </div>
    <table class="table table-bordered table-hover table-striped" width="100%" id="tbl">
        <thead class="gst">
        <tr>
            <!--<th></th>-->
            <th>
                <?php if ($this->Paginator->sortKey() == 'Users.firstname'): ?>
                <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down'; ?>'></i>
                <?php else: ?>
                <i class='fa fa-sort'></i>
                <?php endif; ?>
                <?= $this->Paginator->sort('firstname', ['label' => 'Nom']) ?>
            </th>
            <th>
                <?php if ($this->Paginator->sortKey() == 'Users.lastname'): ?>
                <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down'; ?>'></i>
                <?php else: ?>
                <i class='fa fa-sort'></i>
                <?php endif; ?>
                <?= $this->Paginator->sort('lastname', ['label' => 'Prénom']) ?>
            </th>
            <th>
                <?php if ($this->Paginator->sortKey() == 'Users.birthday'): ?>
                <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down'; ?>'></i>
                <?php else: ?>
                <i class='fa fa-sort'></i>
                <?php endif; ?>
                <?= $this->Paginator->sort('birthday', ['label' => 'Né le']) ?>
            </th>
            <th>
                <?php if ($this->Paginator->sortKey() == 'Users.zipcode'): ?>
                <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down'; ?>'></i>
                <?php else: ?>
                <i class='fa fa-sort'></i>
                <?php endif; ?>
                <?= $this->Paginator->sort('zipcode', ['label' => 'Code postal']) ?>
            </th>
            <th>
                <?php if ($this->Paginator->sortKey() == 'Users.city'): ?>
                <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down'; ?>'></i>
                <?php else: ?>
                <i class='fa fa-sort'></i>
                <?php endif; ?>
                <?= $this->Paginator->sort('city', ['label' => 'Ville']) ?>
            </th>
            <th>
                <?php if ($this->Paginator->sortKey() == 'Users.address'): ?>
                <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down'; ?>'></i>
                <?php else: ?>
                <i class='fa fa-sort'></i>
                <?php endif; ?>
                <?= $this->Paginator->sort('address', ['label' => 'Adresse']) ?>
            </th>
            <th>
                <?php if ($this->Paginator->sortKey() == 'Users.phone'): ?>
                <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down'; ?>'></i>
                <?php else: ?>
                <i class='fa fa-sort'></i>
                <?php endif; ?>
                <?= $this->Paginator->sort('phone', ['label' => 'Téléphone']) ?>
            </th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
        <tr id="<?= $user->id ?>">
            <!--<td style="text-align:center;"><?= $this->Form->checkbox('erase', ['value' => $user->id , 'id' => 'a_chkDelete','class' => 'text-centered']); ?></td>-->
            <td><?=  $user->firstname ?></td>
            <td><?=  $user->lastname ?></td>
            <td><?= $user->birthday ?></td>
            <td><?= $user->city->zipcode ?></td>
            <td><?= $user->city->city ?></td>
            <td><?=  $user->address ?></td>
            <td><?= $user->phone ?></td>
            <!--<a href='<?= $this->Url->build(["controller" => "messages","action" => "send" ]); ?>'-->
            <!--class="btn btn-default btn-sm   "><i class="fa fa-envelope" aria-hidden="true"></i> </a>-->
            <!--<a href='<?= $this->Url->build(["controller" => "users","action" => "view", $user->id ]); ?>'-->
            <!--class="btn btn-default btn-sm   "><i class="fa fa-user" aria-hidden="true"></i></a>-->
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
        'active','tag' => 'li','first' => 1));
        echo $this->Paginator->next(__('Suiv'), array('tag' => 'li','currentClass' => 'disabled'), null,
        array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
        ?>
    </ul>
</div>

<script>
    // ouvre le formulaire ajouter en modal
    var adduser = '<?= $this->Url->build(["controller" => "Users","action" => "ajaxadduser", $id ]); ?>';
    modal('#bt-adduser', adduser);
    var createuser = '<?= $this->Url->build(["controller" => "Users","action" => "add", $id ]); ?>';
    modal('#bt-createuser', createuser);

    // supprimer du personnel
    $('.del').click(function () {
        var array = [];
        array.push($(this).closest('tr').attr('id'));
        $('#' + array).css('background-color','#F5A9A9');
        $.ajax({
            type: 'POST',
            url: '<?= $this->Url->build("Users/ajaxdelete"); ?>',
            data: 'id=' + array,
            success: function (html) {
                $('#' + array).remove();
                $('.cpt-user').text(parseInt($('.cpt-user').text() - 1));
            }
        });
    });
</script>