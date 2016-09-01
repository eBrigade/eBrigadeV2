<h1>Profil de <?= $user->login ?></h1>
<?php
    if($myProfile){
        echo $this->Html->link(__('Editer'),['controller' => 'Users', 'action' => 'edit',$myId]);
    }
?>
<div class="row">
    <div class="medium-1 column">
        <h5>Nom</h5>
    </div>
    <div class="medium-6 column">
        <?= $user->firstname . ' ' . $user->lastname ?>
    </div>
    <hr>
</div>
<div class="row">
    <div class="medium-1 column">
        <h5>Naissance</h5>
    </div>
    <div class="medium-6 column">
        Né le <?= ($user->birthday != null) ? $user->birthday : 'Non renseigné' ?>
        à <?= ($user->birthplace != null) ? $user->birthplace : 'Non renseigné' ?>
    </div>
    <hr>
</div>
<div class="row">
    <div class="medium-1 column">
        <h5>Grade</h5>
    </div>
    <div class="medium-6 column">
        <?= $user->grade->name ?>
    </div>
    <hr>
</div>
<div class="row">
    <div class="medium-1 column">
        <h5>Adresse</h5>
    </div>
    <div class="medium-6 column">
        <?php
            if($user->address != null && $user->zipcode != null && $user->city != null){
                echo $user->address . '<br>';
                echo $user->zipcode . ' - ' . $user->city;
            }
            else{
                echo 'Non renseignée';
            }
        ?>
    </div>
    <hr>
</div>
<div class="row">
    <div class="medium-1 column">
        <h5>Téléphone</h5>
    </div>
    <div class="medium-6 column">
        <?= ($user->phone != null) ? $user->phone : 'Non renseigné' ?>
    </div>
    <hr>
</div>
<div class="row">
    <div class="medium-1 column">
        <h5>Portable</h5>
    </div>
    <div class="medium-6 column">
        <?= ($user->cellphone != null) ? $user->cellphone : 'Non renseigné' ?>
    </div>
    <hr>
</div>
<div class="row">
    <div class="medium-1 column">
        <h5>Skype</h5>
    </div>
    <div class="medium-6 column">
        <?= ($user->skype != null) ? $user->phone : 'Non renseigné' ?>
    </div>
    <hr>
</div>