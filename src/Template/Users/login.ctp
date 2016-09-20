<div class="row">
    <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <?= $this->Flash->render('auth') ?>
                <?= $this->Form->create() ?>
                <fieldset>
                    <h4><?= __("Merci de rentrer vos nom d'utilisateur et mot de passe") ?></h4>
            </div>
            <div class="panel-body">
                <?= $this->Form->input('login') ?>
                <?= $this->Form->input('password') ?>
                </fieldset>
            </div>
            <div class="panel-footer text-center">
                <?= $this->Form->button(__('Se Connecter'),[
                    'class' => 'btn btn-success'
                ]); ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>