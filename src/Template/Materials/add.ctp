<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Material Types'), ['controller' => 'MaterialTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material Type'), ['controller' => 'MaterialTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Borrowed Materials'), ['controller' => 'BorrowedMaterials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Borrowed Material'), ['controller' => 'BorrowedMaterials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materials form large-9 medium-8 columns content">
    <?= $this->Form->create($material) ?>
    <fieldset>
        <legend><?= __('Add Material') ?></legend>
        <?php
            echo $this->Form->input('material_type_id', ['id' => 'change', 'options' => $materialTypes, 'empty' => true]);
            echo $this->Form->input('mtype',['id' => 'mtype', 'disabled' => 'disabled']);
            echo $this->Form->input('description',['id' => 'description', 'disabled' => 'disabled']);
            echo $this->Form->input('barrack_id', ['options' => $barracks, 'empty' => true]);
            echo $this->Form->input('quantity',['value' => '1', 'type' => 'number']);
            echo $this->Form->button(__('Ajouter'));
        ?>
    </fieldset>
</div>
<div id="divTypes" style="display:none;">
    <?php foreach($types as $type): ?>
    <span id="des-<?= $type->id ?>">
        <?= $type->description ?>
    </span>
    <span id="typ-<?= $type->id ?>">
        <?= $type->type ?>
    </span>
    <?php endforeach; ?>
</div>
<script type="text/javascript">
        $("#change").change(function(){
            var input = $("#change option:selected").val();
            var typ = $("#typ-"+input).html();
            var desc = $("#des-"+input).html();
            $("#mtype").val(typ);
            $("#description").val(desc);
        });
</script>
