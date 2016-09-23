<?php $cell = $this->cell('Barrackgestionmenu',[$id]) ?>
<?= $cell ?>


<!--_____________________________________________________________________________________OPERATIONS-->

<div id="event">
    <div class="panel panel-warning ">
        <div class="panel-heading">Opérations

            <a href='<?= $this->Url->build(["controller" => "users","action" => "view" ]); ?>'
               class="btn btn-success pull-right btn-add marge"><i class="glyphicon glyphicon-plus"></i>
                Créer</a>

        </div>
        <table class="table table-bordered table-hover" width="100%" id="tbl">
            <thead class="gst">
            <tr>
                <th>
                    <?php if ($this->Paginator->sortKey() == 'Operations.title'): ?>
                    <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down';
                    ?>'></i>
                    <?php else: ?>
                    <i class='fa fa-sort'></i>
                    <?php endif; ?>
                    <?= $this->Paginator->sort('Operations.title', ['label' => 'Titre']) ?>
                </th>
                <th><?php if ($this->Paginator->sortKey() == 'Operations.city_id'): ?>
                    <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down';
                    ?>'></i>
                    <?php else: ?>
                    <i class='fa fa-sort'></i>
                    <?php endif; ?>
                    <?= $this->Paginator->sort('Operations.city_id', ['label' => 'Ville']) ?></th>
                <th><?php if ($this->Paginator->sortKey() == 'Operations.date'): ?>
                    <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down';
                    ?>'></i>
                    <?php else: ?>
                    <i class='fa fa-sort'></i>
                    <?php endif; ?>
                    <?= $this->Paginator->sort('Operations.date', ['label' => 'Date']) ?></th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($operations as $event): ?>
            <tr>
                <td><?= $event->title ?></td>
                <td> <?= $event->city->city ?> (<?= $event->city->zipcode ?>)</td>
                <td>le <?= $event->date ?></td>
                <td style="text-align:center;">
                    <a href='<?= $this->Url->build(["controller" => "operations","action" => "view", $event->id ]); ?>'
                       class="btn btn-default   btn-xs "><i class="fa fa-eye" aria-hidden="true"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
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

    <div class="row "></div>



    <!--_____________________________________________________________________________________FORMATIONS-->



    <div class="panel panel-warning ">
        <div class="panel-heading">Formations

            <a href='<?= $this->Url->build(["controller" => "users","action" => "view" ]); ?>'
               class="btn btn-success pull-right btn-add marge"><i class="glyphicon glyphicon-plus"></i>
                Créer</a>

        </div>
        <table class="table table-bordered table-hover" width="100%">
            <thead class="gst">
            <tr>
                <th>
                    <?php if ($this->Paginator->sortKey() == 'Formations.title'): ?>
                    <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down';
                    ?>'></i>
                    <?php else: ?>
                    <i class='fa fa-sort'></i>
                    <?php endif; ?>
                    <?= $this->Paginator->sort('Formations.title', ['label' => 'Titre']) ?>
                </th>
                <th>
                    <?php if ($this->Paginator->sortKey() == 'Formations.city_id'): ?>
                    <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down';
                    ?>'></i>
                    <?php else: ?>
                    <i class='fa fa-sort'></i>
                    <?php endif; ?>
                    <?= $this->Paginator->sort('Formations.city_id', ['label' => 'Ville']) ?>
                </th>
                <th>
                    <?php if ($this->Paginator->sortKey() == 'Formations.formation_start'): ?>
                    <i class='fa fa-sort-<?php echo $this->Paginator->sortDir() === 'asc' ? 'up' : 'down';
                    ?>'></i>
                    <?php else: ?>
                    <i class='fa fa-sort'></i>
                    <?php endif; ?>
                    <?= $this->Paginator->sort('Formations.formation_start', ['label' => 'Date']) ?>
                </th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($formations as $formation): ?>
            <?php if (!empty($formation)): ?>
            <tr>
                <td><?= $formation->title ?></td>
                <td><?= $formation->city->city ?> (<?= $event->city->zipcode ?>)</td>
                <td>du <?= $formation->formation_start->i18nFormat('dd/MM/yyyy') ?> au <?= $formation->
                    formation_end->i18nFormat('dd/MM/yyyy') ?>
                </td>
                <td style="text-align:center;">
                    <a href='<?= $this->Url->build(["controller" => "formations","action" => "view", $formation->id ]); ?>'
                       class="btn btn-default btn-xs "><i class="fa fa-eye" aria-hidden="true"></i></a>
                </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>

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
</div>