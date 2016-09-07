<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $barracksUser->barrack_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $barracksUser->barrack_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Barracks Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="barracksUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($barracksUser) ?>
    <fieldset>
        <legend><?= __('Edit Barracks User') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
