<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Ajouter du matériel</h3>
            </div>
            <div class="modal-body">


                <div class="materials form large-9 medium-8 columns content">
                    <legend><?= __('Add User Material') ?></legend>
                    <?php
                    echo $this->Form->input('material_id', ['options' => $materials,'id' => 'material']);
                    echo '<div id="stock-control"></div>';
                    echo $this->Form->input('quantity',[
                        'type' => 'number',
                        'min' => 1,
                        'value' => 1
                    ]);
                    echo $this->Form->input('to_date',['id' => 'datepicker']);
                    ?>
                    </fieldset>
                    <?= $this->Form->button(__('Submit')) ?>
                    <?= $this->Form->end() ?>
                </div>


            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('jquery-ui.js') ?>
<script>
    $(function(){
        $.ajax({
            type: 'POST',
            url: '<?= $this->Url->build(["controller" => "UserMaterials","action" => "stock"]); ?>',
            data:"id="+$("#material").val(),
            success:function(data){
                var result = $(data);
                $('#stock-control').html(result);
                var max = result.find("input").val();
                $('#quantity').attr("max",max);
            }
        });
        $('#datepicker').datepicker({
            dateFormat: "yy-mm-dd"
        })
        $('#material').on('change',function () {
            $.ajax({
                type: 'POST',
                url: '<?= $this->Url->build(["controller" => "UserMaterials","action" => "stock"]); ?>',
                data:"id="+$("#material").val(),
                success:function(data){
                    var result = $(data);
                    $('#stock-control').html(result);
                    var max = result.find("input").val();
                    $('#quantity').attr("max",max);
                }
            });
        })
    })
</script>

