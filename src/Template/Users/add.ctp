<div class="row">
    <div class="col-sm-12 col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <h4><?= __('Add User') ?></h4>
            </div>
            <div class="form-inline text-center">
                <h3>Type d'inscription :</h3>
                <?= $this->Form->input('user_type',[
                    'type' => 'radio',
                    'options' => [
                        ['value' => '0','text'=>'Protection civile','checked'],
                        ['value' => '1','text'=>'Fournisseur'],
                        ['value' => '2','text'=>'Autre']
                    ],
                    'label' => false,
                ]) ?>
            </div>
            <div class="panel-body form-user">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <?php
                        echo $this->Form->input('login');
                        echo $this->Form->input('email');
                        echo $this->Form->input('password');
                        echo $this->Form->input('firstname');
                        echo $this->Form->input('lastname');
                        echo $this->Form->input('birthname',['class' => 'adpc']);
                        echo $this->Form->input('birthday',[
                            'empty' => true,
                            'minYear' => date('Y')-90,
                            'maxYear' => date('Y')-16,
                        ]);
                        echo $this->Form->input('birthplace',['class' => 'adpc']);
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <?php
                        echo $this->Form->input('address');
                        echo $this->Form->input('address_complement');
                        echo $this->Form->input('zipcode');
                        echo $this->Form->input('city_id', ['options' => $cities, 'empty' => true]);
                        echo $this->Form->input('phone');
                        echo $this->Form->input('cellphone',['class' => 'adpc']);
                        echo $this->Form->input('workphone');
                        echo $this->Form->input('skype',['class' => 'adpc']);
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <?php
                        echo $this->Form->input('personne_referente',['class' => 'adpc']);
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <?php
                        echo $this->Form->input('tuteur_legal',['class' => 'adpc']);
                        ?>
                    </div>
                </div>

                <!--
                <?php
                // A définir comment les intégrer
                echo $this->Form->input('is_active');
                echo $this->Form->input('external');

                echo $this->Form->input('alerte');
                echo $this->Form->input('is_provider');
                echo $this->Form->input('barracks._ids', ['options' => $barracks]);
                echo $this->Form->input('skills._ids', ['options' => $skills]);
                echo $this->Form->input('teams._ids', ['options' => $teams]);
                echo $this->Form->input('vehicles._ids', ['options' => $vehicles]);
                ?>
                -->
                </fieldset>
            </div>
            <div class="panel-footer text-center">
                <?= $this->Form->button(__('Submit'),[
                    'class'=>'btn btn-success','escape'=>false
                ]) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('jquery.js') ?>
<script>
    $(document).ready(function () {
        selectAddType();
    });
    $('input[name="user_type"]').on('change',function(){
        selectAddType();
    })
    function selectAddType()
    {
        if($('input[name="user_type"]:checked').val() !== '0')
        {
            $('.adpc')
                .removeAttr('checked')
                .removeAttr('selected')
                .not(':button, :submit, :reset, :hidden, :radio, :checkbox')
                .val('')
                .prop('disabled',true);

        }
        else
        {
            $('.adpc').prop('disabled',false);
        }
    }
</script>