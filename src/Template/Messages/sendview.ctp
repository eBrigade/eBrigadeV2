<?php $cell = $this->cell('Messagerie',[$user]) ?>
<?= $cell ?>

<div class="col-md-10 ">


    <div class="panel panel-primary">
        <div class="panel-heading">Contenu du message
            <?= $this->Form->postLink(__(''), ['action' => 'delete', $message->id],['class' => 'btn btn-large btn-danger delete pull-right glyphicon glyphicon-trash',]) ?>
        </div>
        <div class="panel-body">


            <table class="table">
                <thead>
                <tr>
                    <th> Sujet : <?=  $message->subject ?> <span class="pull-right">à :
                        <?php foreach ($usert as $rec): ?>
                        <?=  $rec->firstname.' '.$rec->lastname ?>
                        <?php endforeach; ?>
                    </span></th>
                </tr>
                </thead>
                <tbody>

                <td><?= $message->text ; ?></td>
                </tbody>


            </table>

        </div>
    </div>

</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<?= $this->Html->css('jquery-te-1.4.0.css')?>
<?= $this->Html->script('jquery-te-1.4.0.min.js')?>
<script>
    $("#wysyg").jqte();
    $('#repondre').hide();
    $("#rep-bt").click(function() {
        $('#repondre').toggle( "slow");
    });
</script>