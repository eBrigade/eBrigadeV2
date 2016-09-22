<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <h3><?= __('Materials') ?></h3>
        <?= $this->Form->input('barracks',['options' => $barracks,'id' => 'barracks','empty'=>true,'class' => 'form-control']) ?>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Matériel disponible
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('name') ?></th>
                                <th><?= $this->Paginator->sort('material_type_id') ?></th>
                                <th><?= $this->Paginator->sort('barrack_id') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($materials as $material): ?>
                                <tr>
                                    <td><?= $this->Number->format($material->id) ?></td>
                                    <td><?= h($material->name) ?></td>
                                    <td><?= $material->has('material_type') ? $this->Html->link($material->material_type->name, ['controller' => 'MaterialTypes', 'action' => 'view', $material->material_type->id]) : '' ?></td>
                                    <td><?= $material->has('barrack') ? $this->Html->link($material->barrack->name,['controller' => 'Barracks','action' => 'view',$material->barrack->id]) : '' ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link($this->Html->icon('eye-open'), ['action' => 'view', $material->id],['escape' => false,'class' => 'btn btn-primary btn-xs']) ?>
                                        <?= $this->Html->link($this->Html->icon('pencil'), ['action' => 'edit', $material->id],['class'=>'btn btn-info btn-xs','escape' => false]) ?>
                                        <?= $this->Html->link($this->Html->icon('shopping-cart'), ['controller'=>'Orders','action' => 'add',$material->barrack->id,$material->id],['class'=>'btn btn-success btn-xs','escape' => false]) ?>
                                        <?= $this->Form->postLink($this->Html->icon('trash'), ['action' => 'delete', $material->id],['class'=>'btn btn-danger btn-xs','escape' => false],['confirm' => __('Are you sure you want to delete # {0}?', $material->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                        </ul>
                        <p><?= $this->Paginator->counter() ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ________________________________________ -->
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    Matériel Commandé
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('name') ?></th>
                                <th><?= $this->Paginator->sort('material_type_id') ?></th>
                                <th><?= $this->Paginator->sort('barrack_id') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($ordered as $order): ?>
                                <tr>
                                    <td><?= $this->Number->format($order->id) ?></td>
                                    <td><?= h($order->name) ?></td>
                                    <td><?= $order->has('material_type') ? $this->Html->link($order->material_type->name, ['controller' => 'MaterialTypes', 'action' => 'view', $order->material_type->id]) : '' ?></td>
                                    <td><?= $order->has('barrack') ? $this->Html->link($order->barrack->name,['controller' => 'Barracks','action' => 'view',$order->barrack->id]) : '' ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link($this->Html->icon('eye-open'), ['action' => 'view', $order->id],['escape' => false,'class' => 'btn btn-primary btn-xs']) ?>
                                        <?= $this->Html->link($this->Html->icon('pencil'), ['action' => 'edit', $order->id],['class'=>'btn btn-info btn-xs','escape' => false]) ?>
                                        <?= $this->Html->link($this->Html->icon('shopping-cart'), ['controller'=>'Orders','action' => 'add',$order->barrack->id,$order->id],['class'=>'btn btn-success btn-xs','escape' => false]) ?>
                                        <?= $this->Form->postLink($this->Html->icon('trash'), ['action' => 'delete', $material->id],['class'=>'btn btn-danger btn-xs','escape' => false],['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                        </ul>
                        <p><?= $this->Paginator->counter() ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ________________________________________ -->
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    Matériel à Commander
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('name') ?></th>
                                <th><?= $this->Paginator->sort('material_type_id') ?></th>
                                <th><?= $this->Paginator->sort('barrack_id') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($to_order as $to): ?>
                                <tr>
                                    <td><?= $this->Number->format($to->id) ?></td>
                                    <td><?= h($to->name) ?></td>
                                    <td><?= $to->has('material_type') ? $this->Html->link($to->material_type->name, ['controller' => 'MaterialTypes', 'action' => 'view', $to->material_type->id]) : '' ?></td>
                                    <td><?= $to->has('barrack') ? $this->Html->link($to->barrack->name,['controller' => 'Barracks','action' => 'view',$to->barrack->id]) : '' ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link($this->Html->icon('eye-open'), ['action' => 'view', $to->id],['escape' => false,'class' => 'btn btn-primary btn-xs']) ?>
                                        <?= $this->Html->link($this->Html->icon('pencil'), ['action' => 'edit', $to->id],['class'=>'btn btn-info btn-xs','escape' => false]) ?>
                                        <?= $this->Html->link($this->Html->icon('shopping-cart'), ['controller'=>'Orders','action' => 'add',$to->barrack->id,$to->id],['class'=>'btn btn-success btn-xs','escape' => false]) ?>
                                        <?= $this->Form->postLink($this->Html->icon('trash'), ['action' => 'delete', $to->id],['class'=>'btn btn-danger btn-xs','escape' => false],['confirm' => __('Are you sure you want to delete # {0}?', $to->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                        </ul>
                        <p><?= $this->Paginator->counter() ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






        <!--
        <?= $this->Html->link('Editer le stock',['controller' => 'MaterialStocks','action' => 'index']) ?>
        <div class="table-responsive">
            <h3><?= __('Materials') ?></h3>
            <?= $this->Form->input('barracks',['options' => $barracks,'id' => 'barracks','empty'=>true,'class' => 'form-control']) ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('material_type_id') ?></th>
                    <th><?= $this->Paginator->sort('barrack_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($materials as $material): ?>
                    <tr>
                        <td><?= $this->Number->format($material->id) ?></td>
                        <td><?= h($material->name) ?></td>
                        <td><?= $material->has('material_type') ? $this->Html->link($material->material_type->name, ['controller' => 'MaterialTypes', 'action' => 'view', $material->material_type->id]) : '' ?></td>
                        <td><?= $material->has('barrack') ? $this->Html->link($material->barrack->name,['controller' => 'Barracks','action' => 'view',$material->barrack->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link($this->Html->icon('eye-open'), ['action' => 'view', $material->id],['escape' => false,'class' => 'btn btn-primary']) ?>
                            <?= $this->Html->link($this->Html->icon('pencil'), ['action' => 'edit', $material->id],['class'=>'btn btn-info','escape' => false]) ?>
                            <?= $this->Html->link($this->Html->icon('shopping-cart'), ['controller'=>'Orders','action' => 'add',$material->barrack->id,$material->id],['class'=>'btn btn-success','escape' => false]) ?>
                            <?= $this->Form->postLink($this->Html->icon('trash'), ['action' => 'delete', $material->id],['class'=>'btn btn-danger','escape' => false],['confirm' => __('Are you sure you want to delete # {0}?', $material->id)]) ?>
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
    </div>
</div>-->
<?= $this->Html->script('jquery.js') ?>
<script>
    $(document).ready(function(){
        $('#barracks option[value=<?= $id ?>]').attr("selected","selected");
    });
    $('#barracks').on('change',function(){
        var id = $('#barracks option:selected').val();
        var url = '<?= $this->Url->build(['controller'=>'Materials','action'=>'index']) ?>/index/'+id;
        window.location = url;
    });
</script>
