<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="messages form large-9 medium-8 columns content">
    <?= $this->Form->create($message) ?>
    <fieldset>
        <legend><?= __('Envoyer un message privé') ?></legend>
        <?php
            echo $this->Form->input('to_user');
            echo $this->Form->input('subject');
            echo $this->Form->input('text');
        ?>
    </fieldset>
    <?= $this->Form->button(__('ENVOYER')) ?>
    <?= $this->Form->end() ?>
</div>