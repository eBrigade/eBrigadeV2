<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Ajouter du matériel</h3>
            </div>
            <div class="modal-body">


                <div class="materials form large-9 medium-8 columns content">
                    <?= $this->Form->create($material) ?>
                    <fieldset>

                        <?php
            echo $this->Form->input('material_type_id', ['options' => $materialTypes, 'empty' => true]);
                        echo $this->Form->input('stock');
                        echo $this->Form->input('events._ids', ['options' => $events]);
                        echo $this->Form->input('teams._ids', ['options' => $teams]);
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Valider')) ?>
                    <?= $this->Form->end() ?>
                </div>


            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>