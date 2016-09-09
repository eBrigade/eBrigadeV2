<div class="alertes form large-9 medium-8 columns content">
    <?= $this->Form->create($alerte) ?>
    <fieldset>
        <legend><?= __('New Alerte from groupe') ?></legend>
        <?php
            echo $this->Form->input('equipe');
			echo $this->Form->input('list');
            echo $this->Form->input('message');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
