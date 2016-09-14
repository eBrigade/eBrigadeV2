<?php $cell = $this->cell('Mp',[$user]) ?>
<?= $cell ?>

<div class="col-md-10 ">


    <div class="panel panel-default">
        <div class="panel-heading" id="send-page">Messages envoyés </div>
        <div class="panel-body">


            <table class="table ">
                <thead>
                <tr>

                    <th><?= $this->Paginator->sort('Expédié le') ?></th>
                    <th><?= $this->Paginator->sort('Destinataire(s)') ?></th>
                    <th><?= $this->Paginator->sort('Sujet') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($messages as $message): ?>
                <tr>

                <td><?= $message->created->i18nformat(' dd MMMM à HH:mm') ?></td>
                <td><?php
                $recip = unserialize($message->recipients);
                foreach ($recip as $recipId){
                $user = $users->find()->where(['id' => $recipId])->first();
                echo $user->firstname.' '.$user->lastname." <br/> ";
                }
                ?></td>
                <td><?= h($message->subject) ?></td>
                <td class="actions">
                <?= $this->Html->link(__(''), ['action' => 'sendview', $message->id],['class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Form->postLink(__(''), ['action' => 'delete', $message->id],['class' => 'btn btn-danger glyphicon glyphicon-trash']) ?>
                </td>
                </tr>
                <?php endforeach; ?>
                </tbody>


            </table>
        </div>
    </div>

</div>