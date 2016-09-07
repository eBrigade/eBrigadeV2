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
<div class="formations form col-lg-9 col-md-8 columns content">
    <?= $this->Form->create($formation) ?>
    <fieldset>
        <h3><?=h($formation->id)?></h3>
        <legend><?= __('Edit Formation')  ?></legend>
        <?php
        echo $this->Form->input('event.title',['value'=> $event[0]['title']]);
        echo $this->Form->input('event.city_id', ['options' => $cities,'value'=> $event[0]['city_id']]);
        echo $this->Form->input('event.barrack_id', ['options' => $barracks,'value'=> $event[0]['barrack_id']]);
        echo $this->Form->input('materials._ids', ['options' => $materials]);
        echo $this->Form->input('teams._ids', ['options' => $teams]);
        echo $this->Form->input('vehicles._ids', ['options' => $vehicles]);
        echo $this->Form->input('event.bill_id');
        echo $this->Form->input('formation.teacher_id');
        echo $this->Form->input('event.event_start_date', ['empty' => true]);
        echo $this->Form->input('event.event_end_date', ['empty' => true]);
        echo $this->Form->input('formation.organisation_id',['value'=> $event[0]['organisation_id']]);
        echo $this->Form->input('event.address',['value'=> $event[0]['address']]);
        echo $this->Form->input('event.latitude',['value'=> $event[0]['latitude']]);
        echo $this->Form->input('event.longitude',['value'=> $event[0]['longitude']]);
        echo $this->Form->input('event.price',['value'=> $event[0]['price']]);
        echo $this->Form->input('event.canceled',['value'=> $event[0]['canceled']]);
        echo $this->Form->input('event.canceled_detail',['value'=> $event[0]['canceled_detail']]);
        echo $this->Form->input('event.instructions',['value'=> $event[0]['instructions']]);
        echo $this->Form->input('event.responsible_id',['value'=> $event[0]['responsible_id']]);
        echo $this->Form->input('event.details',['value'=> $event[0]['details']]);
        echo $this->Form->input('event.horaires',['value'=> $event[0]['horaires']]);
        echo $this->Form->input('event.public',['value'=> $event[0]['public']]);
        echo $this->Form->input('event.is_closed',['value'=> $event[0]['is_closed']]);
        echo $this->Form->input('event.closed', ['empty' => true]);
        echo $this->Form->input('event.is_active',['value'=> $event[0]['is_active']]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

</div>
