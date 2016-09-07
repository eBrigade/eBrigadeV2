<?= $this->Form->create() ?>
<?= $this->Form->input('material',['options' => $materials]) ?>
<?= $this->Form->input('quantity',['type' => 'number','min' => '1','value' => '1', 'max' => '2']) ?>
<?= $this->Form->button(__('Rendre')) ?>

<script>
    $("select").on("change",function(){
        var str = $("option:selected").html();
        var start = str.indexOf('(')+1;
        var end = str.indexOf(')',start);
        var result = str.substring(start,end);
        $("input[type='number']").attr("max",result);
    });
    $("input[type=number]").on("change",function(){
        var str = $("option:selected").html();
        var start = str.indexOf('(')+1;
        var end = str.indexOf(')',start);
        var result = str.substring(start,end);
        $(this).attr("max",result);
    });
</script>