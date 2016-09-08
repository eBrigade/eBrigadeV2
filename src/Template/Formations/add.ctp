<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="formations form large-9 medium-8 columns content">
    <?=$this->Form->create($formation) ?>
    <fieldset>
        <legend><?= __('Add Formation') ?></legend>
        <?php
        echo $this->Form->input('event.title');
        echo $this->Form->input('event.event_type_id', ['options' => $FormationTypes]);
        echo $this->Form->input('formation.organization_id');
        echo $this->Form->hidden('formation.event_id');
        echo $this->Form->input('event.city_id', ['options' => $cities]);
        echo $this->Form->input('event.barrack_id', ['options' => $barracks]);
        echo $this->Form->input('event.address');
        echo $this->Form->hidden('event.latitude');
        echo $this->Form->hidden('event.longitude');
        echo $this->Form->input('event.price');
        echo $this->Form->input('event.instructions');
        echo $this->Form->input('event.responsible_id');
        echo $this->Form->input('event.details');
        echo $this->Form->input('event.event_start_date', ['empty' => true]);
        echo $this->Form->input('event.event_end_date', ['empty' => true]);
        echo $this->Form->input('event.horaires');
        echo $this->Form->input('event.public');
        echo $this->Form->hidden('event.is_active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
