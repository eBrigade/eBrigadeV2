<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Availabilities'), ['controller' => 'Availabilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Availability'), ['controller' => 'Availabilities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Materials'), ['controller' => 'UserMaterials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Material'), ['controller' => 'UserMaterials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('firstname');
            echo $this->Form->input('lastname');
            echo $this->Form->input('birthname');
            echo $this->Form->input('email');
            echo $this->Form->input('login');
            echo $this->Form->input('password');
            echo $this->Form->input('phone');
            echo $this->Form->input('cellphone');
            echo $this->Form->input('workphone');
            echo $this->Form->input('address');
            echo $this->Form->input('address_complement');
            echo $this->Form->input('zipcode');
            echo $this->Form->input('city');
            echo $this->Form->input('birthday', ['empty' => true]);
            echo $this->Form->input('birthplace');
            echo $this->Form->input('skype');
            echo $this->Form->input('is_active');
            echo $this->Form->input('external');
            echo $this->Form->input('connected', ['empty' => true]);
            echo $this->Form->input('barracks._ids', ['options' => $barracks]);
            echo $this->Form->input('teams._ids', ['options' => $teams]);
            echo $this->Form->input('vehicles._ids', ['options' => $vehicles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
