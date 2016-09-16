<div id="eventModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Ajouter un événement à cette Opération</h3>
                <div class="events form large-9 medium-8 columns content">
                    <?= $this->Form->create($event) ?>
                    <fieldset>
                        <?php

                        echo $this->Form->input('title');
                        echo $this->Form->input('address');
                        echo $this->Form->input('ville');
                        echo $this->Form->input('city_id', ['type' => 'text' , 'type' => 'hidden']);
                        echo $this->Form->input('instructions');
                        echo $this->Form->input('details');
                        echo $this->Form->input('barrack_id', ['options' => $barracks, 'empty' => true]);
                        echo $this->Form->input('event_start_date', ['empty' => true,'id'=>'start','types'=>'text']);
                        echo $this->Form->input('event_end_date', ['empty' => true],['id'=>'end']);
                        echo $this->Form->input('horaires');
                        ?>
                        <label for="from">From</label>
                        <input type="text" id="from" name="from">
                        <label for="to">to</label>
                        <input type="text" id="to" name="to">
                    </fieldset>
                    <?= $this->Form->button(__('Submit')) ?>
                    <?= $this->Form->end() ?>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Html->script('jquery-ui.js') ?>
    <?= $this->Html->script('jquery.easy-autocomplete.js') ?>
    <?= $this->Html->css('jquery.easy-autocomplete.css') ?>


    <script>

        //todo: fix dat shit
        $('#from').datetimepicker({
            dateFormat: "yy-mm-dd",
            timeFormat:  "hh:mm:ss"
        });
        $('#to').datetimepicker({
            dateFormat: "yy-mm-dd",
            timeFormat:  "hh:mm:ss"
        });


    </script>
    <script>
        $("#ville").easyAutocomplete(options_ac);
    </script>
