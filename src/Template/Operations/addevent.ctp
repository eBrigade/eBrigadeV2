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
                         ?>
                        <div id="show-address" class="btn">Entrer une autre adresse que celle de l'opération<br>
                        <div id="address" style="display: none">
                        <?php
                        echo $this->Form->input('address');
                        echo $this->Form->input('ville');
                        ?>
                        </div>
                            <?php
                        echo $this->Form->input('city_id', ['type' => 'text' , 'type' => 'hidden']);
                        echo $this->Form->input('instructions');
                        echo $this->Form->input('details');
                        echo $this->Form->input('barrack_id', ['options' => $barracks, 'empty' => true]);

                        echo $this->Form->input('event_start_date', ['type' => 'text', 'id' => 'start']);
                        echo $this->Form->input('event_end_date', ['type' => 'text', 'id' => 'end']);
                        echo $this->Form->input('horaires');
                        ?>
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
    <?= $this->Html->css('easy-autocomplete.css') ?>
    <?= $this->Html->script('jquery.datetimepicker.full.min.js') ?>
    <?= $this->Html->css('jquery.datetimepicker.css') ?>

    <script>

        $('#show-address').on('click', function () {
            $('#address').toggle(300);
        });

        //datetimepicker on date fields
        $('#start').datetimepicker({
            dateFormat: "yy-mm-dd",
            timeFormat:  "hh:mm:ss"
        });

        $('#end').datetimepicker({
            dateFormat: "yy-mm-dd",
            timeFormat:  "hh:mm:ss"
        });

    </script>
    <script>
        $("#ville").easyAutocomplete(options_ac);
    </script>
