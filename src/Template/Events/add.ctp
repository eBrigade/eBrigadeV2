<div class="events form large-9 medium-8 columns content">
    <?= $this->Form->create($event) ?>
    <fieldset>
        <legend><?= __('Add Event') ?></legend>
        <div class="input-group">
            <?= $this->Form->input('event_type_id', ['options' => $eventype, 'empty' => true, 'class' => 'form-control']) ?>
            <?= $this->Form->input('city_id', ['options' => $cities, 'empty' => true, 'class' => 'form-control']) ?>
            <?= $this->Form->input('bill_id', ['options' => $bills, 'empty' => true, 'class' => 'form-control']) ?>
            <?= $this->Form->input('title', ['class' => 'form-control']) ?>
            <?= $this->Form->input('address', ['class' => 'form-control']) ?>
            <?= $this->Form->hidden('latitude') ?>
            <?= $this->Form->hidden('longitude') ?>
            <?= $this->Form->input('price', ['class' => 'form-control']) ?>
            <?= $this->Form->input('instructions', ['class' => 'form-control']) ?>
            <?= $this->Form->input('responsible_id', ['class' => 'form-control']) ?>
            <?= $this->Form->input('details', ['class' => 'form-control']) ?>
            <?= $this->Form->input('barrack_id', ['options' => $barracks, 'empty' => true, 'class' => 'form-control']) ?>
            <?= $this->Form->input('event_start_date', ['empty' => true, 'class' => 'form-control']) ?>
            <?= $this->Form->input('event_end_date', ['empty' => true, 'class' => 'form-control']) ?>
            <?= $this->Form->input('horaires', ['class' => 'form-control']) ?>
            <?= $this->Form->input('public', ['class' => 'form-control']) ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
