<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $eventType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $eventType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Event Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="eventTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($eventType) ?>
    <fieldset>
        <legend><?= __('Edit Event Type') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('title');
            echo $this->Form->input('module');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
