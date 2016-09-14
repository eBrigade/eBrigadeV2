<?php $cell = $this->cell('Mp',[$user]) ?>
<?= $cell ?>

<div class="col-md-10 ">
    <div class="panel panel-default">
        <div class="panel-heading">Boîte de reception
            <?= $this->Form->button(__('<i class="glyphicon glyphicon-trash"></i> '),['id' => 'bt-del', 'class' => 'btn
            btn-large btn-danger delete pull-right',]) ?>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><?= $this->Form->checkbox('all', ['id' => 'all']); ?>Tous</th>
                    <th><?= $this->Paginator->sort('Reçu le') ?></th>
                    <th><?= $this->Paginator->sort('Expéditeur') ?></th>
                    <th><?= $this->Paginator->sort('Sujet') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($messages as $message): ?>
                <tr>
                    <td><?= $this->Form->checkbox('erase', ['value' => $message->id]); ?></td>
                    <td><?= $message->created->i18nformat('dd MMMM à HH:mm') ?></td>
                    <td><?php
                $user = $table->find()->where(['id' => $message->from_user])->first();
                        echo $user->firstname.' '.$user->lastname;
                        ?>
                    </td>
                    <!--<td><div id="subject"><?= h($message->subject) ?></div></td>-->
                    <td><?=  $this->Html->link(__(h($message->subject)), ['action' => 'view', $message->id]) ?></td>
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






