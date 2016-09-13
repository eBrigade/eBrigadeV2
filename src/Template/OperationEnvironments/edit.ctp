<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $operationEnvironment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $operationEnvironment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Operation Environments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="operationEnvironments form large-9 medium-8 columns content">
    <?= $this->Form->create($operationEnvironment) ?>
    <fieldset>
        <legend><?= __('Edit Operation Environment') ?></legend>
        <?php
            echo $this->Form->input('coefficient');
            echo $this->Form->input('title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
