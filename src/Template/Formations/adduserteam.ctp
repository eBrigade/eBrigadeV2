<div id="myModal2" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 id="myModalLabel2">Ajouter une event à cette Formation</h3>
<div class="events form large-9 medium-8 columns content">
    <?= $this->Form->create($haha) ?>
    <fieldset>
        <?php
        echo $this->Form->input('barracks._ids', ['options' => $barracks]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<div class="events form large-9 medium-8 columns content">
    <?= $this->Form->create($formation_event_user_team) ?>
    <fieldset>
        <?php
        if (!empty($array)) {
            echo $this->Form->input('users._ids', ['options' => $array]);
        } else{
        echo $this->Form->input('users._ids', ['options' => $users]);
        }
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