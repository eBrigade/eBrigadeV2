<div class="formations form large-9 medium-8 columns content">
    <?= $this->Form->create($formation,['horizontal'=>true]) ?>
    <fieldset>
        <legend><?= __('Ajout Formation') ?></legend>
        <?php
/*            echo $this->Form->input('organization_id', ['options' => $organizations, 'empty' => true]);*/
        echo $this->Form->input('title');
        echo $this->Form->input('skills');
        echo $this->Form->input('diploma');
        echo $this->Form->input('formation_start');
        echo $this->Form->input('formation_end');
        echo $this->Form->input('price');
        echo $this->Form->input('instruction');
        echo $this->Form->input('city_id',['option'=>$cities]);
            echo $this->Form->input('formation_type_id', ['options' => $formationTypes, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
