<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formation Type'), ['action' => 'edit', $formationType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formation Type'), ['action' => 'delete', $formationType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formationType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formation Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['controller' => 'Formations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['controller' => 'Formations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formationTypes view large-9 medium-8 columns content">
    <h3><?= h($formationType->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Level') ?></th>
            <td><?= h($formationType->level) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($formationType->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= $this->Number->format($formationType->name) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Formations') ?></h4>
        <?php if (!empty($formationType->formations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Organization Id') ?></th>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Diploma') ?></th>
                <th><?= __('Skills') ?></th>
                <th><?= __('Formation Type Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($formationType->formations as $formations): ?>
            <tr>
                <td><?= h($formations->id) ?></td>
                <td><?= h($formations->organization_id) ?></td>
                <td><?= h($formations->event_id) ?></td>
                <td><?= h($formations->diploma) ?></td>
                <td><?= h($formations->skills) ?></td>
                <td><?= h($formations->formation_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Formations', 'action' => 'view', $formations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Formations', 'action' => 'edit', $formations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Formations', 'action' => 'delete', $formations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
