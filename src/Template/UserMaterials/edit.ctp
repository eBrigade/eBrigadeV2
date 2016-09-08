<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userMaterial->user_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userMaterial->user_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Materials'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userMaterials form large-9 medium-8 columns content">
    <?= $this->Form->create($userMaterial) ?>
    <fieldset>
        <legend><?= __('Edit User Material') ?></legend>
        <?php
            echo $this->Form->input('from_date');
            echo $this->Form->input('to_date', ['empty' => true]);
            echo $this->Form->input('quantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
