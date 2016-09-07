<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Event Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventTypes form col-lg-9 col-md-8 columns content">
    <?= $this->Form->create($eventType) ?>
    <fieldset>
        <legend><?= __('Add Event Type') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('title');
            echo $this->Form->input('module');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
