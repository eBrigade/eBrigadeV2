<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Vos Messages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="messages form col-lg-9 col-md-8 columns content">
    <?= $this->Form->create($message) ?>
    <fieldset>
        <legend><?= __('Envoyer un message privé') ?></legend>
        <?php
            echo $this->Form->input('to',['label' => 'Destinataire','type' => 'text','required' => true]);
            echo $this->Form->input('subject',['label' => 'Sujet']);
            echo $this->Form->input('text',['label' => 'Votre message']);
        ?>

    </fieldset>
    <?= $this->Form->button(__('ENVOYER')) ?>
    <?= $this->Form->end() ?>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<?= $this->Html->css('jquery-te-1.4.0.css')?>
<?= $this->Html->script('jquery-te-1.4.0.min.js')?>

<script>
    $("textarea").jqte();

    $( function() {
        var availableTags =[<?php
                foreach ($lists as $listuser) {
            echo  '"';
            echo  $listuser;
            echo  '",';
        }
        ?>];
        function split( val ) {
            return val.split( /,\s*/ );
        }
        function extractLast( term ) {
            return split( term ).pop();
        }

        $("[name=to]")
                .on( "keydown", function( event ) {
                    if ( event.keyCode === $.ui.keyCode.TAB &&
                            $( this ).autocomplete( "instance" ).menu.active ) {
                        event.preventDefault();
                    }
                })
                .autocomplete({
                    minLength: 0,
                    source: function( request, response ) {
                        response( $.ui.autocomplete.filter(
                                availableTags, extractLast( request.term ) ) );
                    },
                    focus: function() {
                        return false;
                    },
                    select: function( event, ui ) {
                        var terms = split( this.value );
                        terms.pop();
                        terms.push( ui.item.value );
                        terms.push( "" );
                        this.value = terms.join( " ," );
                        return false;
                    }
                });
    } );
</script>