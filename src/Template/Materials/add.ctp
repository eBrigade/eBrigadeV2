<?= $this->Form->input('categories',['options' => $categories]) ?>
<div id="result"></div>

<script>
    $("#categories").on("change",function(){
        $.ajax({
            type:"POST",
            url:'<?= $this->Url->build(["controller" => "Materials","action" => "addajax"]); ?>',
            data:"category="+$("#categories").val(),
            success:function(data) {
                $('#result').html(data);
            }
        })
    })
</script>