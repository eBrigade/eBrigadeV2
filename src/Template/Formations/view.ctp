<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formation'), ['action' => 'edit', $formation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formation'), ['action' => 'delete', $formation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formation'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formations view large-9 medium-8 columns content">
    <h3><?= h($formation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($formation->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Organisation Id') ?></th>
            <td><?= $this->Number->format($formation->organisation_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Teacher Id') ?></th>
            <td><?= $this->Number->format($formation->teacher_id) ?></td>
        </tr>
        <tr>
            <th><?=__('event_id')?></th>
            <td><?= $event[0]['id'] ?></td>
        </tr>

        <tr>
            <th><?=__('title')?></th>
            <td><?= $event[0]['title'] ?></td>
        </tr>

        <tr>
            <th><?=__('Facture')?></th>
            <td><?= $event[0]['bill_id'] ?></td>
        </tr>

        <tr>
            <th><?=__('cree par')?></th>
            <td><?= $Users[0]['firstname'] ?></td>
        </tr>

        <tr>
            <th><?=__('address')?></th>
            <td><?= $event[0]['address'] ?></td>
        </tr>

        <tr>
            <th><?=__('latitude')?></th>
            <td><?= $event[0]['latitude'] ?></td>
        </tr>

        <tr>
            <th><?=__('longitude')?></th>
            <td><?= $event[0]['longitude'] ?></td>
        </tr>

        <tr>
            <th><?=__('created')?></th>
            <td><?= $event[0]['created'] ?></td>
        </tr>

        <tr>
            <th><?=__('modified')?></th>
            <td><?= $event[0]['modified'] ?></td>
        </tr>

        <tr>
            <th><?=__('is_closed')?></th>
            <td><?= $event[0]['is_closed'] ?></td>
        </tr>

        <tr>
            <th><?=__('closed')?></th>
            <td><?= $event[0]['closed'] ?></td>
        </tr>

        <tr>
            <th><?=__('prix')?></th>
            <td><?= $event[0]['price'] ?></td>
        </tr>

        <tr>
            <th><?=__('annuler')?></th>
            <td><?= $event[0]['canceled'] ?></td>
        </tr>

        <tr>
            <th><?=__('pourquoi annuller')?></th>
            <td><?= $event[0]['canceled_detail'] ?></td>
        </tr>

        <tr>
            <th><?=__('activer')?></th>
            <td><?= $event[0]['is_active'] ?></td>
        </tr>

        <tr>
            <th><?=__('consigne')?></th>
            <td><?= $event[0]['instructions'] ?></td>
        </tr>

        <tr>
            <th><?=__('responsable')?></th>
            <td><?= $event[0]['responsible_id'] ?></td>
        </tr>

        <tr>
            <th><?=__('detaile')?></th>
            <td><?= $event[0]['details'] ?></td>
        </tr>


        <tr>
            <th><?=__('caserne')?></th>
            <td><?= $barracks[0]['name'] ?></td>
        </tr>

        <tr>
            <th><?=__('debut evenment')?></th>
            <td><?= $event[0]['event_start_date'] ?></td>
        </tr>

        <tr>
            <th><?=__('fin evenment')?></th>
            <td><?= $event[0]['event_end_date'] ?></td>
        </tr>

        <tr>
            <th><?=__('horraire')?></th>
            <td><?= $event[0]['horaires'] ?></td>
        </tr>

        <tr>
            <th><?=__('vue par le publique')?></th>
            <td><?= $event[0]['public'] ?></td>
        </tr>

        <tr>
            <th><?=__('Ville')?></th>
            <td><?= $cities[0]['city'] ?></td>
        </tr>
    </table>
</div>
