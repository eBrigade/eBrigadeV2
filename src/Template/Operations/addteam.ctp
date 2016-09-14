<?= $this->Form->create($event) ?>
    <fieldset>
        <legend><?= __('Add Event') ?></legend>
        <?php
        echo $this->Form->input('title');
        echo $this->Form->input('ville');
        echo $this->Form->input('city_id', ['type' => 'text' , 'type' => 'hidden']);


        echo $this->Form->input('address');
        echo $this->Form->input('latitude');
        echo $this->Form->input('longitude');
        echo $this->Form->input('instructions');
        echo $this->Form->input('details');
        echo $this->Form->input('barrack_id', ['options' => $barracks, 'empty' => true]);
        echo $this->Form->input('event_start_date', ['empty' => true]);
        echo $this->Form->input('event_end_date', ['empty' => true]);
        echo $this->Form->input('horaires');
        echo $this->Form->input('public');
        ?>
    </fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>



<script>
    $("#ville").easyAutocomplete(options_ac);
</script>
