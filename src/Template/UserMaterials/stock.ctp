<?php foreach($material as $mat): ?>
    <?= $this->Form->input('stock',['default' => $mat->stock,'disabled' => true]) ?>
<?php endforeach; ?>
