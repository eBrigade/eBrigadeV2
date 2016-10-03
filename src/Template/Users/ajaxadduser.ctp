<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Ajouter un utilisateur</h3>
            </div>
            <div class="modal-body">

                <div class="vehicles form large-9 medium-8 columns content">
                    <?= $this->Form->create($user, array("id"=>"form")) ?>
                    <fieldset>

                        <?php
            echo $this->Form->input('barracks._ids', ['options' => $barracks, 'default' => $id, 'class' => 'hidden','label' => false ]);

                        echo $this->Form->input('user_id', ['options' => $getusers, 'empty' => true ,'label' => 'Utilisateur']);

                        ?>
                    </fieldset>
                    <div class="text-center">
                        <?= $this->Form->button(__('VALIDER'),['class' => 'btn btn-success']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>



            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

<?= $this->Html->script('jquery-ui.js')?>
<script>

    $('#form').submit(function(){
        var array = $(this).serialize();
        $.ajax({
            type: "POST",
            url: '<?= $this->Url->build(["controller" => "Users","action" => "ajaxadduser"]); ?>',
            data: array,
            success: function (html) {
                $('#myModal').modal('toggle');
                var count = parseInt($('.cpt-user').text());
                var add = count + 1;
                $('.cpt-user').text(add);
                $("#tbl tbody").prepend(html);
                setTimeout(function() {
                    $(".highlight").removeClass("highlight")
                }, 3000);
            }
        });
        return false;
    });
</script>
