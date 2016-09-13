<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $availability->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $availability->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Availabilities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="availabilities form large-9 medium-8 columns content">
    <?= $this->Form->create($availability) ?>
    <fieldset>
        <legend><?= __('Edit Availability') ?></legend>
        <?php
            echo $this->Form->input('result');
            echo $this->Form->input('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
