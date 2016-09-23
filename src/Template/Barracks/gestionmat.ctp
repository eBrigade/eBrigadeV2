<?php $cell = $this->cell('Barrackgestionmenu',[$id]) ?>
<?= $cell ?>

<!--_____________________________________________________________________________________MATERIEL-->
<div class="row " id="mat">
    <div class="col-md-6">
        <div class="panel panel-success  ">
            <div class="panel-heading">Materiels
                <a href='<?= $this->Url->build(["controller" => "users","action" => "view" ]); ?>'
                   class="btn btn-success pull-right btn-add marge"><i class="glyphicon glyphicon-plus"></i>
                    Créer</a>
            </div>


            <table class="table table-bordered table-hover" width="100%" id="tbl">
                <thead class="gst">
                <tr>
                    <th>Type</th>
                    <th>Stock</th>
                    <th>Désignation</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($barrack_mat as $matos)
                    echo "
                    <tr id=".$matos->material->id.">
                <td>".$matos->material->material_type->name."</td>
                <td id='stock'>".$matos->stock."</td>
                <td>".$matos->material->name."</td>
                <td style='text-align:center' id='actionm'>
                </td>
                </tr>
                ";
                ?>
                </tbody>
            </table>
            <ul class="pagination pagination-large pull-right">
<!--                <?php
            echo $this->Paginator->prev(__('Prec'), array('tag' => 'li'), null, array('tag' => 'li','class' =>
                'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' =>
                'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('Suiv'), array('tag' => 'li','currentClass' => 'disabled'), null,
                array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                ?>-->
            </ul>
        </div>
    </div>


    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">Materiels empruntés
                <a href='<?= $this->Url->build(["controller" => "users","action" => "view" ]); ?>'
                   class="btn btn-warning pull-right btn-add marge"><i
                        class="glyphicon glyphicon-arrow-down"></i>
                    Ajouter</a>
            </div>


            <table class="table table-bordered table-hover" width="100%" id="tbl">
                <thead class="gst">
                <tr>
                    <th>Désignation</th>
                    <th>Qté</th>
                    <th>Emprunté par</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($user_mat as $material): ?>
                <tr>
                    <td><?=$material->material->name?></td>
                    <td><?=$material->stock ?></td>
                    <td><?=$material->user->firstname.' '.$material->user->lastname ?></td>
                    <td></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
   <!--         <ul class="pagination pagination-large pull-right">
                <?php
            echo $this->Paginator->prev(__('Prec'), array('tag' => 'li'), null, array('tag' => 'li','class' =>
                'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' =>
                'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('Suiv'), array('tag' => 'li','currentClass' => 'disabled'), null,
                array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                ?>
            </ul>-->
        </div>
    </div>


</div>