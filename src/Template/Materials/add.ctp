
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Ajouter du matériel</h3>
            </div>
            <div class="modal-body">


                <div class="materials form large-9 medium-8 columns content">
                    <legend><?= __('Add Material') ?></legend>
                    <?= $this->Form->create() ?>
                    <?= $this->Form->input('type',['options' => $types,'id' => 'type']) ?>
                    <?= $this->Form->end() ?>
                    <div id="form"></div>
                </div>


            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#type').on('change',function () {
        $.ajax({
            type: 'POST',
            url: '<?= $this->Url->build(["controller" => "Materials","action" => "addajax"]); ?>',
            data:"cat="+$("#type").val(),
            success:function(data){
                $('#form').html(data)
            }
        });
    })
</script>
