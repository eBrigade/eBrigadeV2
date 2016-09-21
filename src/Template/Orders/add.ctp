<div class="row">
    <div class="col-sm-12 col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?= $this->Form->create($order) ?>
                <fieldset>
                    <h4><?= __('Add Order') ?></h4>
            </div>
            <div class="panel-body">
                <?php
                echo $this->Form->input('material_id', ['options' => $materials, 'default' => $selected]);
                echo $this->Form->input('quantity',[
                    'min' => '1',
                    'value' => '1'
                ]);
                ?>
                </fieldset>
            </div>
            <div class="panel-footer text-center">
                <?= $this->Form->button(__('Submit'),[
                    'class' => 'btn btn-success'
                ]) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>




</div>
