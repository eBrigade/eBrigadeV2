<br>
<div class="row-fluid clearfix">
    <ul class="list-group col-xs-12 col-sm-12 col-md-12">
        <?php foreach ($eve->teams as $team): ?>
            <div class="panel" style="border: solid #d9b650 1px">
                <div class="panel panel-heading" style="background-color: #d9b650"><?=$team->name?></div>
                <div class="panel panel-body">
                    <ul class="list-group col-xs-4 col-sm-4 col-md-4">
                        <?php $i = 0;
                        foreach ($team->users as $user): $i++ ?>
                        <?php endforeach; ?>
                        <li class="list-group-item" style="border: solid #fde994 1px">Nombre User <span class="badge"><?= $i ?></span></li>
                    </ul>
                    <ul class="list-group col-xs-4 col-sm-4 col-md-4">
                        <?php $y = 0;
                        foreach ($team->materials as $material): $y++ ?>
                        <?php endforeach; ?>
                        <li class="list-group-item" style="border: solid #fde994 1px">Nombre Material <span class="badge"><?= $y ?></span></li>
                    </ul>
                    <ul class="list-group col-xs-4 col-sm-4 col-md-4">
                        <?php $z = 0;
                        foreach ($team->vehicles as $vehicles): $z++ ?>
                        <?php endforeach; ?>
                        <li class="list-group-item" style="border: solid #fde994 1px">Nombre Vehicule <span class="badge"><?= $z ?></span></li>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </ul>
</div>

