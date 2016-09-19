<div class="row">
    <div class="col-sm-12 col-md-8 col-md-offset-2">
        <div class="panel-group">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3><?= h($material->name) ?></h3>
                </div>
                <div class="panel-body">
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
                            <td colspan=2 class="text-center">
                                <?= $this->Html->link(__('Return'),[
                                    'action' => 'index',
                                    $material->barrack->id
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
</div>