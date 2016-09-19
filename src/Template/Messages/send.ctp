<?php $cell = $this->cell('Messagerie',[$user]) ?>
<?= $cell ?>


<div class="col-md-10 ">
    <div class="panel panel-primary">
        <div id="mp-write" class="panel-heading">Envoyer un message
        </div>
        <div class="panel-body">
            <?= $this->Form->create($message) ?>
                <?php
                echo $this->Form->input('to',['label' => 'Destinataire','type' => 'text','required' => true , 'data-role' => 'tagsinput' , 'class' => 'too']);
                echo $this->Form->input('subject',['label' => 'Sujet']);
                echo $this->Form->input('text',['label' => 'Votre message','id' => 'wysyg']);
                ?>
            <?= $this->Form->button(__('ENVOYER'),['class' => 'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<?= $this->Html->css('bootstrap-tokenfield.css')?>
<?= $this->Html->css('tokenfield-typeahead.css')?>
<?= $this->Html->css('jquery-te-1.4.0.css')?>
<?= $this->Html->script('jquery-te-1.4.0.min.js')?>
<?= $this->Html->script('bootstrap-tokenfield.js')?>


<script>
    $("#wysyg").jqte();

    $('#to').tokenfield({
        autocomplete: {
            source: [<?php
                    foreach ($lists as $listuser) {

        echo  $listuser;

    }
    ?>],
            delay: 100
        },
    allowEditing: false,
            showAutocompleteOnFocus: false
    })

    $('.too').on('tokenfield:createtoken', function (event) {
        var existingTokens = $(this).tokenfield('getTokens');
        $.each(existingTokens, function(index, token) {
            if (token.value === event.attrs.value)
                event.preventDefault();
        });
    });



</script>
