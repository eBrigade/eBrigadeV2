<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="messages form large-9 medium-8 columns content">
    <?= $this->Form->create($message) ?>
    <fieldset>
        <legend><?= __('Add Message') ?></legend>
        <?php
            echo $this->Form->input('to_user');
            echo $this->Form->input('from_user');
            echo $this->Form->input('subject');
            echo $this->Form->input('text');
            echo $this->Form->input('send');
            echo $this->Form->input('recipients');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
