<div class="table-responsive">
    <h3><?= __('Users') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('firstname') ?></th>
                <th><?= $this->Paginator->sort('lastname') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('login') ?></th>
                <th><?= $this->Paginator->sort('zipcode') ?></th>
                <th><?= $this->Paginator->sort('city_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>

                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->firstname) ?></td>
                <td><?= h($user->lastname) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->login) ?></td>
                <td><?= h($user->zipcode) ?></td>
                <td><?= $user->has('city') ? $this->Html->link($user->city->city, ['controller' => 'Cities', 'action' => 'view', $user->city->id]) : '' ?></td>
                <td><?= h($user->created) ?></td>

                <td class="actions">
                    <?= $this->Html->link($this->Html->icon('eye-open'), ['action' => 'view', $user->id],['class'=>'btn btn-primary','escape'=>false]) ?>
                    <?= $this->Html->link($this->Html->icon('pencil'), ['action' => 'edit', $user->id],['class'=>'btn btn-info','escape'=>false]) ?>
                    <?= $this->Form->postLink($this->Html->icon('trash'), ['action' => 'delete', $user->id],['class'=>'btn btn-danger','escape'=>false], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
