<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Operation Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="operationTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($operationType) ?>
    <fieldset>
        <legend><?= __('Add Operation Type') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('min');
            echo $this->Form->input('max');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
