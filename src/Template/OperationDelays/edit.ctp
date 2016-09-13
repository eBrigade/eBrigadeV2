<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $operationDelay->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $operationDelay->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Operation Delays'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="operationDelays form large-9 medium-8 columns content">
    <?= $this->Form->create($operationDelay) ?>
    <fieldset>
        <legend><?= __('Edit Operation Delay') ?></legend>
        <?php
            echo $this->Form->input('coefficient');
            echo $this->Form->input('title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
