<div class='col-md-2'>
    <div class="sidebar-nav linkout">
        <div class="navbar navbar-default" role="navigation">

            <ul class="nav nav-pills nav-stacked">
                <li class="active" ><a href="javascript:;"> Afficher par
                </a>
                </li>
                <li><a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'index']); ?>">Arborescence</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'annuaire']); ?>">Liste </a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'carte']); ?>">Carte</a></li>
            </ul>
        </div>
    </div>

    <div class="sidebar-nav linkout">
        <div class="navbar navbar-default" role="navigation">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"  ><a href="javascript:;"> Trier par
                </a>
                </li>
                <li id="bttoopen"><a href="javascript:;">*****</a></li>
                <li id="bttoclose"><a href="javascript:;">*******</a></li>
            </ul>
        </div>
    </div>
</div>


<div class='col-md-10'>
    <?php foreach ($barracks as $barrack): ?>
    <div class="col-md-6" >
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"><strong><?= h($barrack->name) ?></strong></h3>
                <a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'delete', $barrack->id]); ?>" data-original-title="Supprimer cette caserne" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger pull-right mgblist upmarge"><i class="glyphicon glyphicon-remove"></i></a>
                <a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'edit', $barrack->id]); ?>" data-original-title="Editer cette caserne" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning pull-right upmarge"><i class="glyphicon glyphicon-edit"></i></a>

            </div>
            <div class="panel-body">
                <div class="row">

                    <div class=" col-md-12 col-lg-12 ">
                        <table class="table table-user-information">
                            <tbody>
                            <tr>
                                <td width="35%">Ville :</td>
                                <td><?= $barrack->city->city.' ('.$barrack->city->zipcode.')' ?></td>
                            </tr>
                            <tr>
                                <td>Adresse :</td>
                                <td><?= h($barrack->address) ?><br>
                                    <?= h($barrack->address_complement) ?  : '<br>' ?>
                                </td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td><?= h($barrack->email) ?></td>
                            </tr>
                            <td>Téléphone</td>
                            <td><?= h($barrack->phone) ?><br><br><?= h($barrack->fax) ?>
                                <?= ($barrack->fax) ? '(fax)' : '<br>' ?>
                            </td>

                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'view', $barrack->id]); ?>" class="btn btn-success btn-sm " data-original-title="Voir la fiche détaillée" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open"></i> DETAILS</a>
                <a href="<?= $this->Url->build(['controller' => 'messages','action' => 'send']); ?>" class="btn btn-success  btn-sm" data-original-title="Envoyer un message privé" data-toggle="tooltip"><i class="glyphicon glyphicon-envelope"></i> MP</a>
                <?php
            if (!empty($barrack->website_url)){
                echo '<a href="http://'.$barrack->website_url .'" target="_blank" class="btn btn-success  btn-sm pull-right" data-original-title="Visitez le site" data-toggle="tooltip"><i class="glyphicon glyphicon-link"></i> SITE WEB</a>' ;
                } ?>
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
