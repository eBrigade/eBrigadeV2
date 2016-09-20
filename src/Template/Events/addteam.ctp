<div class="teams form large-9 medium-8 columns content">
    <?= $this->Form->create($event_team) ?>
    <fieldset>
        <legend><?= __('Add Team') ?></legend>
        <?php
        echo $this->Form->input('events._ids', ['options' => $event,'value' => $ids,'class'=>'hidden']);
        foreach ($events as $eve) {
            echo 'Vous avez Selectionner L\'event <b>'.$eve->title.'</b><hr>';
        }
        echo $this->Form->input('name');
        echo $this->Form->input('description');
        echo $this->Form->input('position_adresse');
        echo $this->Form->input('radio_indicatif');
        echo $this->Form->input('radio_frequence');
        echo $this->Form->input('horaires');
        echo $this->Form->input('consignes');
        echo $this->Form->input('prix');
        echo $this->Form->input('materials._ids', ['options' => $materials]);
        echo $this->Form->input('users._ids', ['options' => $users]);
        echo $this->Form->input('vehicles._ids', ['options' => $vehicles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>