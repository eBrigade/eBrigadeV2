<div class='col-md-3'>
    <div class="sidebar-nav">
        <div class="navbar linkout" role="navigation">

            <ul class="nav nav-pills nav-stacked">
                <li class="active" ><a href="javascript:;"> FILTRER PAR
                </a>
                </li>
                <div class="voffset3"></div>
                <?php
               $action = $this->request->params['action'];
                ?>
                <?php echo $this->Form->create('Post',array('id' => 'form-map' , 'class' => 'form-horizontal' , 'type' => 'post','url' => array('controller' => 'barracks', 'action' => $action))); ?>

                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map" aria-hidden="true"></i></span>
                        <?= $this->Form->input('region', ['empty' => 'Region','options' => $region , 'label' => false , 'templates' => [
                        'inputContainer' => '{{content}}'
                        ]]);  ?>
                    </div>
                </div> <br> <br>

                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-signs" aria-hidden="true"></i></span>
                        <?= $this->Form->input('departement', ['empty' => 'Departement','options' => $dpt , 'label' => false , 'templates' => [
                        'inputContainer' => '{{content}}'
                        ]]);  ?>
                    </div>
                </div> <br> <br>

                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <?= $this->Form->input('nom', ['label' => false , 'placeholder'=>'recherche', 'templates' => [
                        'inputContainer' => '{{content}}'
                        ]]);  ?>
                    </div>
                </div> <br> <br>

                <div class="col-md-12">
                    <div class="input-group">
                        <?=  $this->Form->input('parent', ['type' => 'checkbox' , 'label' => 'Parents uniquement']) ;   ?>
                        <?=  $this->Form->input('enfant', ['type' => 'checkbox' , 'label' => 'Enfants uniquement']) ;   ?>
                    </div>
                </div>
                <div class="voffset7"></div>
                <?=   $this->Form->submit('Rechercher', ['class' => 'btn btn-success center-block']) ;
                $this->Form->end() ;
                ?>
        </div>
        </ul>
    </div>


    <div class="sidebar-nav ">
        <div class="navbar linkout" role="navigation">

            <ul class="nav nav-pills nav-stacked">
                <li class="active" ><a href="javascript:;"> AFFICHER PAR
                </a></li >
                <li ><a id="index" href="<?= $this->Url->build(['controller' => 'barracks','action' => 'index' , 'prefix' => false]); ?>"><i class="fa fa-list fa-lg " aria-hidden="true"></i> Liste </a></li>
                <li ><a id="annuaire" href="<?= $this->Url->build(['controller' => 'barracks','action' => 'annuaire' , 'prefix' => false]); ?>"><i class="fa fa-table fa-lg " aria-hidden="true"></i> Fiche </a></li>
                <li ><a id="arbre" href="<?= $this->Url->build(['controller' => 'barracks','action' => 'tree' , 'prefix' => false]); ?>"><i class="fa fa-tree fa-lg " aria-hidden="true"></i> Arborescence </a></li>
                <li ><a id="carte" href="<?= $this->Url->build(['controller' => 'barracks','action' => 'carte' , 'prefix' => false]); ?>"><i class="fa fa-globe fa-lg " aria-hidden="true"></i> Carte</a></li>
            </ul>
        </div>
    </div>


</div>


<script>
    // champ select dynamique
    $('#region').change(function(){
        getdpt()
    });
    function getdpt(){
        $.ajax({
            type: 'POST',
            url: '<?= $this->Url->build(["controller" => "Barracks","action" => "getdpt"]); ?>',
            data  : "id="+$('#region').val(),
            success: function (data) {
                $('#departement').html(data);
            }
        });
    }

    // Menu selectionner
    var menu = '<?= $action ?>';
    console.log(menu);
    if (menu == 'index' ){
        $('#index').append('<i class="fa fa-check-circle fa-lg action" aria-hidden="true"></i> ').css("font-weight","Bold");
    }
    if (menu == 'annuaire' ){
        $('#annuaire').append('<i class="fa fa-check-circle fa-lg action" aria-hidden="true"></i> ').css("font-weight","Bold");
    }
    if (menu == 'carte' ){
        $('#carte').append('<i class="fa fa-check-circle fa-lg action" aria-hidden="true"></i> ').css("font-weight","Bold");
    }
    if (menu == 'arbre' ){
        $('#arbre').append('<i class="fa fa-check-circle fa-lg action" aria-hidden="true"></i> ').css("font-weight","Bold");
    }

    // Check/uncheck sur le formulaire de recherche
    $('#parent').click(function(){
        if($('#enfant').prop('checked')){
            $('#enfant').prop('checked', false);
        }
    });
    $('#enfant').click(function(){
        if($('#parent').prop('checked')){
            $('#parent').prop('checked', false);
        }
    });
</script>