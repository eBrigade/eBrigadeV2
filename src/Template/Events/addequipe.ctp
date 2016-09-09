<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Ajouter une equipe à cette events</h3>
            </div>
            <div class="modal-body">
                <div class="events form large-9 medium-8 columns content">
                    <?= $this->Form->create($event_team) ?>
                    <fieldset>
                        <?php
                        echo $this->Form->input('teams._ids', ['options' => $teams]);
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