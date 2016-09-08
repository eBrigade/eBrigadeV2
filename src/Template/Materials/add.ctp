<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Material Types'), ['controller' => 'MaterialTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material Type'), ['controller' => 'MaterialTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Materials'), ['controller' => 'UserMaterials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Material'), ['controller' => 'UserMaterials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['controller' => 'Barracks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack'), ['controller' => 'Barracks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materials form large-9 medium-8 columns content">
    <legend><?= __('Add Material') ?></legend>
    <?= $this->Form->create() ?>
    <?= $this->Form->input('type',['options' => $types,'id' => 'type']) ?>
    <?= $this->Form->end() ?>
    <div id="form"></div>
</div>

<script>
    $('#type').on('change',function () {
        $.ajax({
            type: 'POST',
            url: '<?= $this->Url->build(["controller" => "Materials","action" => "addajax"]); ?>',
            data:"cat="+$("#type").val(),
            success:function(data){
                $('#form').html(data)
            }
        });
    })
</script>
