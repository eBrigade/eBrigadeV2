<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $materialStock->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $materialStock->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Material Stocks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materialStocks form large-9 medium-8 columns content">
    <?= $this->Form->create($materialStock) ?>
    <fieldset>
        <legend><?= __('Edit Material Stock') ?></legend>
        <?php
            echo $this->Form->input('material_id', ['options' => $materials]);
            echo $this->Form->input('stock');
            echo $this->Form->input('affectation');
            echo $this->Form->input('affectation_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
