<div class="formations form large-9 medium-8 columns content">
    <?= $this->Form->create($formation) ?>
    <fieldset>
        <legend><?= __('Editer la Formation ') ?><?= $formation->title ?>
            <?= $this->Form->postLink(__('Suprimer'), ['action' => 'delete', $formation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formation->id), 'class' => 'close']) ?>
        </legend>
        <?php
        echo $this->Form->input('title', [ 'label' => 'Titre']);
        echo $this->Form->input('skills', [ 'label' => 'Competence']);
        echo $this->Form->input('diploma', [ 'label' => 'Dîplome']);
        echo $this->Form->input('formation_start');
        echo $this->Form->input('formation_end');
        echo $this->Form->input('price', ['append' => '€', 'label' => 'Prix']);
        echo $this->Form->input('instruction', ['label' => 'Consigne']);
        echo $this->Form->input('horraires', [ 'label' => 'Horraire']);
        echo $this->Form->input('details', [ 'label' => 'Detail']);
        echo $this->Form->input('address', [ 'label' => 'Adress']);
        echo $this->Form->input('city_id', ['option' => $cities]);
        echo $this->Form->input('formation_type_id', ['options' => $formationTypes, 'empty' => true]);
        echo $this->Form->input('barrack_id', ['options' => $barracks]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
