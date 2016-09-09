<div class="row-fluid">
<div class="alertes form col-md-4">
	<ul id="listeAlertes" class="list-group">
	<?php foreach( $alertes as $item){ ?>
		<li class="list-group-item" data-item="<?= $item->list ?>"><?= $item->equipe ?></li>
	<?php } ?>
	</ul>
</div>
<div class="alertes form col-md8">
    <?= $this->Form->create($alerte) ?>
    <fieldset>
        <legend><?= __('Add liste alerte') ?></legend>
        <?php
            echo $this->Form->input('equipe');
			echo $this->Form->input('list');
            echo $this->Form->input('message');
			echo $this->Form->input('date_envoi');
        ?>
		<?= $this->Form->button(__('Submit')) ?>
    </fieldset>
    
    <?= $this->Form->end() ?>
</div>
</div>
<script>
$('#listeAlertes li').click(function() {
    var index = $(this).attr("data-item");
    var text = $(this).text();
	$('#list').append( index );
	$('#list').append( "\r" );
	$('#equipe').val( $('#equipe').val().concat( text ).concat( " + " ) );
});
</script>
