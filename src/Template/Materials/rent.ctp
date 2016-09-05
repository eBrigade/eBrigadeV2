<?= $this->Form->create() ?>
<?= $this->Form->input('material_id', ['options' => $materials]) ?>
<?= $this->Form->button(__('Réserver')) ?>
<?= $this->Form->end() ?>
