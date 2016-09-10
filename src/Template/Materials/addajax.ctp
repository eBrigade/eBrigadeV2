<div class="materials form large-9 medium-8 columns content">
    <?= $this->Form->create($material, array("id"=>"formulaire")) ?>
    <fieldset>
        <?php
        echo $this->Form->input('material_type_id', ['options' => $materialTypes, 'empty' => true]);
        echo $this->Form->input('barrack_id');
        echo $this->Form->input('stock');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#formulaire').submit(function(){
            var array = $(this).serialize();
            $.ajax({
                type: "POST",
                url: '<?= $this->Url->build(["controller" => "Materials","action" => "addajax"]); ?>',
                data: array,
                success: function () {

                }
        });
            $('#myModal').modal('toggle');
            $('#tbl').prepend('<tr bgcolor="#90ee90"><td>' + $('#stock').val() + '</td><td>'
                    + $('#material-type-id :selected').html() + '</td><td></td></tr>');
            return false;
        });
    });

/*    var id =  $('select[name=barrack_id]').val();
    $('#tbl').load('/Barracks/viewmaterial/' + id);*/
</script>