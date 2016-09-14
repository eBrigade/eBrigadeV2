<div class="events form large-9 medium-8 columns content">
    <?= $this->Form->create($formation_event) ?>
    <fieldset>
        <legend><?= __('Add Event') ?></legend>
        <?php
        echo $this->Form->input('city_id', ['options' => $cities, 'empty' => true]);
        echo $this->Form->input('bill_id', ['options' => $bills, 'empty' => true]);
        echo $this->Form->input('title');
        echo $this->Form->hidden('id');
        echo $this->Form->input('address');
        echo $this->Form->input('latitude');
        echo $this->Form->input('longitude');
        echo $this->Form->input('is_closed');
        echo $this->Form->input('closed', ['empty' => true]);
        echo $this->Form->input('price');
        echo $this->Form->input('canceled');
        echo $this->Form->input('canceled_detail');
        echo $this->Form->input('is_active');
        echo $this->Form->input('instructions');
        echo $this->Form->input('details');
        echo $this->Form->input('barrack_id', ['options' => $barracks, 'empty' => true]);
        echo $this->Form->input('event_start_date', ['empty' => true]);
        echo $this->Form->input('event_end_date', ['empty' => true]);
        echo $this->Form->input('horaires');
        echo $this->Form->input('public');
        echo $this->Form->input('module');
        echo $this->Form->hidden('module_id',['types'=>'text','value'=>'1']);
        echo $this->Form->input('materials._ids', ['options' => $materials]);
        echo $this->Form->input('teams._ids', ['options' => $teams]);
        echo $this->Form->input('vehicles._ids', ['options' => $vehicles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>