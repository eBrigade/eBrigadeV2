<?php $cell = $this->cell('Messagerie',[$user]) ?>
<?= $cell ?>

<div class="col-md-10 ">


    <div class="panel panel-primary">
        <div class="panel-heading" id="send-page">Messages envoyés
            <?= $this->Form->button(__('<i class="glyphicon glyphicon-trash"></i> '),['id' => 'bt-del', 'class' => 'btn
            btn-large btn-danger delete pull-right',]) ?>
        </div>

        <div class="panel-body">


            <table class="table ">
                <thead>
                <tr>
                    <th><?= $this->Form->checkbox('all', ['id' => 'all']); ?>Tous</th>
                    <th><?= $this->Paginator->sort('Expédié le') ?></th>
                    <th><?= $this->Paginator->sort('Destinataire(s)') ?></th>
                    <th><?= $this->Paginator->sort('Sujet') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if (empty($messages)): ?>
                <td colspan="4" class="text-center">Aucun message envoyé</td>
                <?php endif; ?>
                <?php foreach ($messages as $message): ?>
                <tr>
                    <td><?= $this->Form->checkbox('erase', ['value' => $message->id]); ?></td>
                <td><?= $message->created->i18nformat(' dd MMMM à HH:mm') ?></td>
                <td><?php
                $recip = unserialize($message->recipients);
                foreach ($recip as $recipId){
                $user = $users->find()->where(['id' => $recipId])->first();
                echo $user->firstname.' '.$user->lastname." <br/> ";
                }
                ?></td>
                    <td><?=  $this->Html->link(__(h($message->subject)), ['action' => 'sendview', $message->id]) ?></td>

                </tr>
                <?php endforeach; ?>
                </tbody>


            </table>
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {
        $("#all").change(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        $('#bt-del').click(function (event) {
            var array = [];
            $.each($("input[name='erase']:checked"), function () {
                array.push($(this).val());
                $(this).closest('tr').remove();
            });
            $.ajax({
                type: 'POST',
                url: '<?= $this->Url->build(["controller" => "Messages","action" => "deleteAll"]); ?>',
                data: {id: array}
            });
        });
    });
</script>
