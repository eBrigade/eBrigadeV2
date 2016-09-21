<?php $cell = $this->cell('Messagerie',[$user]) ?>
<?= $cell ?>

<div class="col-md-10 ">
    <div class="panel panel-primary">
        <div class="panel-heading">Contenu du message
            <?= $this->Form->postLink(__(''), ['action' => 'delete', $message->id],['class' => 'btn btn-large btn-danger
            delete pull-right glyphicon glyphicon-trash',]) ?>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th> Sujet : <?=  $message->subject ?> <span class="pull-right">de : <?= $usert->firstname.' '.$usert->lastname ?></span>
                    </th>
                </tr>
                </thead>
                <tbody>
                <td><blockquote id="mess"><?= $message->text ; ?></blockquote></td>
                </tbody>
            </table>
            <?= $this->Form->button(__('Répondre à ce message'),['id' => 'rep-bt' , 'class' => 'btn-success ']) ?>
            <div id="repondre">
                <?= $this->Form->create($repondre) ?>
                <fieldset>
                    <?php
             echo $this->Form->input('text',['label' => false,'id' => 'wysyg']);
                    ?>

                </fieldset>
                <?= $this->Form->button(__('ENVOYER'),[ 'class' => 'btn-primary ']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>




    <div class="panel panel-danger">
        <div class="panel-heading">Historique  des conversations
        </div>
        <div class="panel-body history">
    <?php foreach ($get_history as $history): ?>
    <?php if ($history->to_user == $user)
    {echo '<blockquote id="mp-left" class="blockquote">
    <div>
        <strong>'.$usert->lastname.'</strong> :  le '.$history->created.'
    </div>
    ';}
        if ($history->from_user == $user)
            {echo '<blockquote id="mp-right">
    <div>
        <strong>Moi</strong> :  le '.$history->created.'
    </div>
    ';} ?>

    <div>
            <?= $history->text ?>
    </div>
        </blockquote>

        <?php endforeach; ?>
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
        $("#rep-bt").click(function () {
            $('#repondre').toggle("slow");
        });
    </script>