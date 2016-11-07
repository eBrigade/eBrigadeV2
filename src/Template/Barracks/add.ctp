<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading clearfix">
                <i class="icon-calendar"></i>
                <h3 class="panel-title">
                   <?= __('Créer une caserne') ?></h3>
            </div>

            <div class="panel-body">
                <div class="col-md-6">
        <?php
                    echo $this->Form->create($barrack , ['id' => 'form']);
			echo $this->Form->input('parent_id', [
					'options' => $parentBarracks,
					'empty' => 'Pas de caserne parente',
                'label' => 'Attacher à la caserne',
                    'prepend' => '<i class="fa fa-long-arrow-right"></i>'
					]);
 			echo $this->Form->input('code', [ 'prepend' => '<i class="glyphicon glyphicon-barcode"></i>']);
			echo $this->Form->input('name',['label' => 'Nom',  'prepend' => '<i class="fa fa-user" aria-hidden="true"></i>']);
            echo $this->Form->input('address',['label' => 'Adresse',  'prepend' => '<i class="fa fa-map-marker" aria-hidden="true"></i>']);
            echo $this->Form->input('address_complement',['label' => 'Adresse complémentaire',  'prepend' => '<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>']);
                    echo $this->Form->input('city_id', ['type' => 'text', 'type' => 'hidden']);
                    echo $this->Form->input('ville',  ['prepend' => '<i class="fa fa-map" aria-hidden="true"></i>']);
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
            echo $this->Form->input('phone',['label' => 'Téléphone',  'prepend' => '<i class="fa fa-phone" aria-hidden="true"></i>']);
            echo $this->Form->input('fax',[
                    'prepend' => '<i class="fa fa-fax" aria-hidden="true"></i>'
                    ]) ;
            echo $this->Form->input('email',[
                    'prepend' => '@'
                    ]) ;
            echo $this->Form->input('website_url',['label' => 'URL du site web',  'prepend' => '<i class="fa fa-link" aria-hidden="true"></i>']);
            echo $this->Form->input('ordre',['label' => 'Ordre de paiement' ,  'prepend' => '<i class="fa fa-money" aria-hidden="true"></i>']);
            echo $this->Form->input('rib',['label' => 'R.I.B.' ,  'prepend' => '<i class="glyphicon glyphicon-euro"></i>
                    ']);
        ?>   </div>

                <div class="row">
                        <div class="btn-toolbar text-center">

                            <?= $this->Form->button(' <i class="fa fa-times" aria-hidden="true"></i> Effacer', ['onclick' => 'reset()' , 'type'=>'button','class' => 'btn btn-danger ']) ; ?>
                            <?= $this->Form->button(' <i class="fa fa-check" aria-hidden="true"></i> Valider', ['type'=>'submit' , 'class' => 'btn btn-success  ', 'div' => false]) ; ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>







</div>
</div>
    </div>
</div>

<script>
    $("#ville").easyAutocomplete(options_ac);
    function reset() {
        document.getElementById("form").reset();
    }
</script>