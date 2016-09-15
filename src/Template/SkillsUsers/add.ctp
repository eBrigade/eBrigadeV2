<?= $this->Form->create() ?>
<?= $this->Form->input('barrack',['options' => $barracks]) ?>
<div id="result"></div>
<?= $this->Form->input('skill_id',['options' => $skills]) ?>
<?= $this->Form->input('date_acquired',['id' => 'date']) ?>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

<?= $this->Html->script('jquery-ui.js') ?>
<script>
    $(document).ready(function(){
        loadAjax();

    })
    $("#barrack").on('change',function(){
        loadAjax();
    });
    $('#date').datepicker({
        dateFormat: "yy-mm-dd"
    }).datepicker("setDate",new Date());

    function loadAjax(){
        var url = '<?= $this->Url->build(['action'=>'getuser']) ?>/'+$("#barrack").val();
        $.ajax({
            type:'GET',
            url:url,
            success:function(data) {
                $('#result').html(data);
            }
        })
    }
</script>
