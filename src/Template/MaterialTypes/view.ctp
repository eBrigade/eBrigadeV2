<div class="row">
    <div class="col-sm-12 col-md-8 col-md-offset-2">
        <div class="panel-group">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3><?= h($materialType->name) ?></h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th><?= __('Name') ?></th>
                            <td><?= h($materialType->name) ?></td>
                        </tr>
                        <tr>
                            <td colspan=2>
                            <h4><?= __('Description') ?></h4>
                            <?= h($materialType->description) ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
