<div class="materials form large-9 medium-8 columns content">
    <?= $this->Form->create($material) ?>
    <fieldset>
        <?php
        echo $this->Form->input('material_type_id', ['options' => $materialTypes, 'empty' => true]);
        echo $this->Form->input('barrack_id');
        echo $this->Form->input('stock');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>