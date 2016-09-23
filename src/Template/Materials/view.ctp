<div class="row">
    <div class="col-sm-12 col-md-8 col-md-offset-2">

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3><?= h($material->name) ?></h3>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th><?= __('Material Type') ?></th>
                            <td><?= $material->has('material_type') ? $this->Html->link($material->material_type->name, ['controller' => 'MaterialTypes', 'action' => 'view', $material->material_type->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Barrack') ?></th>
                            <td><?= $material->has('barrack') ? $this->Html->link($material->barrack->name,['controller' => 'Barracks','action'=>'view',$material->barrack->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h4><?= __('Description') ?></h4>
                                <?= $this->Text->autoParagraph(h($material->description)); ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h4><?= __('Quantity') ?></h4>
                                <?= $this->Text->autoParagraph(h($stocks->sum+$rented_today->sum)); //quantité à l'heure de la consultation ?>
                                <br>
                                <?php if($stocks->sum+$rented_today->sum > 0): ?>
                                    <?= $this->Html->link('<span class="fa fa-plus"></span> Emprunter',['controller'=>'MaterialStocks','action'=>'add',$material->barrack_id,'users',1],['class'=>'btn btn-warning','escape'=>false]) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h4>Sorties du Matériel</h4>
                                <div class="list-group">
                                <?php foreach($all_dates as $date): ?>
                                        <?php if($today >= $date->_matchingData['Events']->event_start_date && $today <= $date->_matchingData['Events']->event_end_date): ?>
                                            <?php $class = 'danger'; ?>
                                        <?php else: ?>
                                            <?php $class = 'success'; ?>
                                        <?php endif; ?>
                                        <div class="list-group-item list-group-item-<?= $class ?>">
                                            <h4 class="list-group-item-heading">Event : <?= $date->_matchingData['Events']->title ?></h4>
                                        </div>
                                        <div class="list-group-item">
                                            <p class="list-group-item-text">
                                                Début : <?= $date->_matchingData['Events']->event_start_date ?>
                                                -
                                                Fin : <?= $date->_matchingData['Events']->event_end_date ?>
                                            </p>
                                                <p class="list-group-item-text">Quantité : <?= abs($date->stock) ?></p>
                                            </p>
                                        </div>
                                <?php endforeach; ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=2 class="text-center">
                                <?= $this->Html->link(__('Return'),[
                                    'action' => 'index',
                                    $material->barrack_id
                                ],
                                [
                                    'class' => 'btn btn-success'
                                ]) ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

    </div>
</div>