<div class="row">
    <div class="col-sm-12 col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?= $this->Form->create($materialType) ?>
                <fieldset>
                    <?= __('Edit Material Type') ?>
                    <span class="pull-right">
                    <?= $this->Form->postLink(
                        __('Delete'),
                        ['action' => 'delete', $materialType->id],
                        ['class' => 'btn btn-danger','escape'=>false],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $materialType->id)]
                    )
                    ?>
                    </span>
            </div>
            <div class="panel-body">
                <?php
                echo $this->Form->input('name');
                echo $this->Form->input('description');
                ?>
                </fieldset>
            </div>
            <div class="panel-footer text-center">
                <?= $this->Form->button(__('Submit'),[
                    'class' => 'btn btn-success',
                ]) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>


