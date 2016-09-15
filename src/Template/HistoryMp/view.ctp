<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit History Mp'), ['action' => 'edit', $historyMp->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete History Mp'), ['action' => 'delete', $historyMp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $historyMp->id)]) ?> </li>
        <li><?= $this->Html->link(__('List History Mp'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New History Mp'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="historyMp view large-9 medium-8 columns content">
    <h3><?= h($historyMp->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Subject') ?></th>
            <td><?= h($historyMp->subject) ?></td>
        </tr>
        <tr>
            <th><?= __('Recipients') ?></th>
            <td><?= h($historyMp->recipients) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($historyMp->id) ?></td>
        </tr>
        <tr>
            <th><?= __('To User') ?></th>
            <td><?= $this->Number->format($historyMp->to_user) ?></td>
        </tr>
        <tr>
            <th><?= __('From User') ?></th>
            <td><?= $this->Number->format($historyMp->from_user) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($historyMp->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Send') ?></th>
            <td><?= $historyMp->send ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Text') ?></h4>
        <?= $this->Text->autoParagraph(h($historyMp->text)); ?>
    </div>
</div>
