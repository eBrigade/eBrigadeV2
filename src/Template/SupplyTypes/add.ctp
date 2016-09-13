<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Supply Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="supplyTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($supplyType) ?>
    <fieldset>
        <legend><?= __('Add Supply Type') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('name');
            echo $this->Form->input('measure_unit');
            echo $this->Form->input('quantity_per_unit');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
