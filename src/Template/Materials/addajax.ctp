<div class="materials form large-9 medium-8 columns content">
    <?= $this->Form->create($material) ?>
    <fieldset>
        <?php
        echo $this->Form->input('material_type_id', ['options' => $materialTypes, 'empty' => true]);
        echo $this->Form->input('barrack',['options' => $barracks]);
        echo $this->Form->input('stock');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script type="text/javascript">

        $('#form-mat').submit(function(){
            var array = $(this).serialize();
            var id =  $('select[name=barrack_id]').val();
            $.ajax({
                type: "POST",
                url: '<?= $this->Url->build(["controller" => "Materials","action" => "saveajax"]); ?>',
                data: array,
                success: function () {
                    $('#myModal').modal('toggle');
                    $('#tbl-material').load('/Barracks/view/' + id + '/material');
                }
        });
            return false;
        });

</script>