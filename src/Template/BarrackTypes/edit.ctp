<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $barrackType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $barrackType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Barrack Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="barrackTypes form col-lg-9 col-md-8 columns content">
    <?= $this->Form->create($barrackType) ?>
    <fieldset>
        <legend><?= __('Edit Barrack Type') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
