<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vehicleModel->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vehicleModel->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Vehicle Models'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehicleModels form large-9 medium-8 columns content">
    <?= $this->Form->create($vehicleModel) ?>
    <fieldset>
        <legend><?= __('Edit Vehicle Model') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('label');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
