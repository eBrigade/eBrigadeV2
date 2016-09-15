<?= $this->Form->input('categories',['options' => $categories]) ?>
<div id="result"></div>

<script>
    $("#categories").on("change",function(){
        var url = '<?= $this->Url->build(["controller" => "Materials","action" => "addajax"]) ?>/'+$("#categories").val();
        $.ajax({
            type:'GET',
            url:url,
            success:function(data) {
                $('#result').html(data);
            }
        })
    })
</script>