<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $notification->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $notification->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Notifications'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="notifications form large-9 medium-8 columns content">
    <?= $this->Form->create($notification) ?>
    <fieldset>
        <legend><?= __('Edit Notification') ?></legend>
        <?php
            echo $this->Form->input('source_id');
            echo $this->Form->input('receiver');
            echo $this->Form->input('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
