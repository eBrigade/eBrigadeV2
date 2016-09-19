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
    <div id="hide" class="">
    <hr/>
    <div class="sidebar-nav">
        <div class="navbar navbar-default" role="navigation">
            <ul class="nav nav-pills nav-stacked">
                <li class="active masse">Envoi en masse </li>
                    <?php foreach ($list as $listring): ?>
                <li id="list<?= $listring->id ?>"> <a href='#'><?= $listring->name ?></a> </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    </div>
</div>


<div id="test">
    Trigger the handler
</div>


<script>
    <?php foreach ($list as $listring): ?>
    $( "#list<?= $listring->id ?>" ).click(function() {
        $('#to').tokenfield('setTokens', [{ value: "k<?= $listring->id ?>", label: "<?= $listring->name ?>" }]);
    });
    <?php endforeach ?>

///*    // ajax retourne la liste des emails
//    $('li').click(function () {
//        var bid = $(this).attr('id').slice(4);
//        var url = '<?= $this->Url->build("BarracksUsers/groupe"); ?>';
//        console.log(url);
//        $.ajax({
//            type: 'post',
//            url: url,
//            data: 'bid= ' + bid,
//            success: function(data){
//                $('input[name="to"]').val(data);
//            }
//        });
//    });*/


    // menu lateral gauche
    $( document ).ready(function() {
        if ($('#send-page').length !== 0){
            $('#mp-home').removeClass('active');
            $('#mp-send').addClass('active');
        }
        if ($('#mp-write').length !== 0){
            $('#mp-home').removeClass('active');
            $('#hide').removeClass('hidden');
        }
    });
</script>