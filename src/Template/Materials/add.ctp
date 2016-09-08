<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Material Types'), ['controller' => 'MaterialTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material Type'), ['controller' => 'MaterialTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Materials'), ['controller' => 'UserMaterials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Material'), ['controller' => 'UserMaterials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materials form large-9 medium-8 columns content">
    <?= $this->Form->create($material) ?>
    <fieldset>
        <legend><?= __('Add Material') ?></legend>
        <?php
            echo $this->Form->input('material_type_id', ['options' => $materialTypes, 'empty' => true]);
            echo $this->Form->input('barrack_id');
            echo $this->Form->input('stock');
            echo $this->Form->input('barracks._ids', ['options' => $barracks]);
            echo $this->Form->input('events._ids', ['options' => $events]);
            echo $this->Form->input('teams._ids', ['options' => $teams]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
