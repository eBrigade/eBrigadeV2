<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Ajouter une event à cette Formation</h3>
                <div class="events form large-9 medium-8 columns content">
                    <?= $this->Form->create($formation_event) ?>
                    <fieldset>
                        <?php
                        echo $this->Form->input('city_id', ['options' => $cities, 'empty' => true]);
                        echo $this->Form->input('title');
                        echo $this->Form->hidden('id');
                        echo $this->Form->input('address');
                        echo $this->Form->input('price');
                        echo $this->Form->input('instructions');
                        echo $this->Form->input('details');
                        echo $this->Form->input('barrack_id', ['options' => $barracks, 'empty' => true]);
                        echo $this->Form->input('event_start_date', ['empty' => true,'id'=>'start','types'=>'text']);
                        echo $this->Form->input('event_end_date', ['empty' => true],['id'=>'end']);
                        echo $this->Form->input('horaires');
                        echo $this->Form->input('public');
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
    <script> date('#start','-0:+2','+2') </script>