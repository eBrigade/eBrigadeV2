<div class="formations form large-9 medium-8 columns content">
    <?= $this->Form->create($formation) ?>
    <fieldset>
        <legend><?= __('Ajout Formation') ?></legend>
        <?php
        echo $this->Form->input('title',['label'=>false,'placeholder'=>'Titre']);
        echo $this->Form->input('skills',['label'=>false,'placeholder'=>'Competence']);
        echo $this->Form->input('diploma',['label'=>false,'placeholder'=>'Dîplome']);
        echo $this->Form->input('formation_start',['label'=>false]);
        echo $this->Form->input('formation_end',['label'=>false]);
        echo $this->Form->input('price',['label'=>false,'append' =>'€','placeholder'=>'Prix']);
        echo $this->Form->input('instruction',['label'=>false,'placeholder'=>'Consigne']);
        echo $this->Form->input('horraires',['label'=>false,'placeholder'=>'Horraire']);
        echo $this->Form->input('details',['label'=>false,'placeholder'=>'Detail']);
        echo $this->Form->input('address',['label'=>false,'placeholder'=>'Adress']);
        echo $this->Form->input('city_id',['option'=>$cities, 'empty' => _('Ville'),'label'=>false]);
        echo $this->Form->input('formation_type_id', ['options' => $formationTypes, 'empty' => _('Type Formation'),'label'=>false]);
        echo $this->Form->input('barrack_id', ['options' => $barracks, 'empty' => _('Caserne'),'label'=>false]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
