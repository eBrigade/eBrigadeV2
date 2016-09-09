<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Materials'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userMaterials form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Add User Material') ?></legend>
        <?php
            echo $this->Form->input('material_id', ['options' => $materials]);
            echo $this->Form->input('quantity',[
                'type' => 'number',
                'min' => 1,
                'value' => 1
            ]);
            echo $this->Form->input('to_date',['id' => 'datepicker']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?= $this->Html->script('jquery-ui.js') ?>
<script>
    $(function(){
        $('#datepicker').datepicker({
            dateFormat: "yy-mm-dd"
        })
    })
</script>

