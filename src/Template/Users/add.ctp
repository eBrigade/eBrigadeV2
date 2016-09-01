<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Grades'), ['controller' => 'Grades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Grade'), ['controller' => 'Grades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Availabilities'), ['controller' => 'Availabilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Availability'), ['controller' => 'Availabilities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barrack Users'), ['controller' => 'BarrackUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack User'), ['controller' => 'BarrackUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Borrowed Materials'), ['controller' => 'BorrowedMaterials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Borrowed Material'), ['controller' => 'BorrowedMaterials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Borrowed Vehicles'), ['controller' => 'BorrowedVehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Borrowed Vehicle'), ['controller' => 'BorrowedVehicles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Teams'), ['controller' => 'EventTeams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Team'), ['controller' => 'EventTeams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Team Users'), ['controller' => 'TeamUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team User'), ['controller' => 'TeamUsers', 'action' => 'add']) ?></li>
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
            echo $this->Form->input('address');
            echo $this->Form->input('zipcode');
            echo $this->Form->input('city');
            echo $this->Form->input('birthday', ['empty' => true]);
            echo $this->Form->input('birthplace');
            echo $this->Form->input('skype');
            echo $this->Form->input('is_active');
            echo $this->Form->input('permission_id', ['options' => $permissions, 'empty' => true]);
            echo $this->Form->input('grade_id', ['options' => $grades, 'empty' => true]);
            echo $this->Form->input('role_id', ['options' => $roles, 'empty' => true]);
            echo $this->Form->input('connected', ['empty' => true]);
            echo $this->Form->input('vehicles._ids', ['options' => $vehicles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
