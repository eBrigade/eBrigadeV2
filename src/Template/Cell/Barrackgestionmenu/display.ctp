<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Gestion de la caserne <?=  $barrack ?></div>
        </div>
    </div>
</div>


<!--_____________________________________________________________________________________MENU-->

<div class="row">
    <div class="col-lg-3 col-md-6" id="bt_user">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><span class="compteur cpt-user"><?= $total_user  ?></span><br>
                            <span class="sscompteur">Personnes</span></div>
                    </div>
                </div>
            </div>
            <a href="">
                <div class="panel-footer">
                    <span class="pull-left">Voir en Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6" id="bt_event">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-calendar fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><span class="compteur cpt-event"><?= $total_event ?></span><br>
                            <span class="sscompteur">Evénements</span></div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Voir en Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6" id="bt_vehi">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-car fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><span class="compteur cpt-vehi"><?= $total_vehi ?></span><br>
                            <span class="sscompteur">Véhicules</span></div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Voir en Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6" id="bt_mat">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-wrench fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><span class="compteur cpt-mat"><?= $total_mat ?></span><br>
                            <span class="sscompteur">Matériels</span></div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Voir en Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">



<script>
        $("#bt_user").on('click', function(){
        window.location = "<?= $this->Url->build(['controller' => 'Barracks','action' => 'gestionuser' , $id, 'protection-civile-des-vosges']); ?>";
        });
        $("#bt_event").on('click', function(){
            window.location = "<?= $this->Url->build(['controller' => 'Barracks','action' => 'gestionevent' ,  $id, 'protection-civile-des-vosges']); ?>";
        });
        $("#bt_vehi").on('click', function(){
            window.location = "<?= $this->Url->build(['controller' => 'Barracks','action' => 'gestionvehi' ,  $id, 'protection-civile-des-vosges']); ?>";
        });
        $("#bt_mat").on('click', function(){
            window.location = "<?= $this->Url->build(['controller' => 'Barracks','action' => 'gestionmat' ,  $id, 'protection-civile-des-vosges']); ?>";
        });
</script>