<div class="col-md-2">
    <?= $this->Html->link(__(' ECRIRE UN MP '), ['action' => 'send'],['class'=>'btn btn-success btn-sm btn-block
    glyphicon-pencil']) ?>
    <hr/>
    <div class="sidebar-nav">
        <div class="navbar linkout" role="navigation">

            <ul class="nav nav-pills nav-stacked">
                <li class="active" id="mp-home"><a href='<?= $this->Url->build(["controller" => "messages","action" => "index" ]); ?>'><span class="badge"><?= $recmpcount ?></span> Reçu(s)
                </a>
                </li>
                <li  id="mp-send"><a href='<?= $this->Url->build(["controller" => "messages","action" => "dispatch" ]); ?>'>Envoyé(s) </a>
                </li>
                <li><a href="#">Archivé(s)</a></li>
                <li><a href="#">Corbeille</a></li>
            </ul>
        </div>
    </div>

</div>


<script type="text/javascript">
    <?php foreach ($list as $listring): ?>

    $( "#list<?= $listring->id ?>" ).click(function() {
        $('#to').tokenfield('createToken', { value: "k<?= $listring->id ?>", label: "<?= $listring->name ?>" });
    });
    <?php endforeach ?>



    // menu lateral gauche
    $( document ).ready(function() {
        if ($('#send-page').length !== 0){
            $('#mp-home').removeClass('active');
            $('#mp-send').addClass('active');
        }
        if ($('#send-view').length !== 0){
            $('#mp-home').removeClass('active');
            $('#mp-send').addClass('active');
        }
    });
</script>



