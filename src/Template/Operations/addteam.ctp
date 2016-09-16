<div id="teamModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Ajouter une équipe à cet événement</h3>
                <div class="events form large-9 medium-8 columns content">
                    <?= $this->Form->create($team) ?>
                    <fieldset>
                        <?php

                        echo $this->Form->input('name');
                        echo $this->Form->input('description');
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
