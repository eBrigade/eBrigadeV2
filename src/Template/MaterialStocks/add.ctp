<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Material Stocks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materialStocks form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Add Material Stock') ?></legend>
        <?php
            echo $this->Form->input('material_id', ['options' => $material_list,'id' => 'material_id']);
            echo $this->Form->input('stock',['type' => 'number','default' => '1','min' => '1','id' => 'stock']);
            echo $this->Form->input('affectation',['options' => $affectation_list,'default' => $affect]);
            echo $this->Form->input('affectation_id',['options' => $list]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
    $(document).ready(function () {
        searchStock();
    })
    $('#affectation').on('change',function(){
        var val = $(this).val();
        window.location = "<?= $this->Url->build(['controller' => 'MaterialStocks','action' => 'add',$id]) ?>/"+val;
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
        if($('#stock').val() > str)
        {
            $('#stock').val(str);
        }
    }
</script>