<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Ajouter une event à cette Formation</h3>
                <div class="events form large-9 medium-8 columns content">
                    <?= $this->Form->create($formation_event,['horizontal'=>true]) ?>
                    <fieldset>
                        <?php
                        echo $this->Form->input('city_id', ['options' => $cities, 'empty' => true]);
                        echo $this->Form->input('title',['label'=>'Titre']);
                        echo $this->Form->hidden('id');
                        echo $this->Form->input('address',['label'=>'Adresse']);
                        echo $this->Form->input('price',['label'=>'Prix']);
                        echo $this->Form->input('instructions',['label'=>'Consigne']);
                        echo $this->Form->input('details',['label'=>'Lieu Rendez Vous']);
                        echo $this->Form->input('barrack_id', ['options' => $barracks, 'empty' => true,'label'=>'Casern']);
                        echo $this->Form->input('event_start_date', ['empty' => true,'id'=>'start','types'=>'text','label'=>'Debut']);
                        echo $this->Form->input('event_end_date', ['empty' => true],['id'=>'end','label'=>'Fin']);
                        echo $this->Form->input('horaires',['label'=>'Horraire']);
                        echo $this->Form->input('public',['label'=>'Ouvert au Public']);
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