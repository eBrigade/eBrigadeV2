<div class="col-md-2">
    <?= $this->Html->link(__(' ECRIRE UN MP '), ['action' => 'send'],['class'=>'btn btn-success btn-sm btn-block
    glyphicon-pencil']) ?>
    <hr/>
    <div class="sidebar-nav">
        <div class="navbar navbar-default" role="navigation">

            <ul class="nav nav-pills nav-stacked">
                <li class="active" id="mp-home"><a href='<?= $this->Url->build(["controller" => "messages","action" => "index" ]); ?>'><span class="badge pull-right"><?= $recmpcount ?></span> Reçu(s)
                </a>
                </li>
                <li  id="mp-send"><a href='<?= $this->Url->build(["controller" => "messages","action" => "dispatch" ]); ?>'>Envoyé(s) </a>
                </li>
                <li><a href="#">Archivé(s)</a></li>
                <li><a href="#">Corbeille</a></li>
            </ul>
        </div>
    </div>
    <hr/>
    <div class="sidebar-nav">
        <div class="navbar navbar-default" role="navigation">

            <ul class="nav nav-pills nav-stacked">
                <li id="mp-list"><a href='<?= $this->Url->build(["controller" => "messages","action" => "index" ]); ?>'> Listes
                </a>
                </li>
                <li  id="mp-choice"><a href='<?= $this->Url->build(["controller" => "messages","action" => "dispatch" ]); ?>'>Casernes </a>
                </li>
            </ul>
        </div>
    </div>
</div>



<?php foreach ($list as $listring): ?>
<?= $listring->user->email ?>



<br>
<?php endforeach ?>


<script>
// menu lateral gauche
$( document ).ready(function() {
if ($('#send-page').length !== 0){
$('#mp-home').removeClass('active');
$('#mp-send').addClass('active');
}
});
</script>
