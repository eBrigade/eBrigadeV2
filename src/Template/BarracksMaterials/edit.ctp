<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $barracksMaterial->barrack_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $barracksMaterial->barrack_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Barracks Materials'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="barracksMaterials form large-9 medium-8 columns content">
    <?= $this->Form->create($barracksMaterial) ?>
    <fieldset>
        <legend><?= __('Edit Barracks Material') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
