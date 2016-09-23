<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vehicle->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="vehicles form large-9 medium-8 columns content">
    <?= $this->Form->create($vehicle) ?>
    <fieldset>
        <legend><?= __('Edit Vehicle') ?></legend>
        <?php
            echo $this->Form->input('matriculation');
            echo $this->Form->input('number_kilometer');
            echo $this->Form->input('snow');
            echo $this->Form->input('air_conditionner');
            echo $this->Form->input('vehicle_type_id', ['options' => $vehicleTypes, 'empty' => true]);
            echo $this->Form->input('vehicle_model_id', ['options' => $vehicleModels, 'empty' => true]);
            echo $this->Form->input('bought', ['empty' => true]);
            echo $this->Form->input('end_warranty', ['empty' => true]);
            echo $this->Form->input('next_revision', ['empty' => true]);
            echo $this->Form->input('barracks._ids', ['options' => $barracks]);
            echo $this->Form->input('events._ids', ['options' => $events]);
            echo $this->Form->input('teams._ids', ['options' => $teams]);
            echo $this->Form->input('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
