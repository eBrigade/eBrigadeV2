
<?php foreach ($barracks as $barrack): ?>
<div class="col-md-6" >
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><?= h($barrack->name) ?></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img src="<?= $this->Url->image('pro-civ.png') ?>" class="img-circle img-responsive"> </div>

                <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>Ville :</td>
                            <td><?= h($barrack->city->city ) ?></td>
                        </tr>
                        <tr>
                            <td>Adresse :</td>
                            <td><?= h($barrack->address) ?></td>
                        </tr>
                        <tr>
                            <td>Adresse Complémentaire:</td>
                            <td><?= h($barrack->address_complement) ?></td>
                        </tr>
                        <tr>
                            <td>Site web  :</td>
                            <td><?= h($barrack->website_url) ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><a href="<?= h($barrack->email) ?>"><?= h($barrack->email) ?></a></td>
                        </tr>
                        <td>Téléphone</td>
                        <td><?= h($barrack->phone) ?><br><br><?= h($barrack->fax) ?>
                            <?= ($barrack->fax) ? '(fax)' : '<br>' ?>
                        </td>

                        </tr>

                        </tbody>
                    </table>

                    <a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'view', $barrack->id]); ?>" class="btn btn-primary btn-sm " ><i class="glyphicon glyphicon-eye-open"></i> VOIR</a>
                    <a href="#" class="btn btn-primary  btn-sm "><i class="glyphicon glyphicon-envelope"></i> MP</a>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'delete', $barrack->id]); ?>" data-original-title="Supprimer cette caserne" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
            <a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'edit', $barrack->id]); ?>" data-original-title="Editer cette caserne" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"> EDITION</i></a>
        </div>

    </div>
</div>
<?php endforeach; ?>



<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>



<script>

    $(document).ready(function() {
        var panels = $('.user-infos');
        var panelsButton = $('.dropdown-user');
        panels.hide();

        //Click dropdown
        panelsButton.click(function() {
            //get data-for attribute
            var dataFor = $(this).attr('data-for');
            var idFor = $(dataFor);

            //current button
            var currentButton = $(this);
            idFor.slideToggle(400, function() {
                //Completed slidetoggle
                if(idFor.is(':visible'))
                {
                    currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
                }
                else
                {
                    currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
                }
            })
        });


        $('[data-toggle="tooltip"]').tooltip();

        $('button').click(function(e) {
            e.preventDefault();
            alert("This is a demo.\n :-)");
        });
    });
    function isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }

    function setFontSize(el) {
        var fontSize = el.val();

        if ( isNumber(fontSize) && fontSize >= 0.5 ) {
            $('body').css({ fontSize: fontSize + 'em' });
        } else if ( fontSize ) {
            el.val('1');
            $('body').css({ fontSize: '1em' });
        }
    }
</script>
