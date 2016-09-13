<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="barracks form large-9 medium-8 columns content">
    <?= $this->Form->create($barrack) ?>
    <fieldset>
        <legend><?= __('Add Barrack') ?></legend>
        <?php
        echo $this->Form->input('parent_id', [
        'options' => $parentBarracks,
        'empty' => 'Pas de caserne parente'
        ]);
            echo $this->Form->input('name');
            echo $this->Form->input('address');
            echo $this->Form->input('address_complement');
            echo $this->Form->input('city_id', ['options' => $cities]);
            echo $this->Form->input('phone');
            echo $this->Form->input('fax');
            echo $this->Form->input('email');
            echo $this->Form->input('website_url');
            echo $this->Form->input('ordre');
            echo $this->Form->input('rib');
            echo $this->Form->input('materials._ids', ['options' => $materials]);
            echo $this->Form->input('users._ids', ['options' => $users]);
            echo $this->Form->input('vehicles._ids', ['options' => $vehicles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
