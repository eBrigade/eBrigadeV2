<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Formations'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="formations form large-9 medium-8 columns content">
    <?php $user_creator =
        $this->Session->read('Auth.User.id');
    ?>
    <?=
    $this->Form->create($formation)
    ?>
    <fieldset>
        <legend><?= __('Add Formation') ?></legend>
        <?php
        echo $this->Form->input('formation.organization_id');
        echo $this->Form->input('formation.teacher_id');
        echo $this->Form->hidden('formation.event_id');
        echo $this->Form->input('formation.event.city_id', ['options' => $cities]);
        echo $this->Form->hidden('formation.id');
        echo $this->Form->hidden('event.id');
        echo $this->Form->hidden('event.creator_id' ,['value' => $user_creator ]);
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
        echo $this->Form->input('formation.event.barrack_id', ['options' => $barracks]);
        echo $this->Form->input('event.event_start_date', ['empty' => true]);
        echo $this->Form->input('event.event_end_date', ['empty' => true]);
        echo $this->Form->input('event.horaires');
        echo $this->Form->input('event.public');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
