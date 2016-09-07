<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Nouveau Message'), ['action' => 'send']) ?></li>
        <li><?= $this->Html->link(__('Messages envoyés'), ['action' => 'dispatch']) ?></li>
    </ul>
</nav>
<div class="messages index col-lg-9 col-md-8 columns content">
    <h3><?= __('Messages envoyés') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('Envoyé le') ?></th>
            <th><?= $this->Paginator->sort('Destinataire') ?></th>
            <th><?= $this->Paginator->sort('Sujet') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
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
                <?= $this->Html->link(__('Voir'), ['action' => 'sendview', $message->id]) ?>
                <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $message->id], ['confirm' => __('Etes-vous sûr de vouloir supprimer le message # {0}?', $message->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('précédant')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
