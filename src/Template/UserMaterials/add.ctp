<div class="materials form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <legend><?= __('Add User Material') ?></legend>
    <?php
    echo $this->Form->input('material_id', ['options' => $materials,'id' => 'material']);
    echo '<div id="stock-control"></div>';
    echo $this->Form->input('quantity',[
        'type' => 'number',
        'min' => 1
    ]);
    echo $this->Form->input('user_id',['options' => $users]);
    echo $this->Form->input('from_date',['class' => 'datepicker']);
    echo $this->Form->input('to_date',['class' => 'datepicker']);
    ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?= $this->Html->script('jquery-ui.js') ?>
<script>
    $(function(){
        loadStock();
        $('.datepicker').datepicker({
            dateFormat: "yy-mm-dd"
        }).datepicker("setDate",new Date());
        $('#material').on('change',function () {
            loadStock();
        })
    })

    function loadStock(){
        $.ajax({
            type: 'POST',
            url: '<?= $this->Url->build(["controller" => "UserMaterials","action" => "stock"]); ?>',
            data:"id="+$("#material").val(),
            success:function(data){
                var result = $(data);
                $('#stock-control').html(result);
                var max = result.find("input").val();
                if(max === "0")
                {
                    $('#quantity').attr("min","0");
                    $('#quantity').val(0);
                }
                else
                {
                    $('#quantity').attr("min","1");
                    $('#quantity').val(1);
                }
                $('#quantity').attr("max",max);
            }
        })
    }
</script>