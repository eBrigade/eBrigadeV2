<div class="userMaterials form large-9 medium-8 columns content">
    <?= $this->Form->create($userMaterial) ?>
    <fieldset>
        <legend><?= __('Edit User Material') ?></legend>
        <?php
            echo $this->Form->input('quantity');
            echo $this->Form->input('from_date');
            echo $this->Form->input('to_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
