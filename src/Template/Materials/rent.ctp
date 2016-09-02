<?= $this->Form->create() ?>
<?= $this->Form->input('Materials', ['options' => $materials]) ?>
<?= $this->Form->button(__('Réserver')) ?>
<?= $this->Form->end() ?>
