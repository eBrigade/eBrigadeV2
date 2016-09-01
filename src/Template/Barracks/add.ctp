<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Barracks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Barrack Users'), ['controller' => 'BarrackUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Barrack User'), ['controller' => 'BarrackUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="barracks form large-9 medium-8 columns content">
    <?= $this->Form->create($barrack) ?>
    <fieldset>
        <legend><?= __('Ajouter une caserne') ?></legend>
        <?php
            echo $this->Form->input('name',['label' => 'Nom']);
            echo $this->Form->input('address',['label' => 'Adresse']);
        echo $this->Form->input('city_name',['required' => true, 'label' => 'Ville']);
            echo $this->Form->input('phone',['label' => 'Téléphone']);
            echo $this->Form->input('fax',['required' => false]);
            echo $this->Form->input('email');
            echo $this->Form->input('website_url',['required' => false, 'label' => 'URL du site web']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('VALIDER')) ?>
    <?= $this->Form->end() ?>
</div>


<!--script jquery autocomplete pour les villes-->
<?=  $this->element('Autocomplete/villes'); ?>