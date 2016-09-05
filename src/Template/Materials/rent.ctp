<h1>Inventaire <?= $barrack->name ?></h1>
<?= $this->Form->create() ?>
<?= $this->Form->input('material_id', ['options' => $materials]) ?>
<?= $this->Form->button(__('Réserver')) ?>
<?= $this->Form->end() ?>
