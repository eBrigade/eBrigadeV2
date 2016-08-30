<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $organization->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $organization->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Organizations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="organizations form large-9 medium-8 columns content">
    <?= $this->Form->create($organization) ?>
    <fieldset>
        <legend><?= __('Edit Organization') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('adress');
            echo $this->Form->input('city_id', ['options' => $cities, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
