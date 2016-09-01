<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $formation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $formation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="formations form large-9 medium-8 columns content">
    <?= $this->Form->create($formation) ?>
    <fieldset>
        <h3><?=h($formation->id)?></h3>
        <legend><?= __('Edit Formation')  ?></legend>
        <?php
        echo $this->Form->input('formation.organisation_id');
        echo $this->Form->input('formation.teacher_id');
        echo $this->Form->input('event.city_id', ['options' => $cities]);
        echo $this->Form->input('event.barrack_id', ['options' => $barracks]);
        echo $this->Form->input('event.bill_id');
        echo $this->Form->input('event.title');
        echo $this->Form->input('event.address');
        echo $this->Form->input('event.latitude');
        echo $this->Form->input('event.longitude');
        echo $this->Form->input('event.is_closed');
        echo $this->Form->input('event.closed', ['empty' => true]);
        echo $this->Form->input('event.price');
        echo $this->Form->input('event.canceled');
        echo $this->Form->input('event.canceled_detail');
        echo $this->Form->input('event.is_active');
        echo $this->Form->input('event.instructions');
        echo $this->Form->input('event.responsible_id');
        echo $this->Form->input('event.details');
        echo $this->Form->input('event.event_start_date', ['empty' => true]);
        echo $this->Form->input('event.event_end_date', ['empty' => true]);
        echo $this->Form->input('event.horaires');
        echo $this->Form->input('event.public');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
