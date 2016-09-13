<div class="row">
    <div class="col-sm-12 col-md-12 text-center">
        <div class="btn-group">
            <h1>Profil de <?= $user->login ?></h1>
        </div>
        <div class="btn-group">
            <?= ($userId) ? $this->Html->link($this->Html->icon('pencil'),
                ['action' => 'edit',$user->id],
                ['class'=>'btn btn-info btn-sm','escape'=>false])
                : '' ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                Informations
            </div>
            <div class="panel-body">
                <li class="list-unstyled"><label>Prénom : </label><?= $user->firstname ?></li>
                <li class="list-unstyled"><label>Nom : </label><?= $user->lastname ?></li>
                <li class="list-unstyled"><label>Ville : </label><?= ucfirst($user->city->city) ?></li>
                <hr>
                <li class="list-unstyled"><label>Caserne : </label>
                    <?php foreach($user->barracks as $barrack)
                    {
                        echo $barrack->name . ' ';
                        echo $this->Html->link($this->Html->icon('eye-open'),[
                                'controller' => 'Barracks',
                                'action' => 'view',
                                $barrack->id
                            ],
                            [
                                'class' => 'btn btn-xs',
                                'escape' => false
                            ]
                        );
                    }
                    ?>
                </li>
                <li class="list-unstyled"><label>Membre depuis le : </label><?= $user->created ?></li>
                <li class="list-unstyled"><label>Actif : </label><?= ($user->is_active) ? 'Oui' : 'Non' ?></li>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                Contact
            </div>
            <div class="panel-body">
                <li class="list-unstyled"><label>Téléphone : </label><?= ($user->workphone != null) ? $user->workphone : 'Non renseigné' ?></li>
                <li class="list-unstyled"><label>Skype : </label><?= ($user->skype != null) ? $user->skype : 'Non renseigné' ?></li>

            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="panel panel-warning">
            <div class="panel-heading">
                Formations
            </div>
            <div class="panel-body">
                <li class="list-unstyled">A remplir</li>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                Equipes
            </div>
            <div class="panel-body">
                <li class="list-unstyled">A remplir</li>
            </div>
        </div>
    </div>
</div>