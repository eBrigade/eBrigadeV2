<div class="row">
    <div class="col-sm-12 col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <h4><?= __('Edit User') ?></h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <?php
                        echo $this->Form->input('firstname');
                        echo $this->Form->input('lastname');
                        echo $this->Form->input('birthname');
                        echo $this->Form->input('email');
                        echo $this->Form->input('login');
                        echo $this->Form->input('password');
                        echo $this->Form->input('birthday', [
                            'empty' => true,
                            'minYear' => date('Y')-90,
                            'maxYear' => date('Y')-16
                        ]);
                        echo $this->Form->input('birthplace');
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <?php

                        echo $this->Form->input('address');
                        echo $this->Form->input('address_complement');
                        echo $this->Form->input('zipcode');
                        echo $this->Form->input('city_id', ['options' => $cities, 'empty' => true]);
                        echo $this->Form->input('phone');
                        echo $this->Form->input('cellphone');
                        echo $this->Form->input('workphone');
                        echo $this->Form->input('skype');
                        ?>
                    </div>
                </div>
                </fieldset>
            </div>
            <div class="panel-footer text-center">
                <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success','escape' => false]) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

