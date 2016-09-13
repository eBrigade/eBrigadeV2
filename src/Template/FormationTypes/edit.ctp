<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $formationType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $formationType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Formation Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formationTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($formationType) ?>
    <fieldset>
        <legend><?= __('Edit Formation Type') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('level');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
