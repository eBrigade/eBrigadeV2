<div class="formations form large-9 medium-8 columns content">
    <?= $this->Form->create($formation) ?>
    <fieldset>
        <legend><?= __('Edit Formation') ?></legend>
        <?php
        echo $this->Form->input('title');
        echo $this->Form->input('skills');
        echo $this->Form->input('diploma');
        echo $this->Form->input('formation_start');
        echo $this->Form->input('formation_end');
        echo $this->Form->input('price');
        echo $this->Form->input('instruction');
        echo $this->Form->input('city_id',['option'=>$cities]);
        echo $this->Form->input('barrack_id',['option'=>$barracks]);
        echo $this->Form->input('address');
        echo $this->Form->input('details');
        echo $this->Form->input('horraires');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
