<div class="row">
    <div class="col-sm-12 col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <?= $this->Form->create() ?>
                <fieldset>
                    <?= __('Add Material Stock') ?>
            </div>
            <div class="panel-body">
                <?php
                echo $this->Form->input('material_id', ['options' => $material_list,'id' => 'material_id']);
                echo $this->Form->input('affectation',['options' => $affectation_list,'default' => $affect]);
                echo $this->Form->input('affectation_id',['options' => $list]);
                echo $this->Form->input('stock',['type' => 'number','default' => $stock,'min' => '1','id' => 'stock']);
                ?>
            </div>
            </fieldset>
            <div class="panel-footer text-center">
                <?= $this->Form->button(__('Submit'),[
                    'class' => 'btn btn-primary'
                ]) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?= $this->Html->script('jquery.js') ?>
<script>
    $(document).ready(function () {
        searchStock();
    })
    $('#affectation').on('change',function(){
        var val = $(this).val();
        var stock = $("#stock").val();
        window.location = "<?= $this->Url->build(['controller' => 'MaterialStocks','action' => 'add',$id]) ?>/"+val+"/"+stock;
    });
    $('#material_id').on('change',function(){
        searchStock()
    });
    function searchStock()
    {
        var str = $('#material_id option:selected').text();
        var start = str.indexOf("(");
        start++;
        var end = str.indexOf(")");
        str = str.substring(start,end);
        $('#stock').attr('max',str);
        var stock = parseInt($('#stock').val());
        parseInt(str);
        if(stock > str)
        {
            $('#stock').val(str);
        }
    }
</script>