<div class="col-md-2">
    <?= $this->Html->link(__(' ENVOYER UN MP '), ['action' => 'send'],['class'=>'btn btn-success btn-sm btn-block
    glyphicon-pencil']) ?>
    <hr/>
    <div class="sidebar-nav">
        <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".sidebar-navbar-collapse">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="visible-xs navbar-brand">Menu</span>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li class="active" id="mp-home"><a href='<?= $this->Url->build(["controller" => "messages","action" => "index" ]); ?>'><span class="badge pull-right"><?= $recmpcount ?></span> Reçu(s)
                </a>
                </li>
                <li  id="mp-send"><a href='<?= $this->Url->build(["controller" => "messages","action" => "dispatch" ]); ?>'>Envoyé(s) <span class="badge pull-right"><?= $sendmpcount ?></span></a>
                </li>
                <li><a href="#">Corbeille</a></li>
            </ul>
        </div>
    </div>
</div>
<script>
// menu lateral gauche
$( document ).ready(function() {
if ($('#send-page').length !== 0){
$('#mp-home').removeClass('active');
$('#mp-send').addClass('active');
}
});
</script>
