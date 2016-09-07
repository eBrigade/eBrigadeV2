<?= $this->Form->create() ?>
<?= $this->Form->input('material',['options' => $materials]) ?>
<?= $this->Form->input('quantity',['type' => 'number','min' => '1','value' => '1', 'max' => '2']) ?>
<?= $this->Form->button(__('Rendre')) ?>

<?= $this->Html->script('jquery-3.1.0.min.js') ?>
<script>
    // scripts pour gérer la valeur maximale de l'input number
    // pour éviter de rentrer un chiffre trop élevé
    // <<< Début du script >>>
    $(document).ready(function() {
        var str = $("option:selected").html();
        var start = str.indexOf('(') + 1;
        var end = str.indexOf(')', start);
        var result = str.substring(start, end);
        $("input[type='number']").attr("max", result);
    });
    // les deux qui suivent sont le même mais lors d'un
    // événement onchange
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
        // <<< Fin du script >>>
    });
</script>