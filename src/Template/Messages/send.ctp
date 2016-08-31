<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Vos Messages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="messages form large-9 medium-8 columns content">
    <?= $this->Form->create($message) ?>
    <fieldset>
        <legend><?= __('Envoyer un message privé') ?></legend>
        <?php
            echo $this->Form->input('to',['label' => 'Destinataire','type' => 'text']);
            echo $this->Form->input('subject',['label' => 'Sujet']);
            echo $this->Form->input('text',['label' => 'Votre message']);
        ?>

    </fieldset>
    <?= $this->Form->button(__('ENVOYER')) ?>
    <?= $this->Form->end() ?>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>

    $( function() {
        var availableTags = [<?php
                foreach ($lists as $listuser) {
            echo  '"';
            echo  $listuser;
            echo  '",';
        }
        ?>];
        $("[name=to]").autocomplete({
            source: availableTags
        });
    } );


</script>