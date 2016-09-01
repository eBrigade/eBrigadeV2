<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $operationType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $operationType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Operation Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="operationTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($operationType) ?>
    <fieldset>
        <legend><?= __('Edit Operation Type') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('min');
            echo $this->Form->input('max');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
