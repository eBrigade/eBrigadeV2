<div class='col-md-3'>
    <div class="sidebar-nav linkout">
        <div class="navbar navbar-default" role="navigation">

            <ul class="nav nav-pills nav-stacked">
                <li class="active" ><a href="javascript:;"> AFFICHER PAR
                </a>
                </li>
                <li><a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'index']); ?>">Arborescence</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'annuaire']); ?>">Liste </a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'carte']); ?>">Carte</a></li>
            </ul>
        </div>
    </div>


    <div class="sidebar-nav linkout">
        <div class="navbar navbar-default" role="navigation">

            <ul class="nav nav-pills nav-stacked">
                <li class="active" ><a href="javascript:;"> TRIER PAR
                </a>
                </li>
                <div class="voffset3"></div>
                <?php echo $this->Form->create('Post',array('id' => 'form-map' , 'class' => 'form-horizontal' , 'type' => 'post','url' => array('controller' => 'barracks', 'action' => 'index'))); ?>

                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map" aria-hidden="true"></i></span>
                        <?= $this->Form->input('region', ['empty' => 'Tri par Region','options' => $region , 'label' => false , 'templates' => [
                        'inputContainer' => '{{content}}'
                        ]]);  ?>
                    </div>
                </div> <br> <br>

                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-signs" aria-hidden="true"></i></span>
                        <?= $this->Form->input('departement', ['empty' => 'Tri par Departement','options' => $dpt , 'label' => false , 'templates' => [
                        'inputContainer' => '{{content}}'
                        ]]);  ?>
                    </div>
                </div> <br> <br>

                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <?= $this->Form->input('nom', ['label' => false , 'placeholder'=>'recherche par nom', 'templates' => [
                        'inputContainer' => '{{content}}'
                        ]]);  ?>
                    </div>
                </div> <br> <br>

                <div class="col-md-12">
                    <div class="input-group">
                        <?=  $this->Form->input('parent', ['type' => 'checkbox' , 'label' => 'Parents uniquement']) ;   ?>
                        <?=  $this->Form->input('enfant', ['type' => 'checkbox' , 'label' => 'Enfants uniquement']) ;   ?>
                    </div>
                </div> <br> <br>
                <?=   $this->Form->submit('Rechercher', ['class' => 'btn btn-success center-block']) ;
                $this->Form->end() ;
                ?>
        </div>
        </ul>
    </div>
</div>


