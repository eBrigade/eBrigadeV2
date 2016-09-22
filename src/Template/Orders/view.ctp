<div class="row">
    <div class="col-sm-12 col-md-8 col-md-offset-2">
        <div class="panel-group">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3>Commande N°<?= h($order->id) ?></h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th><?= __('Material') ?></th>
                            <td><?= $order->has('material') ? $this->Html->link($order->material->name, ['controller' => 'Materials', 'action' => 'view', $order->material->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <td><?= $this->Number->format($order->id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Quantity') ?></th>
                            <td><?= $this->Number->format($order->quantity) ?></td>
                        </tr>
                    </table>
                    <?php
                    // on ne peut cliquer dessus que si on la commande a été passée
                    if($order->material->order_made)
                    {
                        ?>
                        <div>
                            <?= $this->Form->postLink(__('Received').$this->Html->icon('check'), ['action' => 'received', $order->id],['class' => 'btn btn-warning','escape'=>false],['confirm' => __('Are you sure you want to order # {0}?', $order->id)]) ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="panel-footer text-align">

                </div>
            </div>
        </div>
    </div>
</div>