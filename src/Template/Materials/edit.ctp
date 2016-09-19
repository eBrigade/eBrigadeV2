<div class="row">
    <div class="col-sm-12 col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <?= $this->Form->create($material) ?>
                <fieldset>
                    <?= __('Edit Material') ?>
            </div>
            <div class="panel-body">
                <?php
                echo $this->Form->input('name');
                echo $this->Form->input('description');
                echo $this->Form->input('stock',['type' => 'number','min' => '1','default' => $stocks->stock]);
                echo $this->Form->input('material_type_id', ['options' => $materialTypes]);
                echo $this->Form->input('barrack_id');
                ?>
            </div>
            </fieldset>
            <div class="panel-footer text-center">
                <?= $this->Form->button(__('Submit'),[
                    'class' => 'btn btn-primary'
                ]) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>