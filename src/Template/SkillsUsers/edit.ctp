<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $skillsUser->skill_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $skillsUser->skill_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Skills Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Skills'), ['controller' => 'Skills', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Skill'), ['controller' => 'Skills', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="skillsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($skillsUser) ?>
    <fieldset>
        <legend><?= __('Edit Skills User') ?></legend>
        <?php
            echo $this->Form->input('date_acquired');
            echo $this->Form->input('validity_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
