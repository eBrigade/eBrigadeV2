<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formation'), ['action' => 'edit', $formation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formation'), ['action' => 'delete', $formation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Organizations'), ['controller' => 'Organizations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organization'), ['controller' => 'Organizations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formation Types'), ['controller' => 'FormationTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation Type'), ['controller' => 'FormationTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formations view large-9 medium-8 columns content">
    <h3><?= h($formation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Organization') ?></th>
            <td><?= $formation->has('organization') ? $this->Html->link($formation->organization->title, ['controller' => 'Organizations', 'action' => 'view', $formation->organization->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Event') ?></th>
            <td><?= $formation->has('event') ? $this->Html->link($formation->event->title, ['controller' => 'Events', 'action' => 'view', $formation->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Diploma') ?></th>
            <td><?= h($formation->diploma) ?></td>
        </tr>
        <tr>
            <th><?= __('Skills') ?></th>
            <td><?= h($formation->skills) ?></td>
        </tr>
        <tr>
            <th><?= __('Formation Type') ?></th>
            <td><?= $formation->has('formation_type') ? $this->Html->link($formation->formation_type->title, ['controller' => 'FormationTypes', 'action' => 'view', $formation->formation_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($formation->id) ?></td>
        </tr>
    </table>
</div>
