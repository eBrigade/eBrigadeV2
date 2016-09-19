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
                        echo $this->Form->input('title',['label'=>'Titre']);
                        echo $this->Form->hidden('id');
                        echo $this->Form->input('instructions',['label'=>'Consigne']);
                        echo $this->Form->input('event_start_date', ['empty' => true,'label'=>'Debut Event']);
                        echo $this->Form->input('event_end_date', ['empty' => true,'label'=>'Fin Event']);
                        echo $this->Form->input('horaires',['label'=>'Horraire']);
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
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker12').datepicker({
                }
            });
        </script>
    </div>
