<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Ajouter un véhicule</h3>
            </div>
            <div class="modal-body">

                <div class="vehicles form large-9 medium-8 columns content">
                    <?= $this->Form->create($vehicle, array("id"=>"form")) ?>
                    <fieldset>

                        <?php
            echo $this->Form->input('barracks._ids', ['options' => $barracks, 'default' => $id, 'class' => 'hidden','label' => false ]);
            echo $this->Form->input('matriculation', ['label' => 'Immatriculation']);
                        echo $this->Form->input('number_kilometer', ['label' => 'Nombre de kilomètres']);
                        echo $this->Form->input('snow',[
                        'label' => __('Pneus hiver '),
                        'type' => 'radio',
                        'options' => [
                        ['value' => 1, 'text' => __(' Oui')],
                        ['value' => 0, 'text' => __(' non')]
                        ],
                        'inline' => 'true'
                        ]);
                        echo $this->Form->input('air_conditionner',[
                        'label' => __('Air conditionné '),
                        'type' => 'radio',
                        'options' => [
                        ['value' => 1, 'text' => __(' Oui')],
                        ['value' => 0, 'text' => __(' Non')]
                        ],
                        'inline' => 'true'
                        ]);
                        echo $this->Form->input('vehicle_type_id', ['options' => $vehicleTypes, 'empty' => true ,'label' => 'Type de véhicule']);
                        echo $this->Form->input('model', ['placeholder' => 'Optionnel','empty' => true , 'label' => 'Modèle']);
                        echo $this->Form->input('bought', array(
                        'label' => (__('Acheté le')),
                        'type' => 'text',
                        'required' => false,
                        'class' => 'form-control date'
                        ));
                        echo $this->Form->input('end_warranty', array(
                        'label' => (__('Fin de garantie')),
                        'type' => 'text',
                        'required' => false,
                        'class' => 'form-control date'
                        ));
                        echo $this->Form->input('next_revision', array(
                        'label' => (__('Prochaine revision')),
                        'type' => 'text',
                        'required' => false,
                        'class' => 'form-control date'
                        ));
                        ?>
                    </fieldset>
                    <div class="text-center">
                        <?= $this->Form->button(__('VALIDER'),['class' => 'btn btn-success']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>



            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

<?= $this->Html->script('jquery-ui.js')?>
<script>
    //mise en place du datepicker jQuery
    date('#bought', '-30:-0', '-5y');
    date('#end-warranty', '-30:+20', '+2y');
    date('#next-revision', '-0:+5', '+6m');

    $('#form').submit(function(){
        var array = $(this).serialize();
        $.ajax({
            type: "POST",
            url: '<?= $this->Url->build(["controller" => "Vehicles","action" => "saveajax"]); ?>',
            data: array,
            success: function (html) {
                $('#myModal').modal('toggle');
                var count = parseInt($('.cpt-vehi').text());
                var add = count + 1;
                $('.cpt-vehi').text(add);
                $("#tbl tbody").prepend(html);
                setTimeout(function() {
                    $(".highlight").removeClass("highlight")
                }, 3000);
            }
        });
        return false;
    });
</script>
