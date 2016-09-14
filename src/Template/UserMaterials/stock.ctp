<?php foreach($material as $mat): ?>
    <?= $this->Form->input('stock',['default' => $mat->stock-$quantity,'disabled' => true]) ?>
<?php endforeach; ?>
